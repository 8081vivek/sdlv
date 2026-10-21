<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Source Serif Pro', serif;
            line-height: 1.6;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Light Mode Variables (Default) */
        :root {
            /* WHITE FOOTER BACKGROUND */
            --footer-bg: white;
            --footer-text: #333;  /* Dark text for white background */
            --footer-heading: #1a4b8c;  /* Dark blue for headings */
            --footer-link: #555;  /* Dark gray for links */
            --footer-link-hover: #f9a826; /* Keep orange for hover */
            --footer-border: rgba(0, 0, 0, 0.1); /* Darker border for white background */
            --social-bg: rgba(0, 0, 0, 0.08); /* Darker social icons background */
            --social-hover: #f9a826;
            --footer-bottom-text: #666; /* Dark gray for bottom text */
            --icon-color: #1a4b8c; /* Dark blue for icons */
        }

        /* Dark Mode Variables */
        body.dark-mode {
            --footer-bg: #1a1a1a;  /* Solid dark color */
            --footer-text: #e6e6e6;
            --footer-heading: #ffffff;
            --footer-link: rgba(255, 255, 255, 0.75);
            --footer-link-hover: #4dabf7;
            --footer-border: rgba(255, 255, 255, 0.15);
            --social-bg: rgba(255, 255, 255, 0.15);
            --social-hover: #4dabf7;
            --footer-bottom-text: rgba(255, 255, 255, 0.6);
            --icon-color: #4dabf7;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Footer Styles */
        footer {
            background: var(--footer-bg);
            color: var(--footer-text);
            padding: 60px 0 20px;
            font-family: 'Source Serif Pro', serif;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 2px solid var(--footer-border);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            color: var(--footer-heading);
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
            font-size: 1.5rem;
            font-family: 'Merriweather', serif;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--icon-color);
            transition: background 0.3s ease;
        }

        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }

        .footer-contact i {
            color: var(--icon-color);
            margin-top: 3px;
            min-width: 20px;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--social-bg);
            border-radius: 50%;
            transition: all 0.3s ease;
            color: var(--footer-text);
            text-decoration: none;
            font-size: 1.1rem;
        }

        .social-links a:hover {
            background: var(--social-hover);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: var(--footer-link);
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.05rem;
        }

        .footer-links a:hover {
            color: var(--footer-link-hover);
            transform: translateX(5px);
        }

        .footer-links a i {
            color: var(--icon-color);
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid var(--footer-border);
            font-size: 1rem;
            color: var(--footer-bottom-text);
            transition: all 0.3s ease;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }
            
            .footer-column h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-contact li {
                justify-content: center;
                text-align: center;
            }
            
            .footer-links a {
                justify-content: center;
            }
            
            .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            footer {
                padding: 40px 0 15px;
            }
            
            .footer-content {
                gap: 30px;
            }
            
            .footer-column h3 {
                font-size: 1.3rem;
            }
            
            .footer-contact li,
            .footer-links a {
                font-size: 1rem;
            }
            
            .footer-bottom {
                font-size: 0.9rem;
            }
        }

        /* Page Content Styles for Demo */
        .page-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body:not(.dark-mode) .page-content {
            background-color: #f8f9fa;
            color: #333;
        }

        body.dark-mode .page-content {
            background-color: #121212;
            color: #e0e0e0;
        }

        /* Header Styles (with toggle button) */
        .header {
            background: linear-gradient(135deg, #1a4b8c, #2c6cb0);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        body.dark-mode .header {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo h1 {
            font-family: 'Merriweather', serif;
            color: white;
            font-size: 1.8rem;
        }

        .theme-toggle-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .theme-toggle {
            position: relative;
            width: 60px;
            height: 30px;
        }

        .theme-toggle-checkbox {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .theme-toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.2);
            transition: .4s;
            border-radius: 34px;
        }

        .theme-toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        .theme-toggle-checkbox:checked + .theme-toggle-slider {
            background-color: #4dabf7;
        }

        .theme-toggle-checkbox:checked + .theme-toggle-slider:before {
            transform: translateX(30px);
        }

        .theme-toggle-label {
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            padding: 60px 0;
        }

        .content-container {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .content-container h2 {
            font-family: 'Merriweather', serif;
            font-size: 2.2rem;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        body:not(.dark-mode) .content-container h2 {
            color: #1a4b8c;
        }

        body.dark-mode .content-container h2 {
            color: #4dabf7;
        }

        .content-container p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        body:not(.dark-mode) .stat-item {
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .stat-item {
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        body:not(.dark-mode) .stat-number {
            color: #1a4b8c;
        }

        body.dark-mode .stat-number {
            color: #4dabf7;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--footer-link);
        }
    </style>
</head>
<body>
      
        <!-- Footer -->
        <footer id="contact">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>Contact Us</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Ishwar Pur Sai, Mallawan, Hardoi, Uttar Pradesh, India</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>+91-8081096231</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>info@sdvlcollege.com</span>
                            </li>
                        </ul>
                        
                        <div class="social-links">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="#home"><i class="fas fa-chevron-right"></i> Home</a></li>
                            <li><a href="#about"><i class="fas fa-chevron-right"></i> About Us</a></li>
                            <li><a href="#academics"><i class="fas fa-chevron-right"></i> Academics</a></li>
                            <li><a href="#facilities"><i class="fas fa-chevron-right"></i> Facilities</a></li>
                            <li><a href="#gallery"><i class="fas fa-chevron-right"></i> Gallery</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3>Important Links</h3>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Admission Process</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Fee Structure</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Academic Calendar</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> School Policies</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i> Careers</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <p>&copy; 2023 SDLV Inter College. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    

    <script>
        // Theme Management System
        class ThemeManager {
            constructor() {
                this.themeToggle = document.getElementById('themeToggle');
                this.init();
            }

            init() {
                // Check for saved theme preference
                const savedTheme = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                // Set initial theme
                if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                    this.enableDarkMode();
                }

                // Set toggle state
                this.themeToggle.checked = document.body.classList.contains('dark-mode');

                // Add event listener
                this.themeToggle.addEventListener('change', () => this.toggleTheme());
            }

            enableDarkMode() {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            }

            enableLightMode() {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            }

            toggleTheme() {
                if (this.themeToggle.checked) {
                    this.enableDarkMode();
                } else {
                    this.enableLightMode();
                }
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            const themeManager = new ThemeManager();

            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (!localStorage.getItem('theme')) {
                    if (e.matches) {
                        themeManager.enableDarkMode();
                        themeManager.themeToggle.checked = true;
                    } else {
                        themeManager.enableLightMode();
                        themeManager.themeToggle.checked = false;
                    }
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>