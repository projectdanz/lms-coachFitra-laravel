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

        .format-example {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
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

            <form id="paymentForm">
                <div class="form-group">
                    <label for="username" class="form-label">Full Name *</label>
                    <input type="text" id="username" name="customer[username]" class="form-input"
                        placeholder="Enter your full name" required>
                    <span class="error-message" id="usernameError"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="customer[email]" class="form-input"
                        placeholder="your.email@example.com" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text" id="phone" name="customer[phone]" class="form-input" 
                        placeholder="08**-****-****" required>
                    {{-- <div class="format-example">Format: 0819-1443-0274</div> --}}
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
                } else if (digitsOnly.length !== 12) {
                    showError(phone, phoneError, 'Phone number must be 12 digits (e.g., 0819-1443-0274)');
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
            phone.addEventListener('input', function(e) {
                formatPhoneNumber(e);
                validatePhone();
            });
            
            // Format phone number as user types
            function formatPhoneNumber(e) {
                let value = e.target.value.replace(/\D/g, '');
                
                // Limit to 12 digits
                if (value.length > 12) {
                    value = value.substring(0, 12);
                }
                
                // Format based on length: 0819-1443-0274
                if (value.length >= 8) {
                    value = value.replace(/(\d{4})(\d{4})(\d{0,4})/, '$1-$2-$3');
                } else if (value.length >= 5) {
                    value = value.replace(/(\d{4})(\d{0,4})/, '$1-$2');
                }
                
                e.target.value = value;
            }
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate all fields
                const isUsernameValid = validateUsername();
                const isEmailValid = validateEmail();
                const isPhoneValid = validatePhone();
                
                // If all validations pass, submit the form
                if (isUsernameValid && isEmailValid && isPhoneValid) {
                    // Add loading state
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                    
                    // Simulate form submission
                    setTimeout(() => {
                        alert('Form submitted successfully!');
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                    }, 1500);
                }
            });
        });
    </script>
</body>

</html>