<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Berhasil - Course Online</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .content {
            position: relative;
            z-index: 1;
        }
        
        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(76, 175, 80, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); }
        }
        
        .success-icon i {
            color: white;
            font-size: 35px;
        }
        
        .title {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtitle {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 35px;
            line-height: 1.6;
        }
        
        .steps-container {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .steps-title {
            font-size: 22px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .steps-title .lightning {
            color: #f39c12;
            animation: flash 2s ease-in-out infinite;
        }
        
        @keyframes flash {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .step-item {
            display: flex;
            align-items: flex-start;
            text-align: left;
            margin-bottom: 20px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .step-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .step-number {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .step-text {
            flex: 1;
            font-size: 16px;
            color: #34495e;
            line-height: 1.5;
            font-weight: 500;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 35px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            min-width: 200px;
            justify-content: center;
        }
        
        .btn-email {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .btn-email:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.6);
        }
        
        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
        }
        
        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.6);
        }
        
        .footer-note {
            margin-top: 30px;
            padding: 20px;
            background: rgba(241, 196, 15, 0.1);
            border-left: 4px solid #f1c40f;
            border-radius: 10px;
            color: #f39c12;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .title {
                font-size: 26px;
            }
            
            .subtitle {
                font-size: 16px;
            }
            
            .steps-title {
                font-size: 20px;
            }
            
            .step-text {
                font-size: 15px;
            }
            
            .btn {
                min-width: 100%;
                padding: 12px 25px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1 class="title">Pembelian Berhasil!</h1>
            <p class="subtitle">Terima kasih telah mempercayai kami. Course yang Anda beli sudah aktif dan siap untuk dipelajari!</p>
            
            <div class="steps-container">
                <h2 class="steps-title">
                    <span class="lightning">⚡</span>
                    Langkah Akses Course
                </h2>
                
                <div class="step-item">
                    <div class="step-number">1️⃣</div>
                    <div class="step-text">Pilih course yang sudah kamu beli</div>
                </div>
                
                <div class="step-item">
                    <div class="step-number">2️⃣</div>
                    <div class="step-text">Setelah itu masukan Password Course, lalu tekan Enroll Now</div>
                </div>
                
                <div class="step-item">
                    <div class="step-number">3️⃣</div>
                    <div class="step-text">Masukan Email, dan Password yang sudah kami berikan</div>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="https://mail.google.com/mail/u/0/#all" class="btn btn-email" target="_blank">
                    <i class="fas fa-envelope"></i>
                    Cek Email Anda
                </a>
                
                <a href="https://wa.me/6289502433722" class="btn btn-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    Buka WhatsApp
                </a>
            </div>
            
            <div class="footer-note">
                <i class="fas fa-info-circle"></i>
                <strong>Penting:</strong> Silakan cek email dan WhatsApp Anda untuk mendapatkan detail akses course dan password yang diperlukan.
            </div>
        </div>
    </div>
</body>
</html>