@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - B.S.D.L.V. Inter College</title>
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Color Palette */
            --primary: #1e40af;      /* Royal Blue */
            --primary-dark: #1e3a8a;  /* Deep Blue */
            --secondary: #3b82f6;    /* Bright Blue */
            --accent: #f59e0b;       /* Amber/Gold */
            --accent-light: #fbbf24; /* Light Gold */
            --light: #f8fafc;        /* Snow White */
            --light-gray: #f1f5f9;   /* Light Gray */
            --medium-gray: #94a3b8;  /* Medium Gray */
            --dark: #0f172a;         /* Navy Blue/Black */
            --text: #334155;         /* Slate Gray */
            --text-light: #64748b;   /* Light Slate */
            
            /* Gradients */
            --gradient-primary: linear-gradient(135deg, #1e40af, #3b82f6);
            --gradient-accent: linear-gradient(135deg, #f59e0b, #fbbf24);
            --gradient-dark: linear-gradient(135deg, #0f172a, #1e293b);
            --gradient-light: linear-gradient(135deg, #f8fafc, #e2e8f0);
            
            /* Shadows */
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);
            --shadow-glow: 0 0 20px rgba(59, 130, 246, 0.1);
            
            /* Transitions */
            --transition-fast: all 0.2s ease;
            --transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            
            /* Border Radius */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 24px;
            --radius-full: 50%;
            
            /* Spacing */
            --space-xs: 0.5rem;
            --space-sm: 1rem;
            --space-md: 1.5rem;
            --space-lg: 2rem;
            --space-xl: 3rem;
            --space-2xl: 4rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--text);
            line-height: 1.7;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.3;
            color: var(--dark);
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition-normal);
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 var(--space-lg);
        }

        .section {
            padding: var(--space-2xl) 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: var(--space-xl);
            position: relative;
        }

        .section-tag {
            display: inline-block;
            background: var(--gradient-accent);
            color: white;
            padding: var(--space-xs) var(--space-md);
            border-radius: var(--radius-full);
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            margin-bottom: var(--space-md);
            text-transform: uppercase;
        }

        .section-title {
            font-size: 3rem;
            margin-bottom: var(--space-md);
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: var(--space-sm) var(--space-lg);
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
            z-index: 1;
            box-shadow: var(--shadow-md);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition-normal);
            z-index: -1;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-accent {
            background: var(--gradient-accent);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            padding: var(--space-2xl) 0;
            position: relative;
            overflow: hidden;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(245, 158, 11, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite alternate;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(20px, 20px);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 4rem;
            margin-bottom: var(--space-md);
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #cbd5e1;
            margin-bottom: var(--space-xl);
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: var(--space-xl);
            margin-top: var(--space-xl);
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
        }

        .hero-stat-label {
            font-size: 0.875rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 4px;
        }

        /* About Intro */
        .about-intro {
            background: var(--light);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-xl);
            align-items: center;
        }

        .about-image {
            position: relative;
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .about-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: var(--transition-normal);
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
        }

        .about-content {
            padding-left: var(--space-xl);
        }

        .about-content h2 {
            font-size: 2.5rem;
            margin-bottom: var(--space-md);
            line-height: 1.2;
        }

        .about-content p {
            margin-bottom: var(--space-md);
            color: var(--text);
            font-size: 1.125rem;
        }

        /* Mission Vision */
        .mission-vision {
            background: var(--gradient-light);
        }

        .mission-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
        }

        .mission-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            text-align: center;
            transition: var(--transition-normal);
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }

        .mission-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .mission-card-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-md);
            color: white;
            font-size: 2rem;
            transition: var(--transition-normal);
        }

        .mission-card:hover .mission-card-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .mission-card h3 {
            font-size: 1.5rem;
            margin-bottom: var(--space-sm);
        }

        /* Values Section */
        .values-section {
            background: white;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-lg);
        }

        .value-item {
            background: var(--light-gray);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            transition: var(--transition-normal);
            position: relative;
            overflow: hidden;
        }

        .value-item:hover {
            background: white;
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .value-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--space-md);
            color: white;
            font-size: 1.5rem;
        }

        .value-item h3 {
            font-size: 1.25rem;
            margin-bottom: var(--space-sm);
        }

        /* Leadership Section */
        .leadership-section {
            background: var(--light);
        }

        .leadership-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: var(--space-xl);
        }

        .leader-card {
            background: white;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition-normal);
        }

        .leader-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .leader-image {
            height: 300px;
            overflow: hidden;
        }

        .leader-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-normal);
        }

        .leader-card:hover .leader-image img {
            transform: scale(1.1);
        }

        .leader-info {
            padding: var(--space-xl);
        }

        .leader-info h3 {
            font-size: 1.5rem;
            margin-bottom: var(--space-xs);
        }

        .leader-role {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: var(--space-md);
            display: block;
        }

        .leader-quote {
            font-style: italic;
            color: var(--text-light);
            border-left: 3px solid var(--accent);
            padding-left: var(--space-md);
            margin-top: var(--space-md);
        }

        /* Stats Section */
        .stats-section {
            background: var(--gradient-dark);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-xl);
            text-align: center;
        }

        .stat-item {
            padding: var(--space-lg);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--gradient-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: var(--space-sm);
            line-height: 1;
        }

        .stat-label {
            font-size: 1.125rem;
            color: #cbd5e1;
        }

        /* CTA Section */
        .cta-section {
            background: var(--gradient-primary);
            color: white;
            text-align: center;
            padding: var(--space-2xl) 0;
            position: relative;
            overflow: hidden;
        }

        .cta-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 3rem;
            margin-bottom: var(--space-md);
            color: white;
        }

        .cta-text {
            font-size: 1.25rem;
            margin-bottom: var(--space-xl);
            color: #dbeafe;
        }

        .cta-buttons {
            display: flex;
            gap: var(--space-md);
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Animations */
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

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .section-title {
                font-size: 2.5rem;
            }
            
            .hero-title {
                font-size: 3rem;
            }
            
            .about-grid {
                grid-template-columns: 1fr;
                gap: var(--space-lg);
            }
            
            .about-content {
                padding-left: 0;
            }
            
            .mission-cards {
                grid-template-columns: 1fr;
                max-width: 500px;
                margin: 0 auto;
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: var(--space-xl) 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.25rem;
            }
            
            .hero-stats {
                gap: var(--space-lg);
            }
            
            .hero-stat-number {
                font-size: 2rem;
            }
            
            .leadership-grid,
            .values-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 var(--space-md);
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-stat-number {
                font-size: 1.75rem;
            }
            
            .mission-card,
            .value-item,
            .leader-info {
                padding: var(--space-lg);
            }
        }
    </style>
</head>
<body>
    @include('header')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Excellence in Education Since 1997</h1>
                <p class="hero-subtitle">Shaping future leaders through holistic education, innovation, and values at SDLV Inter College</p>
                
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="hero-stat-number">25+</div>
                        <div class="hero-stat-label">Years of Excellence</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number">1500+</div>
                        <div class="hero-stat-label">Successful Alumni</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number">98%</div>
                        <div class="hero-stat-label">Board Success Rate</div>
                    </div>
                    <div class="hero-stat">
                        <div class="hero-stat-number">40+</div>
                        <div class="hero-stat-label">Expert Faculty</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Intro Section -->
    <section class="section about-intro">
        <div class="container">
            <div class="about-grid animate-on-scroll">
                <div class="about-image">
                    <img src="image/campus.jpg" alt="SDLV Campus">
                </div>
                <div class="about-content">
                    <div class="section-tag">Our Story</div>
                    <h2>Building Futures Since 1997</h2>
                    <p>SDLV Inter College was founded with a vision to provide quality education to students in Mallawan, Hardoi. What began as a small institution with just a handful of students has grown into a premier educational hub serving hundreds of students each year.</p>
                    <p>Our journey is marked by relentless dedication, innovative teaching methodologies, and an unwavering commitment to student success. We believe education is not just about academic excellence but about shaping character, instilling values, and preparing students for life's challenges.</p>
                    <p>With state-of-the-art facilities, experienced faculty, and a nurturing environment, SDLV continues to set benchmarks in educational excellence.</p>
                    <button class="btn btn-accent" style="margin-top: var(--space-md);">
                        <i class="fas fa-book-open"></i> Read Our Full Story
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="section mission-vision">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <div class="section-tag">Our Purpose</div>
                <h2 class="section-title">Mission & Vision</h2>
                <p class="section-subtitle">Guiding principles that define our educational philosophy</p>
            </div>
            
            <div class="mission-cards">
                <div class="mission-card animate-on-scroll">
                    <div class="mission-card-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To provide holistic education that empowers students academically, socially, and ethically, creating responsible global citizens ready to face future challenges.</p>
                </div>
                
                <div class="mission-card animate-on-scroll">
                    <div class="mission-card-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To be a premier institution recognized for excellence in education, innovation in teaching, and development of future leaders who contribute positively to society.</p>
                </div>
                
                <div class="mission-card animate-on-scroll">
                    <div class="mission-card-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Our Commitment</h3>
                    <p>To maintain the highest standards of education while fostering an environment of inclusivity, creativity, and continuous improvement for all stakeholders.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section values-section">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <div class="section-tag">Our Foundation</div>
                <h2 class="section-title">Core Values</h2>
                <p class="section-subtitle">The principles that guide every decision we make</p>
            </div>
            
            <div class="values-grid">
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We strive for excellence in academics, character development, and all school activities, setting high standards for ourselves and our students.</p>
                </div>
                
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Integrity</h3>
                    <p>We uphold the highest standards of honesty, ethics, and moral principles in all our interactions and decision-making processes.</p>
                </div>
                
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We embrace creativity and innovation in teaching methodologies, continuously adapting to provide the best learning experiences.</p>
                </div>
                
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>We foster a strong sense of community, collaboration, and mutual respect among students, faculty, parents, and staff.</p>
                </div>
                
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Service</h3>
                    <p>We instill a spirit of service and social responsibility, encouraging students to contribute positively to their communities.</p>
                </div>
                
                <div class="value-item animate-on-scroll">
                    <div class="value-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Sustainability</h3>
                    <p>We promote environmental awareness and sustainable practices, preparing students to be responsible stewards of our planet.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="section leadership-section">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <div class="section-tag">Our Leadership</div>
                <h2 class="section-title">Meet Our Leaders</h2>
                <p class="section-subtitle">Experienced educators guiding our institution to excellence</p>
            </div>
            
            <div class="leadership-grid">
                <div class="leader-card animate-on-scroll">
                    <div class="leader-image">
                        <img src="image/principal.jpg" alt="Principal">
                    </div>
                    <div class="leader-info">
                        <h3>Dr. Rajesh Sharma</h3>
                        <span class="leader-role">Principal</span>
                        <p>With over 25 years of experience in education, Dr. Sharma leads with vision and dedication, ensuring academic excellence and holistic development for all students.</p>
                        <blockquote class="leader-quote">"Education is not preparation for life; education is life itself."</blockquote>
                    </div>
                </div>
                
                <div class="leader-card animate-on-scroll">
                    <div class="leader-image">
                        <img src="image/vice-principal.jpg" alt="Vice Principal">
                    </div>
                    <div class="leader-info">
                        <h3>Mrs. Sunita Verma</h3>
                        <span class="leader-role">Vice Principal</span>
                        <p>An expert in curriculum development and student counseling, Mrs. Verma plays a crucial role in shaping our academic programs and student support systems.</p>
                        <blockquote class="leader-quote">"Every child deserves a champion who will never give up on them."</blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label">Board Pass Percentage</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number" data-count="40">0</div>
                    <div class="stat-label">Qualified Teachers</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number" data-count="25">0</div>
                    <div class="stat-label">Years of Service</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number" data-count="1500">0</div>
                    <div class="stat-label">Successful Alumni</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content animate-on-scroll">
                <h2 class="cta-title">Join the SDLV Family</h2>
                <p class="cta-text">Discover how SDLV Inter College can help your child achieve their full potential and build a successful future. We welcome you to visit our campus and experience our educational environment firsthand.</p>
                
                <div class="cta-buttons">
                    <button class="btn btn-accent">
                        <i class="fas fa-calendar-check"></i> Schedule a Visit
                    </button>
                    <button class="btn btn-outline" style="background: white; color: var(--primary);">
                        <i class="fas fa-download"></i> Download Prospectus
                    </button>
                </div>
            </div>
        </div>
    </section>
    @include('Footer')

    <script>
        // Scroll Animation
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        
        animateElements.forEach(element => {
            observer.observe(element);
        });

        // Counter Animation
        const counters = document.querySelectorAll('.stat-number');
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const count = parseInt(target.getAttribute('data-count'));
                    const suffix = target.textContent.includes('%') ? '%' : '+';
                    
                    let start = 0;
                    const duration = 2000;
                    const increment = count / (duration / 16);
                    
                    const timer = setInterval(() => {
                        start += increment;
                        if (start >= count) {
                            target.textContent = count + suffix;
                            clearInterval(timer);
                        } else {
                            target.textContent = Math.floor(start) + suffix;
                        }
                    }, 16);
                    
                    counterObserver.unobserve(target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Button hover effects
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.animation = 'pulse 0.5s ease';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.animation = '';
            });
        });
    </script>
</body>
</html>