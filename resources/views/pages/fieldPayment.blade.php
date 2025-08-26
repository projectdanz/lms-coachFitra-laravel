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
    </style>
</head>
<body>
    <div class="payment-container">
        <!-- LEFT SIDE - COURSE INFO -->
        {{-- <div class="course-info">
            <div class="course-badge">
                <div class="bestseller-icon">
                    <i class="fas fa-crown"></i>
                </div>
                Bestseller
            </div>

            <h1 class="course-title">
                The Complete Python 2024: From Zero to Expert!
            </h1>

            <p class="course-description">
                Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!
            </p>

            <div class="course-stats">
                <div class="stat-item">
                    <span class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <span>4.8 (215,475 ratings)</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <span>616,029 students</span>
                </div>
            </div>

            <ul class="course-details">
                <li>
                    <i class="fas fa-calendar"></i>
                    Last updated 12/2024
                </li>
                <li>
                    <i class="fas fa-globe"></i>
                    English Language
                </li>
                <li>
                    <i class="fas fa-certificate"></i>
                    Certified Course
                </li>
                <li>
                    <i class="fas fa-play-circle"></i>
                    50 Lectures
                </li>
                <li>
                    <i class="fas fa-clock"></i>
                    5 Hrs 20 Min
                </li>
                <li>
                    <i class="fas fa-signal"></i>
                    Basic Level
                </li>
            </ul>
        </div> --}}

        <!-- RIGHT SIDE - PAYMENT FORM -->
        <div class="payment-form">
            <div class="form-header">
                <h2 class="form-title">Complete Your Purchase</h2>
                <p class="form-subtitle">Secure payment - Start learning today!</p>
            </div>

            {{-- <div class="price-section">
                <div class="price-main">
                    $60.99
                    <span class="price-original">$84.99</span>
                    <span class="price-discount">28% off</span>
                </div>
                <div class="countdown">
                    <i class="fas fa-clock"></i>
                    3 days left at this price!
                </div>
            </div> --}}

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    Please correct the errors below.
                </div>
            @endif

            <form action="{{ route('payment.create') }}" method="POST">
                @csrf

                

               <input type="hidden" name="method" value="snap">
               <input type="hidden" name="amount" value="1">
               <div class="form-group">
    <label for="item_id_0">Item ID</label>
    <input type="text"
           id="item_id_0"
           name="items[0][id]"
           class="form-input @error('items.0.id') is-invalid @enderror"
           placeholder="Item ID"
           value="{{ old('items.0.id') }}">
    @error('items.0.id')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="item_name_0">Item Name *</label>
    <input type="text"
           id="item_name_0"
           name="items[0][name]"
           class="form-input @error('items.0.name') is-invalid @enderror"
           placeholder="Item Name"
           value="{{ old('items.0.name') }}"
           required>
    @error('items.0.name')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="item_price_0">Item Price *</label>
    <input type="number"
           id="item_price_0"
           name="items[0][price]"
           class="form-input @error('items.0.price') is-invalid @enderror"
           placeholder="10000"
           value="{{ old('items.0.price') }}"
           required>
    @error('items.0.price')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="item_quantity_0">Quantity *</label>
    <input type="number"
           id="item_quantity_0"
           name="items[0][quantity]"
           class="form-input @error('items.0.quantity') is-invalid @enderror"
           placeholder="1"
           value="{{ old('items.0.quantity') }}"
           required>
    @error('items.0.quantity')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>


                {{-- Full Name --}}
                <div class="form-group">
                    <label for="username" class="form-label">Full Name *</label>
                    <input type="text"
                        id="username"
                        name="username"
                        class="form-input @error('username') is-invalid @enderror"
                        placeholder="Enter your full name"
                        value="{{ old('username') }}"
                        required>
                    @error('username')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        placeholder="your.email@example.com"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text"
                        id="phone"
                        name="phone"
                        class="form-input @error('phone') is-invalid @enderror"
                        placeholder="08xxxxxxxxxx"
                        value="{{ old('phone') }}"
                        required>
                    @error('phone')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-lock"></i>
                    Buy Now
                </button>

                {{-- <div class="guarantee">
                    <i class="fas fa-shield-alt"></i>
                    30-Day Money-Back Guarantee
                </div> --}}
            </form>
        </div>
    </div>

    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');

            // Add loading state
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;

            // Optional: You can remove this timeout in production
            // This is just for demo purposes
            setTimeout(() => {
                // Form will submit naturally after this
            }, 1000);
        });

        // Format phone number as user types
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 10) {
                value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
            } else if (value.length >= 6) {
                value = value.replace(/(\d{3})(\d{3})/, '($1) $2-');
            } else if (value.length >= 3) {
                value = value.replace(/(\d{3})/, '($1) ');
            }
            e.target.value = value;
        });
    </script>
</body>
</html>
