<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #4CAF50;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .order-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            border-left: 4px solid #667eea;
        }

        .order-details h3 {
            color: #2c3e50;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #666;
        }

        .detail-value {
            color: #2c3e50;
            font-weight: 500;
        }

        .cta-section {
            text-align: center;
            margin: 40px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .footer p {
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .footer a {
            color: #667eea;
            text-decoration: none;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }

            .header, .content, .footer {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .cta-button {
                padding: 14px 30px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <div class="success-icon">✓</div>
            <h1>Payment Successful!</h1>
            <p>Your order has been processed successfully</p>
        </div>

        <!-- Content Section -->
        <div class="content">
            <div class="greeting">
                Hello {{ $username }},
            </div>

            <div class="message">
                Thank you for your payment! We're excited to confirm that your order has been successfully processed.
                Your account has been set up and you can now start enjoying our services.
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h3>Order Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Order ID:</span>
                    <span class="detail-value">#{{ $order_id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Username:</span>
                    <span class="detail-value">{{ $username }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $email }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Password:</span>
                    <span class="detail-value">{{ $password }}</span>
                </div>
            </div>

            <div class="message">
                Please keep your login credentials safe and secure. We recommend changing your password after your first login.
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ config('app.url') }}/login" class="cta-button">
                    Access Your Account
                </a>
            </div>

            <div class="message">
                If you have any questions or need assistance, please don't hesitate to contact our support team.
                We're here to help you get the most out of your experience.
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p><strong>{{ config('app.name', 'Your Company') }}</strong></p>
            <p>Thank you for choosing us!</p>

            <div class="social-links">
                <a href="{{ config('app.url') }}">Visit Website</a>
                <a href="{{ config('app.url') }}/support">Support</a>
                <a href="{{ config('app.url') }}/contact">Contact Us</a>
            </div>

            <p style="margin-top: 20px; font-size: 12px; opacity: 0.7;">
                This email was sent to {{ $email }}. If you didn't make this purchase, please contact us immediately.
            </p>
        </div>
    </div>
</body>
</html>
