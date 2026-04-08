<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Session Expired | B.S.D.L.V. Inter College</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e1ecf7 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #333;
        }

        .error-container {
            max-width: 800px;
            width: 100%;
            text-align: center;
            background: white;
            border-radius: 20px;
            padding: 50px 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #8B4513, #1a4b8c, #B22222);
        }

        .college-header {
            margin-bottom: 40px;
        }

        .college-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #8B4513, #A0522D);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            transform: rotate(45deg);
        }

        .brand-icon i {
            transform: rotate(-45deg);
        }

        .brand-text {
            text-align: left;
        }

        .brand-text h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            color: #8B4513;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .brand-text p {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .error-content {
            margin-bottom: 40px;
        }

        .clock-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 40px;
        }

        .clock-face {
            width: 100%;
            height: 100%;
            border: 8px solid #1a4b8c;
            border-radius: 50%;
            position: relative;
            background: white;
            box-shadow: 0 10px 30px rgba(26, 75, 140, 0.2);
        }

        .clock-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            background: #B22222;
            border-radius: 50%;
        }

        .hour-hand, .minute-hand {
            position: absolute;
            background: #8B4513;
            transform-origin: bottom center;
            left: 50%;
            bottom: 50%;
        }

        .hour-hand {
            width: 6px;
            height: 40px;
            margin-left: -3px;
            animation: hourRotate 36s linear infinite;
        }

        .minute-hand {
            width: 4px;
            height: 60px;
            margin-left: -2px;
            animation: minuteRotate 6s linear infinite;
        }

        @keyframes hourRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes minuteRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #8B4513;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0 rgba(139, 69, 19, 0.1);
        }

        .error-title {
            font-size: 2.2rem;
            color: #1a4b8c;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .error-message {
            font-size: 1.2rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        .session-info {
            background: #f9f5f0;
            border-radius: 10px;
            padding: 25px;
            margin: 30px auto;
            max-width: 500px;
            border: 2px solid #e8d4c1;
        }

        .session-info h3 {
            color: #8B4513;
            margin-bottom: 15px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .session-tips {
            text-align: left;
            margin-top: 20px;
        }

        .session-tips h4 {
            color: #1a4b8c;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .session-tips ul {
            list-style: none;
            padding-left: 0;
        }

        .session-tips li {
            padding: 8px 0;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .session-tips li::before {
            content: '•';
            color: #B22222;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .security-notice {
            background: #fff8f8;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
            border-left: 4px solid #B22222;
        }

        .security-notice h4 {
            color: #B22222;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8B4513, #A0522D);
            color: white;
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #1a4b8c;
            border: 2px solid #1a4b8c;
        }

        .btn-secondary:hover {
            background: #1a4b8c;
            color: white;
            transform: translateY(-3px);
        }

        .btn-login {
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            color: white;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(26, 75, 140, 0.4);
        }

        .footer {
            margin-top: 40px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 20px;
            width: 100%;
        }

        .session-help {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .help-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8B4513;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.8rem;
            }
            
            .college-brand {
                flex-direction: column;
                text-align: center;
            }
            
            .brand-text {
                text-align: center;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .error-container {
                padding: 30px 20px;
            }
            
            .error-code {
                font-size: 5rem;
            }
            
            .error-title {
                font-size: 1.5rem;
            }
            
            .clock-container {
                width: 120px;
                height: 120px;
            }
            
            .brand-text h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="college-header">
            <div class="college-brand">
                <div class="brand-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="brand-text">
                    <h1>B.S.D.L.V. INTER COLLEGE</h1>
                    <p>Secure Academic Portal</p>
                </div>
            </div>
        </div>

        <div class="error-content">
            <div class="clock-container">
                <div class="clock-face">
                    <div class="hour-hand"></div>
                    <div class="minute-hand"></div>
                    <div class="clock-center"></div>
                </div>
            </div>
            
            <div class="error-code">419</div>
            <h1 class="error-title">Session Expired</h1>
            <p class="error-message">
                Your session has timed out due to inactivity. For security reasons, 
                we automatically log out inactive sessions after 30 minutes.
            </p>
            
            <div class="session-info">
                <h3>
                    <i class="fas fa-clock"></i>
                    Session Timeout Information
                </h3>
                <p>Your previous session has been securely terminated.</p>
                
                <div class="session-tips">
                    <h4>To prevent this:</h4>
                    <ul>
                        <li>Stay active on the page</li>
                        <li>Save your work regularly</li>
                        <li>Use "Remember Me" during login</li>
                        <li>Keep the browser window open</li>
                    </ul>
                </div>
            </div>
            
            <div class="security-notice">
                <h4>
                    <i class="fas fa-shield-alt"></i>
                    Security Notice
                </h4>
                <p>
                    This security feature protects your academic data from unauthorized access. 
                    All unsaved data from your previous session may be lost.
                </p>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ url('/login') }}" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> Login Again
            </a>
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="{{ url('/contact') }}" class="btn btn-secondary">
                <i class="fas fa-question-circle"></i> Need Help?
            </a>
        </div>

        <div class="footer">
            <p>For assistance with login or session issues, contact our support team.</p>
            <div class="session-help">
                <div class="help-item">
                    <i class="fas fa-phone"></i>
                    <span>Support: +91-XXX-XXXXXXX</span>
                </div>
                <div class="help-item">
                    <i class="fas fa-envelope"></i>
                    <span>portal-support@bsdlvcollege.edu.in</span>
                </div>
                <div class="help-item">
                    <i class="fas fa-user-shield"></i>
                    <span>Security Team Available 24/7</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        // Countdown timer
        let countdown = 5; // minutes
        const timerElement = document.createElement('div');
        timerElement.style.cssText = `
            margin: 20px auto;
            padding: 10px 20px;
            background: #fff8f8;
            border-radius: 8px;
            color: #B22222;
            font-weight: 600;
            max-width: 300px;
            border: 2px dashed #B22222;
        `;
        
        function updateTimer() {
            timerElement.innerHTML = `
                <i class="fas fa-hourglass-half"></i>
                Redirecting to login in ${countdown}:00
            `;
            
            if(countdown === 0) {
                window.location.href = "{{ url('/login') }}";
            } else {
                countdown--;
                setTimeout(updateTimer, 60000); // Update every minute
            }
        }
        
        // Insert timer after error message
        const errorMessage = document.querySelector('.error-message');
        errorMessage.parentNode.insertBefore(timerElement, errorMessage.nextSibling);
        
        updateTimer();
    </script>
</body>
</html> -->