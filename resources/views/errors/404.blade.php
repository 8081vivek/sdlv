<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | B.S.D.L.V. Inter College</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7ff 0%, #e3e9ff 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #333;
        }

        .error-container {
            max-width: 900px;
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

        .college-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.3);
        }

        .college-name {
            text-align: center;
            margin-bottom: 30px;
        }

        .college-name h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            color: #1a4b8c;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .college-name p {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }

        .error-content {
            margin-bottom: 40px;
            position: relative;
        }

        .error-visual {
            position: relative;
            height: 200px;
            margin-bottom: 40px;
        }

        .book-stack {
            position: absolute;
            width: 100px;
            height: 140px;
            background: linear-gradient(135deg, #8B4513, #A0522D);
            border-radius: 5px;
            left: 30%;
            top: 30px;
            transform: rotate(-10deg);
            box-shadow: 5px 5px 15px rgba(139, 69, 19, 0.3);
        }

        .book-stack::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1a4b8c, #4a7abc);
            border-radius: 5px;
            left: 20px;
            top: -10px;
            transform: rotate(5deg);
            z-index: -1;
            box-shadow: 5px 5px 15px rgba(26, 75, 140, 0.3);
        }

        .magnifying-glass {
            position: absolute;
            right: 30%;
            top: 50px;
            width: 120px;
            height: 120px;
            border: 8px solid #B22222;
            border-radius: 50%;
            animation: search 4s infinite ease-in-out;
        }

        .magnifying-glass::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 8px;
            background: #B22222;
            bottom: -30px;
            right: 10px;
            transform: rotate(45deg);
            border-radius: 4px;
        }

        @keyframes search {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(20px) rotate(5deg); }
            50% { transform: translateX(-20px) rotate(-5deg); }
            75% { transform: translateX(10px) rotate(3deg); }
        }

        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #1a4b8c;
            line-height: 1;
            margin: 30px 0 20px;
            text-shadow: 3px 3px 0 rgba(26, 75, 140, 0.1);
        }

        .error-title {
            font-size: 2.5rem;
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

        .search-box {
            max-width: 500px;
            margin: 40px auto;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 16px 50px 16px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #1a4b8c;
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.1);
        }

        .search-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: #1a4b8c;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background: #153a6d;
            transform: translateY(-50%) scale(1.1);
        }

        .popular-links {
            margin: 40px auto;
            max-width: 600px;
        }

        .popular-links h3 {
            color: #8B4513;
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .link-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #1a4b8c;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid #e0e0e0;
        }

        .link-item:hover {
            background: #1a4b8c;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 75, 140, 0.2);
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

        .footer {
            margin-top: 50px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
            padding-top: 20px;
            width: 100%;
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

        .page-path {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
            font-family: 'Courier New', monospace;
            color: #666;
            border-left: 4px solid #B22222;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 6rem;
            }
            
            .error-title {
                font-size: 1.8rem;
            }
            
            .error-visual {
                height: 150px;
            }
            
            .book-stack, .magnifying-glass {
                transform: scale(0.8);
            }
            
            .book-stack {
                left: 20%;
            }
            
            .magnifying-glass {
                right: 20%;
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
            
            .links-grid {
                grid-template-columns: 1fr 1fr;
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
            
            .college-name h1 {
                font-size: 1.8rem;
            }
            
            .links-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="college-header">
            <div class="college-badge">
                <i class="fas fa-graduation-cap"></i>
                <span>B.S.D.L.V. Inter College</span>
            </div>
            
            <div class="college-name">
                <h1>Pursuing Excellence in Education</h1>
                <p>Since 1960 - Shaping Future Leaders</p>
            </div>
        </div>

        <div class="error-content">
            <div class="error-visual">
                <div class="book-stack"></div>
                <div class="magnifying-glass"></div>
            </div>
            
            <div class="error-code">404</div>
            <h1 class="error-title">Page Not Found</h1>
            <p class="error-message">
                The page you're looking for seems to have gone missing from our academic library. 
                It might have been moved, renamed, or doesn't exist.
            </p>
            
            <div class="page-path">
                <i class="fas fa-map-marker-alt"></i>
                Requested URL: <strong>{{ url()->current() }}</strong>
            </div>
            
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search our academic portal...">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            
            <div class="popular-links">
                <h3>Popular Destinations</h3>
                <div class="links-grid">
                    <a href="{{ url('/') }}" class="link-item">
                        <i class="fas fa-home"></i> Homepage
                    </a>
                    <a href="{{ url('/academics') }}" class="link-item">
                        <i class="fas fa-book"></i> Academics
                    </a>
                    <a href="{{ url('/admissions') }}" class="link-item">
                        <i class="fas fa-user-graduate"></i> Admissions
                    </a>
                    <a href="{{ url('/faculty') }}" class="link-item">
                        <i class="fas fa-chalkboard-teacher"></i> Faculty
                    </a>
                    <a href="{{ url('/results') }}" class="link-item">
                        <i class="fas fa-chart-line"></i> Results
                    </a>
                    <a href="{{ url('/contact') }}" class="link-item">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">
                <i class="fas fa-home"></i> Return to Homepage
            </a>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="{{ url('/contact') }}" class="btn btn-secondary">
                <i class="fas fa-headset"></i> Report Issue
            </a>
        </div>

        <div class="footer">
            <p>Need assistance? Our academic support team is here to help.</p>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>Help Desk: +91-XXX-XXXXXXX</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>support@bsdlvcollege.edu.in</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Main Campus, City Name</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        document.querySelector('.search-button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.search-input').value;
            if(searchTerm.trim()) {
                window.location.href = `{{ url('/search') }}?q=${encodeURIComponent(searchTerm)}`;
            }
        });
        
        document.querySelector('.search-input').addEventListener('keypress', function(e) {
            if(e.key === 'Enter') {
                document.querySelector('.search-button').click();
            }
        });
    </script>
</body>
</html> -->