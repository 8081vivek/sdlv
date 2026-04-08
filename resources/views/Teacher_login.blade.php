
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login - B.S.D.L.V. Inter College</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&family=Source+Serif+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables with Serif Fonts */
        :root {
            --primary: #1a4b8c;
            --secondary: #8B4513;
            --accent: #B22222;
            --light: #f0f7ff;
            --dark: #2c3e50;
            --white: #ffffff;
            --success: #228B22;
            --gradient: linear-gradient(135deg, #1a4b8c, #4a7abc);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            line-height: 1.6;
            color: #333;
            background-color: var(--light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background: var(--gradient);
        }

        /* Login Container */
        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Login Form */
        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .school-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-right: 15px;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
        }

        .login-header h1 {
            color: var(--primary);
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-header p {
            color: var(--dark);
            opacity: 0.8;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #d1e3f8;
            border-radius: 6px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--light);
            font-family: 'Source Serif Pro', serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background-color: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 75, 140, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            opacity: 0.7;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
        }

        .remember-me label {
            font-size: 1rem;
            color: var(--dark);
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 1rem;
            transition: var(--transition);
        }

        .forgot-password:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .btn {
            padding: 15px;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-family: 'Playfair Display', serif;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
            width: 100%;
        }

        .btn-primary:hover {
            background: #153a6d;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .login-footer {
            text-align: center;
            margin-top: 30px;
            color: var(--dark);
            font-size: 1rem;
        }

        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* Login Sidebar */
        .login-sidebar {
            flex: 1;
            background: var(--primary);
            color: var(--white);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .sidebar-content {
            max-width: 350px;
            z-index: 2;
        }

        .sidebar-icon {
            font-size: 5rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .sidebar-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .sidebar-content p {
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.7;
            font-size: 1.1rem;
        }

        .feature-list {
            list-style: none;
            text-align: left;
        }

        .feature-list li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.05rem;
        }

        .feature-list i {
            color: #4CAF50;
        }

        /* Pattern Overlay */
        .pattern-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: 1;
        }

        /* Error Message */
        .error-message {
            color: var(--accent);
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        /* Success Message */
        .success-message {
            background: var(--success);
            color: var(--white);
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
            font-family: 'Source Serif Pro', serif;
        }

        /* Additional Options */
        .additional-options {
            margin-top: 25px;
            text-align: center;
        }

        .option-link {
            display: inline-block;
            margin: 0 10px;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .option-link:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }

            .login-sidebar {
                order: -1;
                padding: 30px;
            }

            .login-form {
                padding: 40px 30px;
            }
        }

        @media (max-width: 480px) {
            .login-form {
                padding: 30px 20px;
            }

            .login-sidebar {
                padding: 25px 20px;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .login-header h1 {
                font-size: 2rem;
            }
            
            .logo-text {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Login Form Section -->
        <div class="login-form">
            <div class="school-logo">
                <i class="fas fa-chalkboard-teacher logo-icon"></i>
                <div class="logo-text">SDLV Inter College</div>
            </div>
            
            <div class="login-header">
                <h1>Faculty Portal</h1>
                <p>Access your teaching resources and management tools</p>
            </div>

            <form id="teacherLoginForm" method="POST" action="/teacher_login">
                @csrf
                <div class="form-group">
                    <label for="teacherId" class="form-label">Teacher ID</label>
                    <div class="input-group">
                        <i class="fas fa-id-card input-icon"></i>
                        <input type="text" id="teacherId" class="form-control"  name="email"  placeholder="Enter your teacher ID" required>
                    </div>
               @error('email')
    <span class="text-danger" style="color:red;">{{ $message }}</span>
@enderror

                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" class="form-control"  name="password"    placeholder="Enter your password" required>
                    </div>
                      
@error('password')
    <span class="text-danger" style="color:red;">{{ $message }}</span>
@enderror
                </div>

                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Access Faculty Portal
                </button>
            </form>

            <div class="additional-options">
                <a href="#" class="option-link">New Faculty Registration</a>
                <span>|</span>
                <a href="#" class="option-link">Admin Login</a>
            </div>

            <div class="login-footer">
                <p>Need assistance? <a href="#">Contact IT Support</a></p>
            </div>
        </div>

        <!-- Login Sidebar -->
        <div class="login-sidebar">
            <div class="pattern-overlay"></div>
            <div class="sidebar-content">
                <i class="fas fa-chalkboard sidebar-icon"></i>
                <h2>Faculty Resources</h2>
                <p>Access comprehensive teaching tools, student management systems, and academic resources through our faculty portal.</p>
                
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Class & Attendance Management</li>
                    <li><i class="fas fa-check"></i> Gradebook & Assessment Tools</li>
                    <li><i class="fas fa-check"></i> Lesson Planning Resources</li>
                    <li><i class="fas fa-check"></i> Student Performance Analytics</li>
                    <li><i class="fas fa-check"></i> Communication with Parents</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        
    </script>
</body>
</html>