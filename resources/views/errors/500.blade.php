<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | B.S.D.L.V. Inter College</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root{
                        --accent: #f9a826;
                        --accent-hover: #ffb347;
        }

        body {
            font-family: serif;
            background: linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%);
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
            border: 1px solid rgba(178, 34, 34, 0.1);
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background:  #1a4b8c;
        }

        .college-header {
            margin-bottom: 40px;
        }

        .college-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .logo-shield img {
            width: 130px;
            height: 130px;
            /* background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border-radius: 50%;
            font-size: 3rem;
            font-weight: 700;
            font-family: serif;
            box-shadow: 0 10px 25px rgba(26, 75, 140, 0.3);
            position: relative;
            transition: transform 0.5s ease;
            border: 4px solid white;
        }

      .logo-shield img:hover {
            transform: rotate(10deg);
            transition: transform 0.5s ease;
            border-color:#f9a826;
            transform: scale(1.8);
            Z-index:99999;
        }

        .college-name {
            text-align: center;
        }

        .college-name h1 {
            font-family: serif;
            font-size: 2rem;
            color: #1a4b8c;
;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .college-name p {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .error-content {
            margin-bottom: 40px;
        }

        .server-icon {
            font-size: 6rem;
            color: #B22222;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #B22222;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0 rgba(178, 34, 34, 0.1);
            position: relative;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #8B4513, transparent);
        }

        .error-title {
            font-size: 2.2rem;
            color: #B22222;
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

        .technical-details {
            background: #fff8f8;
            border-radius: 10px;
            padding: 25px;
            margin: 30px auto;
            max-width: 600px;
            text-align: left;
            border-left: 4px solid #B22222;
        }

        .technical-details h3 {
            color: #B22222;
            margin-bottom: 15px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
            justify-content: center;
        }

        .status-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .status-light {
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }

        .status-light.green { background: #28a745; animation: blink 2s infinite; }
        .status-light.yellow { background: #ffc107; animation: blink 2s infinite 0.5s; }
        .status-light.red { background: #dc3545; animation: blink 2s infinite 1s; }

        @keyframes blink {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .status-label {
            font-size: 0.9rem;
            color: #666;
        }

        .maintenance-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 30px auto;
            max-width: 500px;
            border: 2px dashed #8B4513;
        }

        .maintenance-info h4 {
            color: #8B4513;
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
            background: linear-gradient(135deg, #B22222, #dc3545);
            color: white;
            box-shadow: 0 5px 15px rgba(178, 34, 34, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(178, 34, 34, 0.4);
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

        .footer {
            margin-top: 40px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 20px;
            width: 100%;
        }

        .technical-support {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .support-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: #B22222;
            text-align: center;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.8rem;
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
            
            .status-indicator {
                flex-wrap: wrap;
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
            
            .server-icon {
                font-size: 4rem;
            }
            
            .college-name h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="college-header">
            <div class="college-logo">
                <div class="logo-shield"><img src="image/logo.jpeg" alt=""></div>
                <div class="college-name">
                    <h1>B.S.D.L.V. INTER COLLEGE</h1>
                    <p>Technical Support Center</p>
                </div>
            </div>
        </div>

        <div class="error-content">
            <div class="server-icon">
                <i class="fas fa-server"></i>
            </div>
            
            <div class="error-code">500</div>
            <h1 class="error-title">Internal Server Error</h1>
            <p class="error-message">
                Our academic server is experiencing technical difficulties. 
                Our technical team has been notified and is working to resolve the issue.
            </p>
            
            <div class="status-indicator">
                <div class="status-item">
                    <div class="status-light green"></div>
                    <span class="status-label">Database</span>
                </div>
                <div class="status-item">
                    <div class="status-light yellow"></div>
                    <span class="status-label">Application</span>
                </div>
                <div class="status-item">
                    <div class="status-light red"></div>
                    <span class="status-label">Web Server</span>
                </div>
            </div>
            
            <div class="technical-details">
                <h3>
                    <i class="fas fa-tools"></i>
                    Technical Information
                </h3>
                <p>
                    <strong>Error ID:</strong> #{{ Str::random(10) }}<br>
                    <strong>Time:</strong> {{ now()->format('Y-m-d H:i:s') }}<br>
                    <strong>Server:</strong> Academic Portal Server
                </p>
            </div>
            
            <div class="maintenance-info">
                <h4>
                    <i class="fas fa-clock"></i>
                    Scheduled Maintenance
                </h4>
                <p>
                    Regular maintenance occurs every Sunday from 2:00 AM to 4:00 AM.
                    During this time, the portal may be temporarily unavailable.
                </p>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-redo"></i> Refresh Page
            </a>
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="mailto:it-support@bsdlvcollege.edu.in" class="btn btn-secondary">
                <i class="fas fa-envelope"></i> Email IT Support
            </a>
        </div>

        <div class="footer">
            <p>Our technical team is actively working to resolve this issue.</p>
            <div class="technical-support">
                <div class="support-item">
                    <i class="fas fa-headset"></i>
                    <span>IT Help Desk</span>
                    <strong>+91 8081096231</strong>
                </div>
                <div class="support-item">
                    <i class="fas fa-envelope"></i>
                    <span>Email Support</span>
                    <strong>it-support@bsdlvcollege.edu.in</strong>
                </div>
                <div class="support-item">
                    <i class="fas fa-clock"></i>
                    <span>Support Hours</span>
                    <strong>8:00 AM - 8:00 PM</strong>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        // Auto refresh after 30 seconds
        setTimeout(() => {
            window.location.reload();
        }, 30000);
        
        // Update status lights randomly
        setInterval(() => {
            const lights = document.querySelectorAll('.status-light');
            lights.forEach(light => {
                if(Math.random() > 0.7) {
                    light.style.opacity = Math.random() > 0.5 ? '1' : '0.3';
                }
            });
        }, 2000);
    </script>
</body>
</html> -->