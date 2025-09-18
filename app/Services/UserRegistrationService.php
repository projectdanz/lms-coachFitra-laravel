<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserRegistrationService
{
    public function __construct(
        private NotificationService $notificationService
    ) {}

    /**
     * Process user access after successful payment
     */
    public function processUserAccess(User $user, Course $course): void
    {
        try {
            if ($this->isReturningCustomer($user)) {
                Log::info("Returning customer detected", [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
                
                $this->handleReturningCustomer($user, $course);
            } else {
                Log::info("New customer detected", [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
                
                $this->handleNewCustomer($user, $course);
            }
        } catch (\Exception $e) {
            Log::error('Error processing user access', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Even if registration fails, try to send notifications with fallback
            $this->notificationService->sendPaymentSuccessNotifications(
                $user, 
                $course, 
                null, 
                'WordPress registration failed. Please contact support for access.'
            );
            
            throw $e;
        }
    }

    /**
     * Check if user is a returning customer
     */
    private function isReturningCustomer(User $currentUser): bool
    {
        // Check for existing users with same email or phone (excluding current user)
        $existingCount = User::where(function ($query) use ($currentUser) {
            $query->where('email', $currentUser->email)
                  ->orWhere('phone', $currentUser->phone);
        })
        ->where('id', '!=', $currentUser->id)
        ->whereNotNull('paid_at') // Only count users who have completed payments
        ->count();

        return $existingCount > 0;
    }

    /**
     * Handle returning customer
     */
    private function handleReturningCustomer(User $user, Course $course): void
    {
        // Find previous successful user with same email/phone
        $previousUser = User::where(function ($query) use ($user) {
            $query->where('email', $user->email)
                  ->orWhere('phone', $user->phone);
        })
        ->where('id', '!=', $user->id)
        ->whereNotNull('paid_at')
        ->first();

        Log::info('Processing returning customer', [
            'current_user_id' => $user->id,
            'previous_user_id' => $previousUser->id ?? null
        ]);

        // Send notifications without password (they should use existing account)
        $this->notificationService->sendPaymentSuccessNotifications(
            $user, 
            $course, 
            null,
            'You already have an account. Please use your existing login credentials.'
        );
    }

    /**
     * Handle new customer registration
     */
    private function handleNewCustomer(User $user, Course $course): void
    {
        $password = Str::random(8);
        $registrationResult = $this->registerUserToWordPress($user, $password);

        if ($registrationResult['success']) {
            // Update user with WordPress password
            $user->update([
                'password' => $password,
                'wordpress_id' => $registrationResult['wordpress_id'] ?? null,
                'registered_at' => now(),
            ]);

            Log::info('WordPress registration successful', [
                'user_id' => $user->id,
                'wordpress_id' => $registrationResult['wordpress_id'] ?? null
            ]);

            // Send success notifications with password
            $this->notificationService->sendPaymentSuccessNotifications(
                $user, 
                $course, 
                $registrationResult['password']
            );
        } else {
            // Registration failed, handle gracefully
            $this->handleRegistrationFailure($user, $course, $registrationResult['error']);
        }
    }

    /**
     * Register user to WordPress
     */
    private function registerUserToWordPress(User $user, string $password): array
    {
        $maxRetries = 3;
        $retryCount = 0;

        while ($retryCount < $maxRetries) {
            try {
                Log::info('Attempting WordPress registration', [
                    'user_id' => $user->id,
                    'attempt' => $retryCount + 1,
                    'max_retries' => $maxRetries
                ]);

                $response = Http::withBasicAuth(
                        config('app.wp.username'),
                        config('app.wp.password')
                    )
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post('https://ecourse.sekolahkaya.com/wp-json/wp/v2/users', [
                        'username' => $this->generateUniqueUsername($user->username, $retryCount),
                        'email' => $user->email,
                        'password' => $password,
                        'meta' => [
                            'order_id' => $user->order_id,
                            'phone' => $user->phone,
                        ]
                    ]);

                if ($response->successful()) {
                    $responseData = $response->json();
                    
                    Log::info('WordPress registration successful', [
                        'user_id' => $user->id,
                        'wordpress_response' => $responseData
                    ]);

                    return [
                        'success' => true,
                        'password' => $password,
                        'wordpress_id' => $responseData['id'] ?? null,
                        'wordpress_username' => $responseData['username'] ?? null,
                    ];
                }

                // Handle specific WordPress errors
                $errorData = $response->json();
                $errorCode = $errorData['code'] ?? 'unknown';

                Log::warning('WordPress registration failed', [
                    'user_id' => $user->id,
                    'attempt' => $retryCount + 1,
                    'status_code' => $response->status(),
                    'error_code' => $errorCode,
                    'error_data' => $errorData
                ]);

                // Don't retry for certain errors
                if (in_array($errorCode, ['existing_user_login', 'existing_user_email'])) {
                    break;
                }

                $retryCount++;
                
                if ($retryCount < $maxRetries) {
                    // Wait before retry (exponential backoff)
                    $waitTime = pow(2, $retryCount);
                    Log::info("Retrying WordPress registration in {$waitTime} seconds", [
                        'user_id' => $user->id
                    ]);
                    sleep($waitTime);
                }

            } catch (\Exception $e) {
                Log::error('WordPress registration exception', [
                    'user_id' => $user->id,
                    'attempt' => $retryCount + 1,
                    'error' => $e->getMessage()
                ]);

                $retryCount++;
                
                if ($retryCount >= $maxRetries) {
                    break;
                }
                
                // Wait before retry
                sleep(pow(2, $retryCount));
            }
        }

        return [
            'success' => false,
            'error' => 'WordPress registration failed after ' . $maxRetries . ' attempts',
            'last_response' => $response ?? null
        ];
    }

    /**
     * Generate unique username for WordPress
     */
    private function generateUniqueUsername(string $baseUsername, int $attempt = 0): string
    {
        $username = $baseUsername;
        
        if ($attempt > 0) {
            $username .= '_' . ($attempt + 1);
        }
        
        // Ensure username meets WordPress requirements
        $username = preg_replace('/[^a-zA-Z0-9._-]/', '', $username);
        $username = substr($username, 0, 60); // WordPress max length
        
        return $username;
    }

    /**
     * Handle registration failure gracefully
     */
    private function handleRegistrationFailure(User $user, Course $course, string $error): void
    {
        Log::error('WordPress registration failed completely', [
            'user_id' => $user->id,
            'error' => $error
        ]);

        // Mark user for manual processing
        $user->update([
            'registration_status' => 'failed',
            'registration_error' => $error,
            'needs_manual_processing' => true,
        ]);

        // Send notification with manual process instructions
        $fallbackMessage = "WordPress registration encountered an issue. Your payment is confirmed. " . 
                          "Our support team will create your account manually within 24 hours. " .
                          "Please contact support with your order ID: {$user->order_id}";

        $this->notificationService->sendPaymentSuccessNotifications(
            $user, 
            $course, 
            null, 
            $fallbackMessage
        );

        // Optionally notify admin/support team
        $this->notificationService->notifyAdminOfRegistrationFailure($user, $error);
    }

    /**
     * Manually create user account (for admin use)
     */
    public function manuallyCreateAccount(User $user, string $password): array
    {
        if (!$user->needs_manual_processing) {
            throw new \InvalidArgumentException('User does not need manual processing');
        }

        $result = $this->registerUserToWordPress($user, $password);
        
        if ($result['success']) {
            $user->update([
                'password' => $result['password'],
                'wordpress_id' => $result['wordpress_id'] ?? null,
                'registered_at' => now(),
                'registration_status' => 'completed',
                'needs_manual_processing' => false,
                'registration_error' => null,
            ]);

            Log::info('Manual account creation successful', [
                'user_id' => $user->id,
                'wordpress_id' => $result['wordpress_id'] ?? null
            ]);
        }

        return $result;
    }

    /**
     * Retry failed registrations (for batch processing)
     */
    public function retryFailedRegistrations(string $password = 'password'): array
    {
        $failedUsers = User::where('needs_manual_processing', true)
            ->where('payment_status', 'completed')
            ->limit(10) // Process in batches
            ->get();

        $results = [];

        foreach ($failedUsers as $user) {
            try {
                $result = $this->manuallyCreateAccount($user, $password);
                $results[] = [
                    'user_id' => $user->id,
                    'success' => $result['success'],
                    'error' => $result['error'] ?? null
                ];
            } catch (\Exception $e) {
                $results[] = [
                    'user_id' => $user->id,
                    'success' => false,
                    'error' => $e->getMessage()
                ];
            }
        }

        return $results;
    }
}