<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Forbidden | B.S.D.L.V. Inter College</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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
            border: 1px solid rgba(26, 75, 140, 0.1);
        }

        .error-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #1a4b8c, #8B4513, #B22222);
        }

        .college-header {
            margin-bottom: 40px;
        }

        .college-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .logo-circle {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.8rem;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.2);
        }

        .college-name {
            text-align: left;
        }

        .college-name h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            color: #1a4b8c;
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

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #1a4b8c;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 3px 3px 0 rgba(26, 75, 140, 0.1);
            position: relative;
            display: inline-block;
        }

        .error-code::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
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

        .shield-icon {
            font-size: 5rem;
            color: #8B4513;
            margin-bottom: 30px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
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
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            color: white;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(26, 75, 140, 0.4);
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

        .permission-list {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            margin: 30px auto;
            max-width: 500px;
            text-align: left;
            border-left: 4px solid #8B4513;
        }

        .permission-list h3 {
            color: #8B4513;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .permission-list ul {
            list-style: none;
            padding-left: 0;
        }

        .permission-list li {
            padding: 8px 0;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .permission-list li::before {
            content: '✓';
            color: #1a4b8c;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #1a4b8c;
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
            
            .college-logo {
                flex-direction: column;
                text-align: center;
            }
            
            .college-name {
                text-align: center;
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
            
            .error-message {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="college-header">
            <div class="college-logo">
                <div class="logo-circle">B</div>
                <div class="college-name">
                    <h1>B.S.D.L.V. INTER COLLEGE</h1>
                    <p>Excellence in Education Since 1960</p>
                </div>
            </div>
        </div>

        <div class="error-content">
            <div class="shield-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            
            <div class="error-code">403</div>
            <h1 class="error-title">Access Restricted</h1>
            <p class="error-message">
                You don't have permission to access this resource. This area is restricted to authorized personnel only.
            </p>
            
            <div class="permission-list">
                <h3>Available to:</h3>
                <ul>
                    <li>Registered Students</li>
                    <li>Faculty Members</li>
                    <li>Administrative Staff</li>
                    <li>Authorized Parents/Guardians</li>
                </ul>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="{{ url('/login') }}" class="btn btn-secondary">
                <i class="fas fa-sign-in-alt"></i> Login to Continue
            </a>
            <a href="{{ url('/contact') }}" class="btn btn-secondary">
                <i class="fas fa-envelope"></i> Contact Admin
            </a>
        </div>

        <div class="footer">
            <p>If you believe this is an error, please contact the administration.</p>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+91-XXX-XXXXXXX</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>admin@bsdlvcollege.edu.in</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <span>Mon-Fri: 8:00 AM - 4:00 PM</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html> -->