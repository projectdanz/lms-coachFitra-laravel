<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Midtrans\MidtransPayment;
use App\Services\Midtrans\Exceptions\MidtransException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected MidtransPayment $midtrans;

    public function __construct(MidtransPayment $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    /**
     * Create a new payment
     */
    public function createPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'method' => 'required|string',
            'amount' => 'required|integer|min:1',
            'customer.username' => 'required|string|max:45',
            'customer.email' => 'required|email|max:45',
            'customer.phone' => 'required|string|min:10',
            'course_id' => 'required|number|exists:course,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $course = Course::find($request->input('coure_id'));

        $item = [
            'name' => $course->nama,
            'price' => $course->harga,
            'quantity' => 1,
        ];

        $order_id = Str::uuid()->toString();

        User::create([
            'username' => $request->input('customer.username'),
            'email' => $request->input('customer.email'),
            'phone' => $request->input('customer.phone'),
            'order_id' => $order_id,
        ]);

        try {
            $paymentData = [
                'method' => $request->input('method'),
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $request->amount,
                ],
                'customer_details' => $request->customer,
                'item_details' => $item ?? [],
            ];

            $result = $this->midtrans->createPayment($paymentData);

            return redirect($result['redirect_url']);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);

        } catch (\Exception $e) {
            Log::error('Payment creation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }

    /**
     * Create simple payment with minimal data
     */
    public function createSimplePayment(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'method' => 'required|string',
            'order_id' => 'required|string|max:50',
            'amount' => 'required|integer|min:1',
            'customer_email' => 'required|email|max:45',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $customer = [
                'email' => $request->customer_email,
            ];

            $result = $this->midtrans->createSimplePayment(
                $request->input('method'),
                $request->order_id,
                $request->amount,
                $customer
            );

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Get payment status
     */
    public function getPaymentStatus(string $orderId): JsonResponse
    {
        try {
            $result = $this->midtrans->getPaymentStatus($orderId);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get payment status',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Cancel payment
     */
    public function cancelPayment(string $orderId): JsonResponse
    {
        try {
            $result = $this->midtrans->cancelPayment($orderId);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment cancellation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Handle webhook notification from Midtrans
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        try {
            $notification = $request->all();
            $validation = $this->midtrans->validateWebhookNotification($notification);

            if (!$validation['valid']) {
                Log::warning('Invalid webhook signature', ['notification' => $notification]);
                return response()->json(['message' => 'Invalid signature'], 401);
            }

            // Process the notification based on transaction status
            $this->processNotification($validation);

            Log::info('Webhook processed successfully', ['order_id' => $validation['order_id']]);

            return response()->json(['message' => 'OK']);

        } catch (\Exception $e) {
            Log::error('Webhook processing error', [
                'message' => $e->getMessage(),
                'notification' => $request->all(),
            ]);

            return response()->json(['message' => 'Error processing webhook'], 500);
        }
    }

    /**
     * Get available payment methods
     */
    public function getPaymentMethods(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->midtrans->getAvailablePaymentMethods(),
        ]);
    }

    /**
     * Test Midtrans connection
     */
    public function testConnection(): JsonResponse
    {
        $result = $this->midtrans->testConnection();

        return response()->json([
            'success' => $result['connection_status'] === 'ok',
            'data' => $result,
        ]);
    }

    /**
     * Get configuration info
     */
    public function getConfig(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->midtrans->getConfig(),
        ]);
    }

    /**
     * Process webhook notification
     */
    protected function processNotification(array $validation): void
    {
        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];
        $fraudStatus = $validation['fraud_status'];

        // Handle different transaction statuses
        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus === 'accept') {
                    // Payment successful
                    $this->handleSuccessfulPayment($orderId, $validation);
                } elseif ($fraudStatus === 'challenge') {
                    // Payment needs manual review
                    $this->handleChallengedPayment($orderId, $validation);
                } else {
                    // Payment failed/denied
                    $this->handleFailedPayment($orderId, $validation);
                }
                break;

            case 'settlement':
                // Payment settled
                $this->handleSuccessfulPayment($orderId, $validation);
                // $this->handleSettledPayment($orderId, $validation);
                break;

            case 'pending':
                // Payment pending
                $this->handlePendingPayment($orderId, $validation);
                break;
            case 'expire':
                // Payment failed/cancelled
                $this->handleFailedPayment($orderId, $validation);
                break;
        }
    }

    protected function handleSuccessfulPayment(string $orderId, array $validation)
    {
        // Update order status in database
        Log::info("Payment successful for order: {$orderId}", $validation);
        try {
            $user = User::where('order_id', $validation['order_id'])->first();
            $hasUserEverBought = User::where('email', $user->email)
                ->orWhere('phone', $user->phone)
                ->count();
            $course = Course::find($user->course_id);

            if ($hasUserEverBought >= 1) {
                $this->messagePasswordRegister(
                    $user->phone,
                    $user->email,
                    $user->username,
                    null,
                    $course,
                );
                Mail::to($user->email)->send(new PaymentSuccess(
                    $user->order_id,
                    $user->username,
                    $user->email,
                    null
                ));
            } else {
                $password = Str::random(8);
                $response = Http::withBasicAuth(config('app.wp.username'), config('app.wp.password'))
                    ->withHeaders([
                        'Content-Type' => 'application/json'
                    ])
                    ->post('https://ecourse.sekolahkaya.com/wp-json/wp/v2/users', [
                        'username' => $user->username,
                        'email' => $user->email,
                        'password' => $password,
                    ]);

                if ($response->successful()) {
                    $user->update([
                        'password' => $password,
                    ]);

                    $this->messagePasswordRegister(
                        $user->phone,
                        $user->email,
                        $user->username,
                        $user->password,
                        $course,
                    );
                    Mail::to($user->email)->send(new PaymentSuccess(
                        $user->order_id,
                        $user->username,
                        $user->email,
                        $user->password,
                        $course->course_url
                    ));

                    return response()->json([
                        'message' => 'User registered successfully',
                        'data' => $response->json()
                    ]);
                } else {
                    Log::error("Registration failed", [$response->body()]);

                    return response()->json([
                        'message' => 'Registration failed',
                        'error' => $response->json()
                    ], $response->status());
                }
            }
        } catch (\Exception $e) {
            throw new \Exception("Error registering user: " . $e->getMessage());
        }
    }

    protected function handleChallengedPayment(string $orderId, array $validation): void
    {
        // Mark for manual review
        Log::warning("Payment challenged for order: {$orderId}", $validation);
    }

    protected function handleFailedPayment(string $orderId, array $validation): void
    {
        // Update order status as failed
        Log::info("Payment failed for order: {$orderId}", $validation);
    }

    protected function handleSettledPayment(string $orderId, array $validation): void
    {
        // Payment settled by Midtrans
        Log::info("Payment settled for order: {$orderId}", $validation);
    }

    protected function handlePendingPayment(string $orderId, array $validation): void
    {
        // Payment is pending
        Log::info("Payment pending for order: {$orderId}", $validation);
    }

    private function sendRequest(array $data): void
    {
        $url = 'https://api.fonnte.com/send';
        $token = config('app.fonnte.token');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        Log::info('Send request to fonnte:', [$response]);
    }

    private function sendMessage(string $phone, string $message): void
    {
        $phone = preg_replace('/\D/', '', $phone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1); // Normalisasi 0812... jadi 62812...
        }

        $this->sendRequest([
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62',
        ]);
    }

    private function sendMessageToGroup(string $message): void
    {
        $this->sendRequest([
            'target' => config('app.fonnte.group_token'),
            'message' => $message,
            'countryCode' => '62',
        ]);
    }

    private function messagePasswordRegister(string $phone, string $email, string $username, ?string $password = null, Course $course): bool
    {
        $message = "🔐*INFORMASI RAHASI*

*🚫Jangan berikan kepada siapapun*

🌟 *Hi {$username}!* 🌟  
Terima kasih sudah mempercayai kami 🙏

🎓 Kamu baru saja berhasil membeli course berikut:
━━━━━━━━━━━━━━━━━━━━
📌 Nama Course : {$course->nama}  
💵 Harga       : {$course->harga}  
📅 Tanggal     : " . now()->format('d M Y H:i') . "  
━━━━━━━━━━━━━━━━━━━━

👉 " . ($password ? "🔐 *Detail Akun Kamu Untuk Login* :  
📧 Email    : {$email}  
➡️ Password : {$password}  

👉 login ke sini dulu untuk ubah password : 
https://ecourse.sekolahkaya.com/dashboard/settings/reset-password/

🔑 *Password Course*  
👉 Gunakan untuk mengakses materi course  
➡️ {$course->password}  

👉 Setelah memasukan password course, Kamu juga harus login untuk bisa memulai materi  

" : "") . "
Akses kelas  
👉 {$course->course_url}  

━━━━━━━━━━━━━━━━━━━━
⚡ *Langkah Akses Course*:  
1️⃣ Ubah Password Segera   
2️⃣ Klik link akses kelas diatas
3️⃣ Masukan *Password Course* 
4️⃣ Start Learning! (login dulu ya)

Terima kasih sudah bergabung 🚀  
_Selamat belajar & semoga sukses!_ ✨";

        try {
            $this->sendMessage($phone, $message);
            $this->sendMessageToGroup($message);
            return true;
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            throw $e;
        }
    }
}