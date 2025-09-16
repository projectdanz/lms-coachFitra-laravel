<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Complete Python Course</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .payment-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            display: grid;
            min-height: 600px;
        }

        /* LEFT SIDE - COURSE INFO */
        .course-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .course-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            width: fit-content;
        }

        .bestseller-icon {
            background: #ffd700;
            color: #333;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-size: 12px;
        }

        .course-title {
            font-size: 28px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 16px;
        }

        .course-description {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 24px;
        }

        .course-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .rating-stars {
            color: #ffd700;
        }

        .course-details {
            list-style: none;
            margin-top: 20px;
        }

        .course-details li {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .course-details li i {
            margin-right: 10px;
            width: 16px;
        }

        /* RIGHT SIDE - PAYMENT FORM */
        .payment-form {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: #666;
            font-size: 14px;
        }

        .price-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
        }

        .price-main {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .price-original {
            text-decoration: line-through;
            opacity: 0.7;
            font-size: 18px;
            margin-right: 8px;
        }

        .price-discount {
            background: #ff4757;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .countdown {
            margin-top: 10px;
            font-size: 14px;
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 16px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 16px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-input::placeholder {
            color: #aaa;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 184, 148, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .guarantee {
            text-align: center;
            font-size: 14px;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .guarantee i {
            color: #00b894;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .payment-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }

            .course-info {
                padding: 30px 20px;
            }

            .payment-form {
                padding: 30px 20px;
            }

            .course-title {
                font-size: 24px;
            }

            .price-main {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .course-info,
            .payment-form {
                padding: 20px;
            }

            .course-title {
                font-size: 20px;
            }

            .form-title {
                font-size: 20px;
            }
        }

        /* LOADING STATE */
        .submit-btn.loading {
            position: relative;
            color: transparent;
        }

        .submit-btn.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* SUCCESS MESSAGE */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* VALIDATION STYLES */
        .form-input.error {
            border-color: #ff4757;
            background-color: #fff5f5;
        }

        .form-input.success {
            border-color: #00b894;
        }

        .error-message {
            color: #ff4757;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .success-message {
            color: #00b894;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <!-- RIGHT SIDE - PAYMENT FORM -->
        <div class="payment-form">
            <div class="form-header">
                <h2 class="form-title">Complete Your Purchase</h2>
                <p class="form-subtitle">Secure payment - Start learning today!</p>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    Please correct the errors below.
                </div>
            @endif

            <form id="paymentForm" action="{{ route('payment.create') }}" method="POST">
                @csrf
                <input type="hidden" name="method" value="snap">
                <input type="hidden" id="course_id" name="course_id" value="1" required>

                <div class="form-group">
                    <label for="username" class="form-label">Full Name *</label>
                    <input type="text" id="username" name="customer[username]"
                        class="form-input @error('customer.username') is-invalid @enderror"
                        placeholder="Enter your full name" value="{{ old('customer.username') }}" required>
                    @error('customer.username')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <span class="error-message" id="usernameError"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="customer[email]"
                        class="form-input @error('customer.email') is-invalid @enderror"
                        placeholder="your.email@example.com" value="{{ old('customer.email') }}" required>
                    @error('customer.email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text" id="phone" name="customer[phone]"
                        class="form-input @error('customer.phone') is-invalid @enderror" placeholder="08xxxxxxxxxx"
                        value="{{ old('customer.phone') }}" required>
                    @error('customer.phone')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                    <span class="error-message" id="phoneError"></span>
                </div>
                
                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-lock"></i>
                    Buy Now
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('paymentForm');
            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const submitBtn = document.getElementById('submitBtn');
            
            // Error elements
            const usernameError = document.getElementById('usernameError');
            const emailError = document.getElementById('emailError');
            const phoneError = document.getElementById('phoneError');
            
            // Validation functions
            function validateUsername() {
                const value = username.value.trim();
                if (value === '') {
                    showError(username, usernameError, 'Full name is required');
                    return false;
                } else if (value.length < 3) {
                    showError(username, usernameError, 'Name must be at least 3 characters');
                    return false;
                } else if (!/^[a-zA-Z\s]+$/.test(value)) {
                    showError(username, usernameError, 'Name can only contain letters and spaces');
                    return false;
                } else {
                    showSuccess(username, usernameError);
                    return true;
                }
            }
            
            function validateEmail() {
                const value = email.value.trim();
                if (value === '') {
                    showError(email, emailError, 'Email is required');
                    return false;
                } else if (!isValidEmail(value)) {
                    showError(email, emailError, 'Please enter a valid email address');
                    return false;
                } else {
                    showSuccess(email, emailError);
                    return true;
                }
            }
            
            function validatePhone() {
                const value = phone.value.trim();
                // Remove non-digit characters for validation
                const digitsOnly = value.replace(/\D/g, '');
                
                if (value === '') {
                    showError(phone, phoneError, 'Phone number is required');
                    return false;
                } else if (digitsOnly.length < 10 || digitsOnly.length > 12) {
                    showError(phone, phoneError, 'Phone number must be 10-12 digits');
                    return false;
                } else if (!/^08/.test(digitsOnly)) {
                    showError(phone, phoneError, 'Phone number must start with 08');
                    return false;
                } else {
                    showSuccess(phone, phoneError);
                    return true;
                }
            }
            
            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
            
            function showError(input, errorElement, message) {
                input.classList.remove('success');
                input.classList.add('error');
                errorElement.textContent = message;
            }
            
            function showSuccess(input, errorElement) {
                input.classList.remove('error');
                input.classList.add('success');
                errorElement.textContent = '';
            }
            
            // Real-time validation
            username.addEventListener('input', validateUsername);
            email.addEventListener('input', validateEmail);
            phone.addEventListener('input', validatePhone);
            
            // Form submission
            form.addEventListener('submit', function(e) {
                // Validate all fields
                const isUsernameValid = validateUsername();
                const isEmailValid = validateEmail();
                const isPhoneValid = validatePhone();
                
                // If any validation fails, prevent form submission
                if (!isUsernameValid || !isEmailValid || !isPhoneValid) {
                    e.preventDefault();
                    
                    // Add loading state only if form is valid
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                } else {
                    // Add loading state
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                    
                    // Optional: You can remove this timeout in production
                    // This is just for demo purposes
                    setTimeout(() => {
                        // Form will submit naturally after this
                    }, 1000);
                }
            });
            
            // Format phone number as user types
            phone.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 12) {
                    value = value.substring(0, 12);
                }
                
                // Format based on length
                if (value.length >= 12) {
                    value = value.replace(/(\d{4})(\d{4})(\d{4})/, '$1-$2-$3');
                } else if (value.length >= 6) {
                    value = value.replace(/(\d{4})(\d{1,4})/, '$1-$2');
                }
                
                e.target.value = value;
            });
        });
        
    </script>
</body>

</html>