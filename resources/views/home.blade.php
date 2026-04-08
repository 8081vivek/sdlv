@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDLV Inter College - Excellence in Education Since 2016</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <!-- AOS CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1a4b8c;
            --secondary: #2c6cb0;
            --accent: #f9a826;
            --accent-light: #ffc55a;
            --accent-dark: #e8970f;
            --light: #ffffff;
            --dark: #2d3748;
            --success: #38a169;
            --danger: #e53e3e;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --radius: 8px;
            --card-bg: #ffffff;
            --section-bg: #ffffff; /* White background for light mode */
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #1a4b8c, #2c6cb0);
            --gradient-accent: linear-gradient(135deg, #f9a826, #ffc55a);
        }

        /* Dark mode variables */
        [data-theme="dark"] {
            --light: #121212; /* Dark background */
            --dark: #e2e8f0;
            --card-bg: #1e1e1e; /* Dark card background */
            --section-bg: #121212; /* Black background for sections in dark mode */
            --border-color: #333333;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Source Serif Pro', serif;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--primary);
        }

        [data-theme="dark"] h1, 
        [data-theme="dark"] h2, 
        [data-theme="dark"] h3, 
        [data-theme="dark"] h4, 
        [data-theme="dark"] h5 {
            color: #90cdf4;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            text-align: center;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            min-height: 48px;
            font-family: 'Source Serif Pro', serif;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: var(--secondary);
        }

        .btn-accent {
            background: var(--accent);
        }

        .btn-accent:hover {
            background: var(--accent-dark);
        }

        .section {
            padding: 80px 0;
            position: relative;
            background-color: var(--section-bg); /* All sections have same background */
            transition: background-color 0.3s ease;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--accent);
            margin: 10px auto;
            border-radius: 2px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        [data-theme="dark"] .section-title p {
            color: #a0aec0;
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            width: 60px;
            height: 30px;
            display: flex;
            align-items: center;
            padding: 0 5px;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .theme-toggle:hover {
            transform: scale(1.05);
        }

        .toggle-slider {
            width: 22px;
            height: 22px;
            background: var(--accent);
            border-radius: 50%;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: white;
        }

        [data-theme="dark"] .toggle-slider {
            transform: translateX(30px);
        }

        .theme-toggle .fa-sun {
            color: #f6e05e;
            margin-right: 5px;
        }

        .theme-toggle .fa-moon {
            color: #2d3748;
            margin-left: 5px;
        }

        /* Quick Info Section */
        .quick-info {
            position: relative;
            z-index: 2;
        }

        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .info-card {
            background: var(--card-bg);
            padding: 30px 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            border-top: 4px solid var(--primary);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .info-card:hover::before {
            opacity: 1;
        }

        .info-card:hover {
            transform: translateY(-10px);
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .info-card:hover h3 {
            color: white;
        }

        .info-card-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .info-card:hover .info-card-icon {
            color: white;
        }

        .info-card h3 {
            margin-bottom: 15px;
            font-size: 1.3rem;
            transition: var(--transition);
        }

        /* Login Options Section */
        .login-options {
            width: 100%;
        }

        .login_access {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            justify-content: center;
            gap: 30px;
        }

        .login-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .login-card:hover::before {
            opacity: 1;
        }

        .login-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .login-card:hover h3 {
            color: white;
        }

        .login-icon {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-primary);
            color: white;
            font-size: 3rem;
            transition: var(--transition);
        }

        .login-card:hover .login-icon {
            background: rgba(255, 255, 255, 0.1);
        }

        .login-card h3 {
            padding: 20px 10px;
            color: var(--primary);
            font-size: 1.1rem;
            transition: var(--transition);
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Merriweather', serif;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-text h2 {
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .about-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }
        .about-image:has(img:hover) {
            transform: scale(1.05);
                box-shadow: var(--shadow-lg);
                border-color: var(--primary);
                
        }

        .about-image img {
            width: 100%;
            height: 400px;
            -webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
            transition: var(--transition);
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        /* Principal Message */
        .principal-message {
            background-color: var(--section-bg);
        }

        .message-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
            align-items: center;
        }

        .principal-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .principal-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .principal-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .principal-overlay h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .principal-overlay p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .message-content {
            padding: 20px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .message-content h2 {
            margin-bottom: 20px;
            color: var(--primary);
        }

        .message-content p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .principal-name {
            font-weight: 600;
            color: var(--primary);
            margin-top: 20px;
            font-style: italic;
        }

        /* Manager Message */
        .manager-message {
            background-color: var(--section-bg);
        }

        .manager-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .manager-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .manager-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .manager-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .manager-overlay h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .manager-overlay p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .manager-content {
            padding: 20px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .manager-content h2 {
            margin-bottom: 20px;
            color: var(--primary);
        }

        .manager-content p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .manager-name {
            font-weight: 600;
            color: var(--primary);
            margin-top: 20px;
            font-style: italic;
        }

        /* Academics Section */
        .academics {
            background: var(--section-bg);
        }

        .academics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .academic-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .academic-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .academic-icon {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-primary);
            color: white;
            font-size: 3rem;
        }

        .academic-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .academic-content h3 {
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .academic-content ul {
            margin-left: 20px;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .academic-content li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }

        .academic-content li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success);
            font-weight: bold;
        }

        /* Facilities Section */
        .facilities {
            background-color: var(--section-bg);
        }

        .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .facility-card {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .facility-img {
            height: 220px;
            overflow: hidden;
        }

        .facility-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .facility-card:hover .facility-img img {
            transform: scale(1.1);
        }

        .facility-content {
            padding: 20px;
            background-color: var(--card-bg);
        }

        .facility-content h3 {
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .facility-content p {
            color: #666;
        }

        [data-theme="dark"] .facility-content p {
            color: #a0aec0;
        }

        /* Gallery Section */
        .gallery {
            background: var(--section-bg);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 200px;
            position: relative;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 15px;
            transform: translateY(100%);
            transition: var(--transition);
        }

        .gallery-overlay h4 {
            color: white;
            font-size: 1.2rem;
        }

        .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        /* Event Section */
        .events {
            background-color: var(--section-bg);
        }

        .event-grid {
            display: grid;
            gap: 30px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .event-card {
            border: 1px solid var(--border-color);
            border-radius: 15px;
            overflow: hidden;
            background: var(--card-bg);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .event-date {
            height: 100px;
            color: white;
            text-align: center;
            border-radius: 15px 15px 0 0;
            background: var(--gradient-primary);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .day {
            font-size: 40px;
            font-weight: 800;
        }

        .month {
            font-size: 20px;
        }

        .event-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .event-meta {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #555;
        }

        [data-theme="dark"] .event-meta {
            color: #a0aec0;
        }

        .event-meta i {
            margin-right: 5px;
        }

        /* Announcements */
        .announcements {
            background-color: var(--section-bg);
        }

        .announcement-container {
            max-width: 800px;
            margin: 0 auto;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 30px;
        }

        .announcement-item {
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .announcement-content h4 {
            margin-bottom: 5px;
        }

        .announcement-date {
            color: #666;
            font-size: 0.9rem;
        }

        [data-theme="dark"] .announcement-date {
            color: #a0aec0;
        }

        /* Contact Section */
        .contact {
            background-color: var(--section-bg);
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info h3 {
            margin-bottom: 20px;
            color: var(--primary);
        }

        .contact-details {
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-text h4 {
            margin-bottom: 5px;
        }

        .map-container {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 400px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            transition: var(--transition);
        }

        .social-icons a:hover {
            transform: translateY(-3px);
            background: var(--secondary);
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
            box-shadow: var(--shadow);
            border: none;
            font-size: 1.2rem;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .section {
                padding: 60px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .about-content,
            .message-container,
            .manager-container,
            .contact-container {
                grid-template-columns: 1fr;
            }
            
            .principal-image,
            .manager-image {
                max-width: 300px;
                margin: 0 auto;
            }
            
            .login_access {
                grid-template-columns: 1fr;
            }
            
            .section {
                padding: 40px 0;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .info-cards,
            .facility-grid,
            .academics-grid {
                grid-template-columns: 1fr;
            }
            
            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
            }
            
            .login-card {
                height: 200px;
            }
            
            .login-icon {
                height: 120px;
            }
        }
    </style>
</head>
<body>
 @include('header')

    <!-- Quick Info Section -->
    <section class="section quick-info">
         <div class="section-title" data-aos="fade-down">
                <h2>About Our Institution</h2>
                <p>Shaping futures with quality education since 2016.</p>
            </div>
        <div class="container">
            <div class="info-cards">
                <div class="info-card" data-aos="fade-up-left" data-aos-delay="50">
                    <div class="info-card-icon">
<i class="fas fa-book-open"></i>
                    </div>
                    <h3>Our History</h3>
                    <p>“Dedicated to service since 2016, delivering 100% results.” |</p>
                </div>
                <div class="info-card " data-aos="fade-up" data-aos-delay="70">
                    <div class="info-card-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>Unparalleled contribution to the field of education located in MOHDDINPUR  NAIBASTI MaDHOGANJ Hardoi.</p>
                </div>
                <div class="info-card" data-aos="fade-up-right" data-aos-delay="90">
                    <div class="info-card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Our Location</h3>
                    <p>LAT: 27.0630224, LONG: 80.1355547</p>
                </div>
                <div class="info-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="info-card-icon">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <h3>Our Address</h3>
                    <p>MOHDDINPUR  NAIBASTI MaDHOGANJ ,Hardoi, 241302</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Options Section -->
    <section class="section login-options">
        <div class="container">
            <div class="section-title " data-aos="fade-down" >
                <h2>Quick Access</h2>
                <p>Access various portals for students, teachers and administration</p>
            </div>
         
            <div class="login_access">
                <!-- <div class="login-card">
                    <a href="teacherlogin.html">
                        <div class="login-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>Teacher Login</h3>
                    </a>
                </div> -->
                <div class="login-card" data-aos="fade-up" data-aos-delay="50">
                    <a href="studentlogin.html">
                        <div class="login-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Student Login</h3>
                    </a>
                </div>
               
                <div class="login-card" data-aos="fade-up" data-aos-delay="70">
                    <a href="result.html">
                        <div class="login-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Student Result</h3>
                    </a>
                </div>
                <div class="login-card" data-aos="fade-up" data-aos-delay="150">
                    <a href="https://t.me/IT_Technology50">
                        <div class="login-icon">
                            <i class="fab fa-telegram"></i>
                        </div>
                        <h3>Telegram Group</h3>
                    </a>
                </div>
                <div class="login-card" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF">
                        <div class="login-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h3>WhatsApp Group</h3>
                    </a>
                </div>
                <div class="">
                
                </div>
                <div class="login-card" data-aos="fade-up" data-aos-delay="220">
                    <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF">
                        <div class="login-icon">
<i class="fas fa-phone"></i>
                        </div>
                        <h3>Contact Us</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section about" id="about" data-aos="fade-down">
        <div class="container">
            <div class="section-title" data-aos="fade-up" delay="10">
                <h2>About Our College</h2>
                <p>B.S.D.L.V. Inter College has been providing quality education for over two decades</p>
            </div>
            <div class="about-content" data-aos="fade-up" data-aos-delay="50">
                <div class="about-text" data-aos="fade-right" data-aos-delay="70">
                    <h2>Welcome to B.S.D.L.V. Inter College</h2>
                    <p>Established in 2016, B.S.D.L.V. Inter College has been a beacon of quality education in the MOHDDINPUR  NAIBASTI MaDHOGANJ region of Hardoi. Our institution is committed to providing holistic education that nurtures not only academic excellence but also character development.</p>
                    <p>With a dedicated team of experienced educators and state-of-the-art facilities, we strive to create an environment where every student can discover their potential and develop into responsible citizens.</p>
                    <p>Our curriculum is designed to balance academic rigor with co-curricular activities, ensuring the all-round development of our students.</p>
                </div>
                <div class="about-image" data-aos="fade-left" data-aos-delay="100">
                    <!-- College Image -->
                    <img data-aos="zoom-in" data-aos-delay="500" src="image/1.jpeg" alt="SDLV Inter College Campus">
                </div>
            </div>
        </div>
    </section>
    <!-- Principal Message -->
    <section class="section principal-message" data-aos="fade-down">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-delay="150">
                <h2>Principal's Message</h2>
                <p>Words of wisdom from our esteemed principal</p>
            </div>
            <div class="message-container">
                <div class="principal-image" >
                    <!-- Principal Photo -->
                    <img  data-aos="zoom-out-up" data-aos-delay="50" src="image/principal-photo.jpg" alt="Dr. Ramesh Kumar, Principal">
                    <div class="principal-overlay">
                        <h4>Mrs. MANJU KUMARI
</h4>
                        <p>Principal, B.S.D.L.V.I. Inter College</p>
                    </div>
                </div>
                <div class="message-content" data-aos="fade-left" data-aos-delay="200">
                    <h2>Dear Students, Parents, and Well-wishers,</h2>
                    <p>It gives me immense pleasure to welcome you to B.S.D.L.V. Inter College, an institution that has been shaping young minds since 2016. Our commitment to excellence in education is reflected in our consistent 100% results and the holistic development of our students.</p>
                    <p>At B.S.D.L.V.I., we believe that education is not just about academic achievement but about nurturing responsible, compassionate, and well-rounded individuals. Our dedicated faculty works tirelessly to create a learning environment that encourages curiosity, critical thinking, and creativity.</p>
                    <p>We take pride in our state-of-the-art facilities, including smart classrooms, well-equipped laboratories, a comprehensive library, and spaces for sports and cultural activities. These resources, combined with our innovative teaching methodologies, ensure that our students receive a world-class education.</p>
                    <p>I invite you to explore our website to learn more about our programs, facilities, and the vibrant life at B.S.D.L.V. Inter College. Together, let us continue our journey towards excellence in education.</p>
                    <p class="principal-name">- Mrs. MANJU KUMARI, Principal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Manager Message -->
    <section class="section manager-message">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Manager's Message</h2>
                <p>Insights from our dedicated manager</p>
            </div>
            <div class="manager-container">
                <div class="manager-content" data-aos="fade-right" data-aos-delay="200">
                    <h2>Dear Students and Parents,</h2>
                    <p>As the manager of B.S.D.L.V. Inter College, it is my privilege to oversee the administrative and operational aspects of our institution, ensuring that we provide the best possible environment for learning and growth.</p>
                    <p>Our college is committed to maintaining high standards in all areas, from infrastructure to academic delivery. We continuously invest in upgrading our facilities and resources to meet the evolving needs of education in the 21st century.</p>
                    <p>I work closely with our principal, teaching staff, and support teams to create a safe, inclusive, and stimulating environment where every student can thrive. Our focus remains on providing quality education that prepares students not just for examinations, but for life.</p>
                    <p>I encourage parents to actively participate in their children's educational journey and welcome your feedback and suggestions for further improvement of our institution.</p>
                    <p class="manager-name">- Mr. Phoolchnadra Verma, Manager</p>
                </div>
                <div class="manager-image" data-aos="zoom-in" data-aos-delay="300">
                    <!-- Manager Photo -->
                    <img src="image/manager-photo.jpg" alt="Mr. Phoolchnadra Verma, Manager">
                    <div class="manager-overlay">
                        <h4>Mr. Phoolchnadra Verma</h4>
                        <p>Manager, B.S.D.L.V. Inter College</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Facilities Section -->
    <section class="section facilities" id="facilities">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Our Facilities</h2>
                <p>State-of-the-art infrastructure to support holistic learning and development</p>
            </div>
            <div class="facility-grid">
                <div class="facility-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="facility-img">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Smart Classroom">
                    </div>
                    <div class="facility-content">
                        <h3>Smart Classroom</h3>
                        <p>Modern technology-enabled learning environment with interactive boards and digital resources</p>
                    </div>
                </div>
                <div class="facility-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="facility-img">
                        <img src="image/12.jpeg" alt="Science Lab">
                    </div>
                    <div class="facility-content">
                        <h3>Science Lab</h3>
                        <p>Well-equipped laboratory for practical learning and scientific experiments</p>
                    </div>
                </div>
                <div class="facility-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="facility-img">
                        <img src="image/10.jpeg" alt="Library">
                    </div>
                    <div class="facility-content">
                        <h3>Library</h3>
                        <p>Collection of 5000+ books for comprehensive learning and research</p>
                    </div>
                </div>
                <div class="facility-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="facility-img">
                        <img src="https://images.unsplash.com/photo-1591696205602-2f950c417dad?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Computer Lab">
                    </div>
                    <div class="facility-content">
                        <h3>Computer Lab</h3>
                        <p>Modern computing facilities for digital literacy and IT education</p>
                    </div>
                </div>
                <div class="facility-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="facility-img">
                        <img src="image/2.jpeg" alt="Sports Ground">
                    </div>
                    <div class="facility-content">
                        <h3>Sports Ground</h3>
                        <p>Spacious ground for various sports activities and physical education</p>
                    </div>
                </div>
                <div class="facility-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="facility-img">
                        <img src="https://images.unsplash.com/photo-1492684223066-e81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Auditorium">
                    </div>
                    <div class="facility-content">
                        <h3>Auditorium</h3>
                        <p>Modern auditorium for cultural events, seminars, and presentations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section gallery" id="gallery">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Photo Gallery</h2>
                <p>Moments from our campus life and activities</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="image/1.jpeg" alt="Annual Day Celebration">
                    <div class="gallery-overlay">
                        <h4>Annual Day Celebration</h4>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                    <img src="image/2.jpeg" alt="Annual Day Celebration">
                    <div class="gallery-overlay">
                        <h4>Science Exhibition</h4>
                    </div>
                </div>
                <div class="gallery-item"   data-aos="zoom-in" data-aos-delay="300">
                    <img src="image/3.jpeg" alt="Computer Lab Session">
                    <div class="gallery-overlay">
                        <h4>Computer Lab Session</h4>
                    </div>
                </div>
                <div class="gallery-item"  data-aos="zoom-in" data-aos-delay="400">
                    <img src="image/4.jpeg" alt="Sports Day 2023">
                    <div class="gallery-overlay">
                        <h4>Sports Day 2023</h4>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500">
                    <img src="image/5.jpeg" alt="Interactive Classroom">
                    <div class="gallery-overlay">
                        <h4>Interactive Classroom</h4>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600">
                    <img src="image/6.jpeg" alt="Library Reading Session">
                    <div class="gallery-overlay">
                        <h4>Library Reading Session</h4>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="700">
                    <img src="image/7.jpeg" alt="Library Reading Session">
                    <div class="gallery-overlay">
                        <h4>Library Reading Session</h4>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="800">
                    <img src="image/8.jpeg" alt="Library Reading Session">
                    <div class="gallery-overlay">
                        <h4>Library Reading Session</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Announcements Section -->
    <section class="section announcements" id="announcements" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="section-title">
                <h2>Latest Announcements</h2>
                <p>Stay updated with the latest news and events from our college</p>
            </div>
            <div class="announcement-container">
                <div class="announcement-item">
                    <div class="announcement-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="announcement-content">
                        <h4>Annual Sports Day</h4>
                        <p>Annual sports day will be held on 15th December 2023. All students are requested to participate.</p>
                        <div class="announcement-date">Posted on: November 10, 2023</div>
                    </div>
                </div>
                <div class="announcement-item">
                    <div class="announcement-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="announcement-content">
                        <h4>Parent-Teacher Meeting</h4>
                        <p>The next parent-teacher meeting is scheduled for 20th November 2023.</p>
                        <div class="announcement-date">Posted on: November 5, 2023</div>
                    </div>
                </div>
                <div class="announcement-item">
                    <div class="announcement-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="announcement-content">
                        <h4>Board Exam Results</h4>
                        <p>Congratulations to all students for achieving 100% results in board examinations.</p>
                        <div class="announcement-date">Posted on: October 25, 2023</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Get in touch with us for any queries or information</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Our Address</h4>
                                <p>MOHDDINPUR NAIBASTI MADHOGANJ, HARDOI, UTTAR PRADESH - 241302</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Phone Number</h4>
                                <p>+91-8081096231, +91-9450012345</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Email Address</h4>
                                <p>info@sdvlcollege.com, principal@sdvlcollege.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Working Hours</h4>
                                <p>Monday - Saturday: 8:00 AM - 3:00 PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/codelikevivek/"><i class="fab fa-instagram"></i></a>
                        <a href="http://www.youtube.com/@vivekpatel-8081"><i class="fab fa-youtube"></i></a>
                        <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.238900909577!2d80.132966!3d27.0630224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDAzJzQ2LjkiTiA4MMKwMDcnNTguNyJF!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>
    
@include('footer')

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
  AOS.init({
    duration: 1200, // Animation speed
    once: false,    // Scroll up & down पर animation चलेगा
    offset: 50      // Trigger point
  });
</script>

      
</body>
</html>