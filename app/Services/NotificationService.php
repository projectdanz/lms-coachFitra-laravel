<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Mail\PaymentSuccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class NotificationService
{
    /**
     * Send payment success notifications (WhatsApp + Email)
     */
    public function sendPaymentSuccessNotifications(
        User $user, 
        Course $course, 
        ?string $password = null,
        ?string $customMessage = null
    ): void {
        try {
            // Send WhatsApp notification
            $this->sendWhatsAppNotification($user, $course, $password, $customMessage);
            
            // Send email notification
            $this->sendEmailNotification($user, $course, $password);
            
            Log::info('Payment success notifications sent', [
                'user_id' => $user->id,
                'order_id' => $user->order_id,
                'course_id' => $course->id
            ]);
            
        } catch (\Exception $e) {
            Log::error('Failed to send payment success notifications', [
                'user_id' => $user->id,
                'order_id' => $user->order_id,
                'error' => $e->getMessage()
            ]);
            
            // Don't throw exception - notification failure shouldn't break payment flow
        }
    }

    /**
     * Send WhatsApp notification
     */
    private function sendWhatsAppNotification(
        User $user, 
        Course $course, 
        ?string $password = null,
        ?string $customMessage = null
    ): void {
        $message = $this->buildWhatsAppMessage($user, $course, $password, $customMessage);
        $normalizedPhone = $this->normalizePhoneNumber($user->phone);

        // Send to user
        $this->sendWhatsAppMessage($normalizedPhone, $message);
        
        // Send to group (if configured)
        if (config('app.fonnte.group_token')) {
            $this->sendWhatsAppMessage(config('app.fonnte.group_token'), $message);
        }
    }

    /**
     * Send email notification
     */
    private function sendEmailNotification(User $user, Course $course, ?string $password = null): void
    {
        try {
            Mail::to($user->email)->send(new PaymentSuccess(
                $user->order_id,
                $user->username,
                $user->email,
                $password,
                $course->course_url
            ));

            Log::info('Email notification sent successfully', [
                'user_id' => $user->id,
                'email' => $user->email,
                'order_id' => $user->order_id
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send email notification', [
                'user_id' => $user->id,
                'email' => $user->email,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Build WhatsApp message content
     */
    private function buildWhatsAppMessage(
        User $user, 
        Course $course, 
        ?string $password = null,
        ?string $customMessage = null
    ): string {
        $passwordSection = $password ? "- Password : {$password}" : "";
        $currentDateTime = now()->format('d M Y H:i');

        $baseMessage = "> *🚫 _Don't Share_*

*🔐 INFORMASI RAHASIA*

🌟 *Hi {$user->username}!* 🌟  
Terima kasih sudah mempercayai kami 🙏

━━━━━━━━━━━━━━━━━

*{$course->nama}*  

Harga       :  _{$course->harga}_  
Tanggal     :  _{$currentDateTime}_  

━━━━━━━━━━━━━━━━━

> 📝 *_Informasi Akun_* :
  
- Email    : {$user->email} 
{$passwordSection}";

        if ($customMessage) {
            $baseMessage .= "\n\n⚠️ *_Penting_* :\n{$customMessage}";
        } else {
            $baseMessage .= "

> 🔄 *_Ubah Password_* :
 
- https://ecourse.sekolahkaya.com/dashboard/settings/reset-password/

> 🔒 *_Password Course_:* 

- {$course->password}  

> 👉 *_Akses kelas_:*
  
- {$course->course_url}

━━━━━━━━━━━━━━━━━

⚡ *_Langkah Akses Course_*:

> 1️⃣ Ubah Password Segera   
> 2️⃣ Klik link akses kelas diatas
> 3️⃣ Masukan *Password Course* 
> 4️⃣ Start Learning! _(login dulu ya)_";
        }

        $baseMessage .= "

Terima kasih sudah bergabung 🚀  
_Selamat belajar & semoga sukses!_ ✨

> _sekolahkaya.com_";

        return $baseMessage;
    }

    /**
     * Normalize phone number for WhatsApp
     */
    private function normalizePhoneNumber(string $phone): string
    {
        $phone = preg_replace('/\D/', '', $phone);
        
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (!str_starts_with($phone, '62')) {
            $phone = '62' . $phone;
        }

        return $phone;
    }

    /**
     * Send WhatsApp message via Fonte API
     */
    private function sendWhatsAppMessage(string $target, string $message): void
    {
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => config('app.fonnte.token'),
                    'Content-Type' => 'application/json'
                ])
                ->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => '62',
                ]);

            if ($response->successful()) {
                Log::info('WhatsApp message sent successfully', [
                    'target' => $target,
                    'response' => $response->json()
                ]);
            } else {
                Log::warning('WhatsApp message sending failed', [
                    'target' => $target,
                    'status_code' => $response->status(),
                    'response' => $response->body()
                ]);
            }
        } catch (\Exception $e) {
            Log::error('WhatsApp message sending exception', [
                'target' => $target,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Notify admin of registration failure
     */
    public function notifyAdminOfRegistrationFailure(User $user, string $error): void
    {
        try {
            $adminMessage = "🚨 *WORDPRESS REGISTRATION FAILED*

User Details:
- Order ID: {$user->order_id}
- Username: {$user->username}
- Email: {$user->email}
- Phone: {$user->phone}
- Course ID: {$user->course_id}

Error: {$error}

Please manually create account for this user.

_System Alert - sekolahkaya.com_";

            // Send to admin group/number if configured
            $adminTarget = config('app.fonnte.admin_group_token') ?? config('app.fonnte.admin_phone');
            
            if ($adminTarget) {
                $this->sendWhatsAppMessage($adminTarget, $adminMessage);
            }

            // Also send email to admin if configured
            $adminEmail = config('app.admin.email');
            if ($adminEmail) {
                Mail::raw($adminMessage, function ($message) use ($adminEmail, $user) {
                    $message->to($adminEmail)
                           ->subject("WordPress Registration Failed - Order #{$user->order_id}");
                });
            }

            Log::info('Admin notification sent for registration failure', [
                'user_id' => $user->id,
                'order_id' => $user->order_id
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to notify admin of registration failure', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Send payment failure notification
     */
    public function sendPaymentFailureNotification(User $user, Course $course, string $reason = ''): void
    {
        try {
            $message = "⚠️ *PEMBAYARAN GAGAL*

Hi {$user->username},

Pembayaran untuk kelas *{$course->nama}* mengalami kendala.

Order ID: {$user->order_id}
" . ($reason ? "Alasan: {$reason}" : "") . "

Silakan coba lagi atau hubungi customer service kami.

_Tim sekolahkaya.com_";

            $normalizedPhone = $this->normalizePhoneNumber($user->phone);
            $this->sendWhatsAppMessage($normalizedPhone, $message);

            Log::info('Payment failure notification sent', [
                'user_id' => $user->id,
                'order_id' => $user->order_id
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send payment failure notification', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Send payment reminder notification
     */
    public function sendPaymentReminderNotification(User $user, Course $course): void
    {
        try {
            $message = "⏰ *PEMBAYARAN PENDING*

Hi {$user->username},

Pembayaran untuk kelas *{$course->nama}* masih menunggu konfirmasi.

Order ID: {$user->order_id}
Harga: {$course->harga}

Jika sudah melakukan pembayaran, harap tunggu konfirmasi otomatis. Jika ada kendala, hubungi customer service.

_Tim sekolahkaya.com_";

            $normalizedPhone = $this->normalizePhoneNumber($user->phone);
            $this->sendWhatsAppMessage($normalizedPhone, $message);

            Log::info('Payment reminder notification sent', [
                'user_id' => $user->id,
                'order_id' => $user->order_id
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to send payment reminder notification', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Test WhatsApp integration
     */
    public function testWhatsAppIntegration(string $testPhone): array
    {
        try {
            $testMessage = "🧪 *TEST MESSAGE*

This is a test message from sekolahkaya.com payment system.

Time: " . now()->format('Y-m-d H:i:s') . "

If you receive this, WhatsApp integration is working correctly.";

            $normalizedPhone = $this->normalizePhoneNumber($testPhone);
            $this->sendWhatsAppMessage($normalizedPhone, $testMessage);

            return [
                'success' => true,
                'message' => 'Test message sent successfully',
                'target_phone' => $normalizedPhone
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Test message failed',
                'error' => $e->getMessage()
            ];
        }
    }
}