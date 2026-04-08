<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.S.D.L.V.I. Inter College - Excellence in Education Since 1997</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">
    
    <style>
        /* ========== GLOBAL STYLES ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #003366;
            --secondary: #0066cc;
            --accent: #ff9900;
            --accent-light: #ffcc66;
            --accent-dark: #cc7a00;
            --light: #f8f9fa;
            --dark: #2d3748;
            --success: #28a745;
            --danger: #dc3545;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --radius: 8px;
            
            --bg-color: #f5f7fa;
            --text-color: #333333;
            --card-bg: white;
            --header-bg: white;
            --footer-bg: linear-gradient(135deg, #003366, #004080);
            --section-bg-light: linear-gradient(135deg, #f8f9fa, #e9ecef);
            --nav-bg: white;
            --nav-hover: rgba(0, 0, 0, 0.05);
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #003366, #0066cc);
            --gradient-accent: linear-gradient(135deg, #ff9900, #ffcc66);
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            border-radius: 20px;
        }

        [data-theme="dark"] {
            --bg-color: #1a1a1a;
            --text-color: #f8f9fa;
            --card-bg: #2d2d2d;
            --header-bg: #1a1a1a;
            --footer-bg: linear-gradient(135deg, #001a33, #00264d);
            --section-bg-light: linear-gradient(135deg, #2d2d2d, #3d3d3d);
            --nav-bg: #1a1a1a;
            --nav-hover: rgba(255, 255, 255, 0.1);
            --border-color: #444444;
            --dark: #e2e8f0;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.3);
            --gradient-primary: linear-gradient(135deg, #004080, #0066cc);
            --gradient-accent: linear-gradient(135deg, #ff9900, #ffcc66);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
            transition: background-color 0.5s ease, color 0.5s ease;
            min-width: 320px;
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
            color: #f8f9fa;
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
            display: block;
        }

        .container {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background: var(--gradient-primary);
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
            font-size: 1rem;
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
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-accent {
            background: var(--gradient-accent);
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, var(--accent-dark), var(--accent));
        }

        /* ========== ENHANCED HEADER ========== */
        header {
            background: var(--header-bg);
            color: #333;
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
            width: 100%;
        }

        [data-theme="dark"] header {
            color: #f8f9fa;
        }

        /* Top Bar */
        .header-top-bar {
            background: rgba(0, 0, 0, 0.05);
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
            color: #555;
            display: block;
        }

        [data-theme="dark"] .header-top-bar {
            background: rgba(255, 255, 255, 0.05);
            color: #ccc;
        }

        .header-top-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header-info {
            display: flex;
            gap: 25px;
            align-items: center;
            flex-wrap: wrap;
        }

        .header-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            opacity: 0.9;
            transition: var(--transition);
            white-space: nowrap;
            color: #555;
        }

        [data-theme="dark"] .header-info-item {
            color: #ccc;
        }

        .header-info-item:hover {
            opacity: 1;
            color: var(--accent);
        }

        .header-info-item i {
            color: var(--accent);
            font-size: 1rem;
        }

        .header-top-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-social {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            color: #555;
            font-size: 0.9rem;
        }

        [data-theme="dark"] .social-icon {
            background: rgba(255, 255, 255, 0.1);
            color: #ccc;
        }

        .social-icon:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-2px);
        }

        /* Main Header */
        .header-main {
            padding: 20px 0;
        }

        .header-main-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        /* Logo Section */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-shrink: 0;
            min-width: 0;
            flex: 1;
        }

        .logo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: var(--transition);
            background: linear-gradient(45deg, #fff, #f0f0f0);
            padding: 5px;
            flex-shrink: 0;
        }

        .logo:hover {
            transform: scale(1.1);
            border-color: var(--accent);
        }

        .school-name {
            text-align: left;
            min-width: 0;
            flex: 1;
            overflow: hidden;
        }

        .school-name h1 {
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: var(--primary);
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            letter-spacing: -0.5px;
        }

        [data-theme="dark"] .school-name h1 {
            color: #f8f9fa;
        }

        .school-name p {
            font-size: 1rem;
            opacity: 0.9;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #666;
        }

        [data-theme="dark"] .school-name p {
            color: #ccc;
        }

        .school-name p i {
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Header Controls */
        .header-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: auto;
            flex-shrink: 0;
        }

        /* Theme Toggle */
        .day-night-toggle {
            position: relative;
            width: 55px;
            height: 28px;
            background: var(--card-bg);
            border-radius: 30px;
            cursor: pointer;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8px;
            flex-shrink: 0;
        }

        .day-night-toggle:hover {
            transform: scale(1.05);
        }

        .day-night-toggle i {
            font-size: 0.9rem;
            transition: var(--transition);
            z-index: 2;
        }

        .day-night-toggle #sunIcon {
            color: #ff9900;
        }

        .day-night-toggle #moonIcon {
            color: #555;
        }

        [data-theme="dark"] .day-night-toggle #sunIcon {
            color: #777;
        }

        [data-theme="dark"] .day-night-toggle #moonIcon {
            color: #ffcc66;
        }

        .toggle-thumb {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: var(--accent);
            border-radius: 50%;
            transition: var(--transition);
            z-index: 1;
        }

        [data-theme="dark"] .toggle-thumb {
            left: 29px;
            background: #ff9900;
        }

        /* Mobile Menu Button */
        .mobile-nav-toggle {
            background: var(--gradient-accent);
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 1001;
            flex-shrink: 0;
        }

        .mobile-nav-toggle::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .mobile-nav-toggle:hover::before {
            left: 100%;
        }

        .mobile-nav-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .mobile-nav-toggle i {
            font-size: 1.3rem;
            transition: var(--transition);
        }

        .mobile-nav-toggle.active i {
            transform: rotate(90deg);
        }

        /* Header Contact Info */
        .header-contact {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-left: auto;
        }

        .header-clock {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.05);
            padding: 10px 15px;
            border-radius: var(--radius);
            min-width: 140px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid var(--border-color);
            color: #555;
        }

        [data-theme="dark"] .header-clock {
            background: rgba(255, 255, 255, 0.05);
            color: #ccc;
        }

        .clock-time {
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .clock-date {
            font-size: 0.8rem;
            opacity: 0.9;
            white-space: nowrap;
        }

        .header-highlight {
            background: var(--gradient-accent);
            color: white;
            padding: 10px 20px;
            border-radius: var(--radius);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            white-space: nowrap;
        }

        .header-highlight:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Navigation */
        nav {
            background: var(--nav-bg);
            padding: 0;
            width: 100%;
            transition: var(--transition);
            border-top: 1px solid var(--border-color);
        }

        .nav-links {
            display: flex;
            gap: 0;
            height: 60px;
            width: 100%;
            justify-content: space-between;
        }

        .nav-links li {
            flex: 1;
            text-align: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 0;
        }

        .nav-links li a {
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            transition: var(--transition);
            font-weight: 500;
            position: relative;
            overflow: hidden;
            border-bottom: 3px solid transparent;
            gap: 10px;
            font-size: 1rem;
            white-space: nowrap;
            width: 100%;
            color: #555;
        }

        [data-theme="dark"] .nav-links li a {
            color: #ccc;
        }

        .nav-links li a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--nav-hover);
            transition: var(--transition);
            z-index: -1;
        }

        .nav-links li a:hover::before {
            left: 0;
        }

        .nav-links li a:hover {
            color: var(--accent);
            border-bottom: 3px solid var(--accent);
        }

        .nav-links li a i {
            color: var(--accent);
            font-size: 1rem;
        }

        /* ========== ENHANCED SLIDER SECTION ========== */
        .hero {
            position: relative;
            height: 100vh;
            min-height: 600px;
            max-height: 900px;
            overflow: hidden;
            color: white;
            text-align: center;
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        /* Modern Slider with fade effect */
        .slider {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            transform: translateZ(0);
            will-change: opacity;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .slide-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            width: 90%;
            max-width: 900px;
            z-index: 2;
            padding: 30px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            border-radius: 15px;
        }

        .slide-content h1 {
            font-size: clamp(2rem, 5vw, 4rem);
            margin-bottom: 25px;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            line-height: 1.2;
            font-weight: 900;
            animation: fadeInUp 1s ease;
        }

        .slide-content p {
            font-size: clamp(1rem, 2.5vw, 1.5rem);
            margin-bottom: 35px;
            opacity: 0.95;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease 0.3s both;
        }

        .hero-btns {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.6s both;
        }

        .slider-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 25px;
            z-index: 10;
            pointer-events: none;
        }

        .slider-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            backdrop-filter: blur(5px);
            pointer-events: all;
            font-size: 1.3rem;
        }

        .slider-btn:hover {
            background: var(--accent);
            transform: scale(1.1);
        }

        /* Modern Dots Navigation */
        .slider-dots {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 10;
        }

        .dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dot::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: left 0.3s ease;
        }

        .dot.active {
            transform: scale(1.3);
        }

        .dot.active::before {
            left: 0;
        }

        .dot:hover {
            background: var(--accent-light);
            transform: scale(1.2);
        }

        /* Slider Progress Bar */
        .slider-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 11;
        }

        .slider-progress-bar {
            height: 100%;
            background: var(--gradient-accent);
            width: 0%;
            transition: width 5s linear;
        }

        .slider-progress-bar.active {
            width: 100%;
        }

        /* ========== BACK TO TOP BUTTON ========== */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            box-shadow: var(--shadow);
            z-index: 999;
            border: none;
            font-size: 1.2rem;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--gradient-accent);
            transform: translateY(-5px);
        }

        /* ========== RESPONSIVE BREAKPOINTS ========== */
        
        /* Big LED Screens (1920px and up) */
        @media (min-width: 1920px) {
            .container {
                max-width: 1800px;
                padding: 0 40px;
            }
            
            .logo {
                width: 110px;
                height: 110px;
            }
            
            .school-name h1 {
                font-size: 2.5rem;
            }
            
            .school-name p {
                font-size: 1.2rem;
            }
            
            .nav-links li a {
                font-size: 1.1rem;
                padding: 0 25px;
            }
            
            .btn {
                padding: 16px 32px;
                font-size: 1.1rem;
            }
        }

        /* Large Desktops (1440px to 1919px) */
        @media (min-width: 1440px) and (max-width: 1919px) {
            .container {
                max-width: 1400px;
            }
            
            .logo {
                width: 100px;
                height: 100px;
            }
            
            .school-name h1 {
                font-size: 2.2rem;
            }
        }

        /* Desktops (1200px to 1439px) */
        @media (min-width: 1200px) and (max-width: 1439px) {
            .container {
                max-width: 1200px;
            }
            
            .logo {
                width: 90px;
                height: 90px;
            }
            
            .school-name h1 {
                font-size: 1.9rem;
            }
        }

        /* Laptops (992px to 1199px) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .container {
                max-width: 1000px;
            }
            
            .header-info {
                gap: 15px;
            }
            
            .header-info-item {
                font-size: 0.85rem;
            }
            
            .school-name h1 {
                font-size: 1.7rem;
            }
            
            .nav-links li a {
                font-size: 0.9rem;
                padding: 0 15px;
            }
        }

        /* Tablets (768px to 991px) */
        @media (max-width: 991px) {
            .header-top-bar {
                padding: 8px 0;
            }
            
            .header-info-item span {
                display: none;
            }
            
            .header-info-item i {
                margin-right: 0;
                font-size: 1rem;
            }
            
            .header-main {
                padding: 15px 0;
            }
            
            .logo {
                width: 80px;
                height: 80px;
            }
            
            .school-name h1 {
                font-size: 1.5rem;
            }
            
            .school-name p {
                font-size: 0.9rem;
            }
            
            .header-clock {
                display: none;
            }
            
            .header-highlight span {
                font-size: 0.9rem;
            }
            
            /* Show mobile toggle on tablets */
            .mobile-nav-toggle {
                display: flex;
            }
            
            /* Hide desktop navigation on tablets */
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--nav-bg);
                flex-direction: column;
                box-shadow: var(--shadow-lg);
                z-index: 1000;
                height: auto;
                max-height: 80vh;
                overflow-y: auto;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li {
                text-align: left;
                border-bottom: 1px solid var(--border-color);
                justify-content: flex-start;
                height: auto;
            }
            
            .nav-links li a {
                padding: 18px 25px;
                justify-content: flex-start;
                font-size: 1.1rem;
                border-bottom: none;
            }
            
            .header-contact {
                display: none;
            }
        }

        /* Large Phones (576px to 767px) */
        @media (max-width: 767px) {
            .header-top-bar {
                display: none;
            }
            
            .header-main-content {
                gap: 15px;
            }
            
            .logo {
                width: 70px;
                height: 70px;
            }
            
            .school-name h1 {
                font-size: 1.3rem;
            }
            
            .school-name p {
                font-size: 0.85rem;
            }
            
            .header-controls {
                gap: 10px;
            }
            
            .mobile-nav-toggle {
                width: 40px;
                height: 40px;
            }
            
            .mobile-nav-toggle i {
                font-size: 1.2rem;
            }
            
            .day-night-toggle {
                width: 48px;
                height: 24px;
            }
            
            .toggle-thumb {
                width: 18px;
                height: 18px;
            }
            
            [data-theme="dark"] .toggle-thumb {
                left: 26px;
            }
            
            /* Slider adjustments for mobile */
            .hero {
                min-height: 450px;
                max-height: 600px;
            }
            
            .slide-content {
                padding: 20px;
                backdrop-filter: blur(3px);
            }
            
            .hero-btns {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            
            .btn {
                width: 220px;
                padding: 12px 24px;
            }
            
            .slider-btn {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
            
            .slider-nav {
                padding: 0 15px;
            }
        }

        /* Small Phones (375px to 575px) */
        @media (max-width: 575px) {
            .container {
                padding: 0 15px;
            }
            
            .logo-container {
                gap: 10px;
            }
            
            .logo {
                width: 60px;
                height: 60px;
            }
            
            .school-name h1 {
                font-size: 1.1rem;
            }
            
            .school-name p {
                font-size: 0.8rem;
            }
            
            .day-night-toggle {
                width: 45px;
                height: 22px;
            }
            
            .toggle-thumb {
                width: 16px;
                height: 16px;
            }
            
            [data-theme="dark"] .toggle-thumb {
                left: 25px;
            }
            
            .mobile-nav-toggle {
                width: 38px;
                height: 38px;
            }
            
            /* Slider adjustments for small phones */
            .hero {
                min-height: 400px;
                max-height: 550px;
            }
            
            .slide-content {
                padding: 15px;
                background: rgba(0, 0, 0, 0.4);
            }
            
            .slider-btn {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            
            .dot {
                width: 12px;
                height: 12px;
            }
            
            .slider-dots {
                bottom: 25px;
                gap: 12px;
            }
        }

        /* Extra Small Phones (below 374px) */
        @media (max-width: 374px) {
            .logo-container {
                gap: 8px;
            }
            
            .logo {
                width: 55px;
                height: 55px;
            }
            
            .school-name h1 {
                font-size: 1rem;
            }
            
            .school-name p {
                font-size: 0.75rem;
            }
            
            .header-controls {
                gap: 8px;
            }
            
            .day-night-toggle {
                width: 42px;
                height: 20px;
            }
            
            .toggle-thumb {
                width: 14px;
                height: 14px;
            }
            
            [data-theme="dark"] .toggle-thumb {
                left: 24px;
            }
            
            .mobile-nav-toggle {
                width: 36px;
                height: 36px;
            }
            
            .back-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }

        /* Mobile Landscape */
        @media (max-height: 500px) and (orientation: landscape) {
            .nav-links {
                max-height: 70vh;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-wrapper">
            <!-- Top Bar with contact info -->
            <div class="header-top-bar">
                <div class="container header-top-content">
                    <div class="header-info">
                        <div class="header-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Mohddinpur Naibasti, Hardoi, UP</span>
                        </div>
                        <div class="header-info-item">
                            <i class="fas fa-phone"></i>
                            <span>+91-8081096231</span>
                        </div>
                        <div class="header-info-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@sdvlcollege.com</span>
                        </div>
                    </div>
                    
                    <div class="header-top-right">
                        <div class="header-social">
                            <a href="#" class="social-icon" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-icon" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Header with logo and contact -->
            <div class="header-main">
                <div class="container header-main-content">
                    <div class="logo-container">
                        <img src="image/logo.jpeg" alt="SDLV Inter College Logo" class="logo">
                        <div class="school-name">
                            <h1>B.S.D.L.V.I. INTER COLLEGE</h1>
                            <p><i class="fas fa-map-pin"></i> MOHDDINPUR NAIBASTI, HARDOI</p>
                        </div>
                    </div>
                    
                    <div class="header-controls">
                        <!-- Dark/Light mode toggle button -->
                        <div class="day-night-toggle" id="themeToggleBtn">
                            <i class="fas fa-sun" id="sunIcon"></i>
                            <i class="fas fa-moon" id="moonIcon"></i>
                            <div class="toggle-thumb"></div>
                        </div>
 
                        <!-- Mobile menu toggle button -->
                        <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    
                    <div class="header-contact">
                        <div class="header-clock">
                            <div class="clock-time" id="currentTime">00:00:00</div>
                            <div class="clock-date" id="currentDate">Loading...</div>
                        </div>
                        
                        <a href="#admission" class="header-highlight">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Admission 2024-25 Open</span>
                        </a>
                    </div>
                </div>
            </div>
        
            <!-- Navigation Menu -->
            <nav>
                <div class="container">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="/"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="/about"><i class="fas fa-info-circle"></i> About</a></li>
                        <li><a href="/f"><i class="fas fa-building"></i> Facilities</a></li>
                        <li><a href="/gallery"><i class="fas fa-images"></i> Gallery</a></li>
                        <li><a href="/boy"><i class="fas fa-user-graduate"></i> Student Portal</a></li>
                        <li>
                            <a href="/staff"><i class="fas fa-users"></i> Our Staff</a>
                        </li>
                        <li><a href="/results"><i class="fas fa-chart-line"></i> Results</a></li>
                        <li>
                            <a href="https://wa.me/8081096231?text=Hello%20B.S.D.L.V.%20Inter%20College%20Team,%20I%20hope%20you%20are%20doing%20well.%20I%20have%20a%20query%20—%20kindly%20assist%20me." 
                                target="_blank"
                                title="Chat with us on WhatsApp">
                                <i class="fas fa-address-book"></i> Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section with Enhanced Slider -->
    <section class="hero" id="home">
        <div class="slider-container">
            <div class="slider" id="slider">
                <!-- Slide 1 -->
                <div class="slide active">
                    <img src="image/banner_01.jpg" alt="SDLV College Building">
                    <div class="slide-content">
                        <h1>Excellence in Education Since 1997</h1>
                        <p>Providing quality education and shaping future leaders with world-class infrastructure</p>
                        <div class="hero-btns">
                            <a href="#admission" class="btn">Admission Open</a>
                            <a href="#about" class="btn btn-accent">Explore Campus</a>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="slide">
                    <img src="image/banner_02.jpg" alt="Students at SDLV">
                    <div class="slide-content">
                        <h1>Nurturing Young Minds</h1>
                        <p>Creating an environment for holistic development and lifelong learning experiences</p>
                        <div class="hero-btns">
                            <a href="#academics" class="btn">Our Programs</a>
                            <a href="#gallery" class="btn btn-accent">View Gallery</a>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="slide">
                    <img src="image/banner_03.jpg" alt="College Achievements">
                    <div class="slide-content">
                        <h1>A Legacy of Achievements</h1>
                        <p>Celebrating excellence in academics, sports, and co-curricular activities</p>
                        <div class="hero-btns">
                            <a href="#achievements" class="btn">Our Achievements</a>
                            <a href="#contact" class="btn btn-accent">Join Us Today</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slider Navigation -->
            <div class="slider-nav">
                <button class="slider-btn" id="prevBtn" aria-label="Previous slide">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-btn" id="nextBtn" aria-label="Next slide">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <!-- Slider Dots -->
            <div class="slider-dots" id="sliderDots">
                <span class="dot active" data-index="0" aria-label="Slide 1"></span>
                <span class="dot" data-index="1" aria-label="Slide 2"></span>
                <span class="dot" data-index="2" aria-label="Slide 3"></span>
            </div>
            
            <!-- Slider Progress Bar -->
            <div class="slider-progress">
                <div class="slider-progress-bar" id="sliderProgressBar"></div>
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        // ========== THEME TOGGLE FUNCTIONALITY ==========
        const themeToggleBtn = document.getElementById('themeToggleBtn');
        const body = document.body;
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        
        // Check for saved theme or prefer-color-scheme
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme');
        
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            enableDarkMode();
        }
        
        function enableDarkMode() {
            body.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            sunIcon.style.color = '#777';
            moonIcon.style.color = '#ffcc66';
        }
        
        function enableLightMode() {
            body.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
            sunIcon.style.color = '#ff9900';
            moonIcon.style.color = '#555';
        }
        
        function toggleTheme() {
            if (body.getAttribute('data-theme') === 'dark') {
                enableLightMode();
            } else {
                enableDarkMode();
            }
        }
        
        themeToggleBtn.addEventListener('click', toggleTheme);
        
        // ========== DIGITAL CLOCK ==========
        function updateClock() {
            const now = new Date();
            const timeOptions = { 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit', 
                hour12: false 
            };
            const dateOptions = { 
                weekday: 'short', 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            };
            
            document.getElementById('currentTime').textContent = 
                now.toLocaleTimeString('en-IN', timeOptions);
            document.getElementById('currentDate').textContent = 
                now.toLocaleDateString('en-IN', dateOptions);
        }
        
        setInterval(updateClock, 1000);
        updateClock();
        
        // ========== MOBILE NAVIGATION TOGGLE ==========
        const mobileNavToggle = document.getElementById('mobileNavToggle');
        const navLinks = document.getElementById('navLinks');
        
        function toggleMobileMenu() {
            const isActive = navLinks.classList.toggle('active');
            mobileNavToggle.classList.toggle('active');
            mobileNavToggle.innerHTML = isActive ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
            
            // Prevent body scroll when menu is open
            document.body.style.overflow = isActive ? 'hidden' : '';
        }
        
        mobileNavToggle.addEventListener('click', toggleMobileMenu);
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    closeMobileMenu();
                }
            });
        });
        
        // Close menu when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 991) {
                if (!navLinks.contains(e.target) && 
                    !mobileNavToggle.contains(e.target) && 
                    navLinks.classList.contains('active')) {
                    closeMobileMenu();
                }
            }
        });
        
        function closeMobileMenu() {
            navLinks.classList.remove('active');
            mobileNavToggle.classList.remove('active');
            mobileNavToggle.innerHTML = '<i class="fas fa-bars"></i>';
            document.body.style.overflow = '';
        }
        
        // ========== WINDOW RESIZE HANDLER ==========
        function handleResize() {
            if (window.innerWidth > 991 && navLinks.classList.contains('active')) {
                closeMobileMenu();
            }
            
            // Update mobile toggle display based on screen size
            if (window.innerWidth <= 991) {
                mobileNavToggle.style.display = 'flex';
            } else {
                mobileNavToggle.style.display = 'none';
            }
        }
        
        window.addEventListener('resize', handleResize);
        handleResize(); // Initial check
        
        // ========== ENHANCED SMOOTH SLIDER ==========
        const slider = document.getElementById("slider");
        const slides = document.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".dot");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const progressBar = document.getElementById("sliderProgressBar");
        
        let currentSlide = 0;
        let slideInterval;
        const totalSlides = slides.length;
        
        // Initialize slider
        function initSlider() {
            updateDots();
            startAutoSlide();
            startProgressBar();
        }
        
        // Go to specific slide
        function goToSlide(index) {
            // Update current slide
            currentSlide = index;
            
            // Hide all slides
            slides.forEach(slide => {
                slide.classList.remove('active');
            });
            
            // Show current slide
            slides[currentSlide].classList.add('active');
            
            // Update dots
            updateDots();
            
            // Reset progress bar
            resetProgressBar();
        }
        
        // Next slide
        function nextSlide() {
            let nextIndex = currentSlide + 1;
            
            if (nextIndex >= totalSlides) {
                nextIndex = 0;
            }
            
            goToSlide(nextIndex);
        }
        
        // Previous slide
        function prevSlide() {
            let prevIndex = currentSlide - 1;
            
            if (prevIndex < 0) {
                prevIndex = totalSlides - 1;
            }
            
            goToSlide(prevIndex);
        }
        
        // Update dots
        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }
        
        // Progress bar functions
        function startProgressBar() {
            progressBar.classList.add('active');
            progressBar.style.transition = 'width 5s linear';
            progressBar.style.width = '100%';
        }
        
        function resetProgressBar() {
            progressBar.classList.remove('active');
            progressBar.style.transition = 'none';
            progressBar.style.width = '0%';
            
            // Force reflow
            void progressBar.offsetWidth;
            
            // Restart progress bar
            setTimeout(startProgressBar, 10);
        }
        
        // Auto slide
        function startAutoSlide() {
            stopAutoSlide();
            slideInterval = setInterval(nextSlide, 5000);
        }
        
        function stopAutoSlide() {
            clearInterval(slideInterval);
        }
        
        // Event listeners for slider
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoSlide();
            startAutoSlide();
        });
        
        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoSlide();
            startAutoSlide();
        });
        
        // Dot click events
        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.getAttribute('data-index'));
                if (index !== currentSlide) {
                    goToSlide(index);
                    stopAutoSlide();
                    startAutoSlide();
                }
            });
        });
        
        // Pause auto slide on hover
        const sliderContainer = document.querySelector('.slider-container');
        sliderContainer.addEventListener('mouseenter', stopAutoSlide);
        sliderContainer.addEventListener('mouseleave', startAutoSlide);
        
        // Touch support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        
        sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            stopAutoSlide();
        });
        
        sliderContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            setTimeout(startAutoSlide, 5000);
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const difference = touchStartX - touchEndX;
            
            if (Math.abs(difference) > swipeThreshold) {
                if (difference > 0) {
                    // Swipe left - next slide
                    nextSlide();
                } else {
                    // Swipe right - previous slide
                    prevSlide();
                }
            }
        }
        
        // Initialize slider
        initSlider();
        
        // ========== BACK TO TOP BUTTON ==========
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        backToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // ========== SMOOTH SCROLLING ==========
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#' || targetId === '#home') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (window.innerWidth <= 991 && navLinks.classList.contains('active')) {
                        closeMobileMenu();
                    }
                }
            });
        });
        
        // ========== INITIALIZE ON LOAD ==========
        document.addEventListener('DOMContentLoaded', function() {
            updateClock();
            handleResize();
            initSlider();
        });
    </script>
</body>
</html>