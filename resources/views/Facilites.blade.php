@extends('layout.preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - B.S.D.L.V. Inter College</title>
            <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
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
            --light: #f8f9fa;
            --dark: #2d3748;
            --success: #38a169;
            --danger: #e53e3e;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --radius: 8px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--primary);
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .btn:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-accent {
            background-color: var(--accent);
        }

        .btn-accent:hover {
            background-color: #e8970f;
        }

        .section {
            padding: 80px 0;
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
            background: linear-gradient(to right, var(--primary), var(--accent));
            margin: 10px auto;
            border-radius: 2px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Facilities Hero Section */
        .facilities-hero {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 100px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .facilities-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('image/facilities-pattern.png') repeat;
            opacity: 0.1;
        }

        .facilities-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .facilities-hero p {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Facilities Overview Section */
        .facilities-overview {
            background-color: white;
        }

        .overview-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .overview-text h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .overview-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #555;
        }

        .overview-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(26, 75, 140, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .feature-text h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .feature-text p {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 0;
        }

        .overview-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .overview-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(26, 75, 140, 0.2), rgba(249, 168, 38, 0.2));
            z-index: 1;
        }

        .overview-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: var(--transition);
        }

        .overview-image:hover img {
            transform: scale(1.05);
        }

        /* Facilities Grid Section */
        .facilities-grid {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .facilities-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .facility-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .facility-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .facility-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .facility-card:hover .facility-image img {
            transform: scale(1.1);
        }

        .facility-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            box-shadow: var(--shadow);
        }

        .facility-content {
            padding: 25px;
        }

        .facility-content h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .facility-content p {
            color: #666;
            margin-bottom: 20px;
        }

        .facility-features {
            margin-top: 20px;
        }

        .facility-features li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #555;
        }

        .facility-features li i {
            color: var(--accent);
            font-size: 0.9rem;
        }

        /* Sports Facilities Section */
        .sports-facilities {
            background-color: white;
        }

        .sports-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .sport-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .sport-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .sport-image {
            height: 200px;
            overflow: hidden;
        }

        .sport-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .sport-card:hover .sport-image img {
            transform: scale(1.1);
        }

        .sport-content {
            padding: 20px;
            text-align: center;
        }

        .sport-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .sport-content p {
            color: #666;
            font-size: 0.95rem;
        }

        /* Lab Facilities Section */
        .lab-facilities {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .lab-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .lab-card {
            background: white;
            border-radius: var(--radius);
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .lab-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--accent));
        }

        .lab-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .lab-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
        }

        .lab-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .lab-card p {
            color: #666;
            margin-bottom: 20px;
        }

        .lab-equipment {
            margin-top: 20px;
            text-align: left;
        }

        .lab-equipment h4 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .lab-equipment ul {
            list-style-type: disc;
            padding-left: 20px;
            color: #666;
        }

        .lab-equipment li {
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        /* Transport Facilities Section */
        .transport-facilities {
            background-color: white;
        }

        .transport-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .transport-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .transport-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .transport-content h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .transport-content p {
            margin-bottom: 20px;
            color: #555;
            font-size: 1.1rem;
        }

        .transport-features {
            margin-top: 30px;
        }

        .transport-feature {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .transport-feature i {
            width: 40px;
            height: 40px;
            background: rgba(26, 75, 140, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .transport-feature-text h4 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .transport-feature-text p {
            margin-bottom: 0;
            font-size: 0.95rem;
            color: #666;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
            padding: 80px 0;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: white;
        }

        .cta-content p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        .cta-btns {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ==============================
           RESPONSIVE STYLES
        ============================== */
        
        /* For tablets and smaller desktops (max-width: 1024px) */
        @media (max-width: 1024px) {
            .facilities-hero h1 {
                font-size: 3rem;
            }
            
            .overview-container,
            .transport-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .overview-image {
                order: -1;
            }
            
            .facilities-container {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }
        
        /* For tablets (max-width: 768px) */
        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .facilities-hero {
                padding: 80px 0 60px;
            }
            
            .facilities-hero h1 {
                font-size: 2.5rem;
            }
            
            .facilities-hero p {
                font-size: 1.1rem;
            }
            
            .overview-features {
                grid-template-columns: 1fr;
            }
            
            .cta-content h2 {
                font-size: 2rem;
            }
        }
        
        /* For mobile devices (max-width: 480px) */
        @media (max-width: 480px) {
            .section {
                padding: 50px 0;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .facilities-hero h1 {
                font-size: 2rem;
            }
            
            .facilities-hero p {
                font-size: 1rem;
            }
            
            .overview-text h2,
            .transport-content h2 {
                font-size: 1.8rem;
            }
            
            .facilities-container {
                grid-template-columns: 1fr;
            }
            
            .cta-content h2 {
                font-size: 1.8rem;
            }
            
            .cta-btns {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 200px;
            }
        }
    </style>
</head>
<body>
    @include("header")
    <!-- Facilities Hero Section -->
    <section class="facilities-hero">
        <div class="container">
            <h1>Our Facilities</h1>
            <p>State-of-the-art infrastructure designed to enhance learning and development</p>
        </div>
    </section>

    <!-- Facilities Overview Section -->
    <section class="facilities-overview section">
        <div class="container">
            <div class="overview-container">
                <div class="overview-text">
                    <h2>World-Class Infrastructure</h2>
                    <p>SDLV Inter College takes pride in offering exceptional facilities that create an ideal environment for academic excellence and holistic development. Our campus is designed to provide students with everything they need to succeed.</p>
                    <p>From modern classrooms to advanced laboratories, we ensure that our infrastructure meets the highest standards of quality and safety, providing students with the best possible learning experience.</p>
                    
                    <div class="overview-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Spacious Campus</h4>
                                <p>Spread over 5 acres with lush green surroundings</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Safe Environment</h4>
                                <p>24/7 security and CCTV surveillance</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Eco-Friendly</h4>
                                <p>Rainwater harvesting and solar power systems</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-wifi"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Digital Campus</h4>
                                <p>High-speed internet connectivity throughout</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overview-image">
                    <img src="image/campus-aerial.jpg" alt="SDLV Campus Overview">
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Grid Section -->
    <section class="facilities-grid section">
        <div class="container">
            <div class="section-title">
                <h2>Academic Facilities</h2>
                <p>Designed to foster learning, creativity, and innovation</p>
            </div>
            <div class="facilities-container">
                <!-- Classroom Facility -->
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="image/classroom.jpg" alt="Modern Classroom">
                        <div class="facility-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <div class="facility-content">
                        <h3>Smart Classrooms</h3>
                        <p>Our digitally equipped classrooms feature interactive whiteboards, projectors, and audio-visual systems to make learning more engaging and effective.</p>
                        <ul class="facility-features">
                            <li><i class="fas fa-check"></i> Interactive smart boards</li>
                            <li><i class="fas fa-check"></i> Comfortable seating arrangement</li>
                            <li><i class="fas fa-check"></i> Proper ventilation and lighting</li>
                            <li><i class="fas fa-check"></i> Digital content access</li>
                        </ul>
                    </div>
                </div>

                <!-- Library Facility -->
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="image/library.jpg" alt="School Library">
                        <div class="facility-icon">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="facility-content">
                        <h3>Well-Stocked Library</h3>
                        <p>Our extensive library houses thousands of books, journals, and digital resources to support academic curriculum and encourage reading habits.</p>
                        <ul class="facility-features">
                            <li><i class="fas fa-check"></i> 10,000+ books collection</li>
                            <li><i class="fas fa-check"></i> Digital library section</li>
                            <li><i class="fas fa-check"></i> Quiet reading zones</li>
                            <li><i class="fas fa-check"></i> Research assistance</li>
                        </ul>
                    </div>
                </div>

                <!-- Computer Lab Facility -->
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="image/computer-lab.jpg" alt="Computer Lab">
                        <div class="facility-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                    </div>
                    <div class="facility-content">
                        <h3>Computer Laboratory</h3>
                        <p>Equipped with the latest computers and software, our computer lab provides students with hands-on experience in technology and digital skills.</p>
                        <ul class="facility-features">
                            <li><i class="fas fa-check"></i> 40+ latest computers</li>
                            <li><i class="fas fa-check"></i> High-speed internet</li>
                            <li><i class="fas fa-check"></i> Programming software</li>
                            <li><i class="fas fa-check"></i> Certified instructors</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lab Facilities Section -->
    <section class="lab-facilities section">
        <div class="container">
            <div class="section-title">
                <h2>Science Laboratories</h2>
                <p>Hands-on learning experiences in fully equipped labs</p>
            </div>
            <div class="lab-container">
                <!-- Physics Lab -->
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="fas fa-atom"></i>
                    </div>
                    <h3>Physics Laboratory</h3>
                    <p>Our physics lab is equipped with modern apparatus to help students understand fundamental concepts through practical experiments.</p>
                    <div class="lab-equipment">
                        <h4>Key Equipment:</h4>
                        <ul>
                            <li>Optics and lens sets</li>
                            <li>Electrical circuit boards</li>
                            <li>Measurement instruments</li>
                            <li>Magnetism and electricity kits</li>
                        </ul>
                    </div>
                </div>

                <!-- Chemistry Lab -->
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h3>Chemistry Laboratory</h3>
                    <p>The chemistry lab provides a safe environment for students to conduct experiments and understand chemical reactions and properties.</p>
                    <div class="lab-equipment">
                        <h4>Key Equipment:</h4>
                        <ul>
                            <li>Chemical reagents and compounds</li>
                            <li>Bunsen burners and heating apparatus</li>
                            <li>Safety equipment and fume hoods</li>
                            <li>Analytical instruments</li>
                        </ul>
                    </div>
                </div>

                <!-- Biology Lab -->
                <div class="lab-card">
                    <div class="lab-icon">
                        <i class="fas fa-dna"></i>
                    </div>
                    <h3>Biology Laboratory</h3>
                    <p>Our biology lab enables students to explore the living world through microscopes, specimens, and various biological experiments.</p>
                    <div class="lab-equipment">
                        <h4>Key Equipment:</h4>
                        <ul>
                            <li>Compound and digital microscopes</li>
                            <li>Plant and animal specimens</li>
                            <li>Anatomy models and charts</li>
                            <li>Laboratory incubators</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sports Facilities Section -->
    <section class="sports-facilities section">
        <div class="container">
            <div class="section-title">
                <h2>Sports Facilities</h2>
                <p>Promoting physical fitness and sportsmanship</p>
            </div>
            <div class="sports-container">
                <!-- Basketball -->
                <div class="sport-card">
                    <div class="sport-image">
                        <img src="image/basketball-court.jpg" alt="Basketball Court">
                    </div>
                    <div class="sport-content">
                        <h3>Basketball Court</h3>
                        <p>Full-sized basketball court with professional markings and equipment for practice and competitions.</p>
                    </div>
                </div>

                <!-- Cricket -->
                <div class="sport-card">
                    <div class="sport-image">
                        <img src="image/cricket-ground.jpg" alt="Cricket Ground">
                    </div>
                    <div class="sport-content">
                        <h3>Cricket Ground</h3>
                        <p>Well-maintained cricket pitch with practice nets and professional coaching facilities.</p>
                    </div>
                </div>

                <!-- Indoor Games -->
                <div class="sport-card">
                    <div class="sport-image">
                        <img src="image/indoor-games.jpg" alt="Indoor Games">
                    </div>
                    <div class="sport-content">
                        <h3>Indoor Games</h3>
                        <p>Dedicated space for chess, carrom, table tennis, and other indoor sports activities.</p>
                    </div>
                </div>

                <!-- Athletics -->
                <div class="sport-card">
                    <div class="sport-image">
                        <img src="image/athletics-track.jpg" alt="Athletics Track">
                    </div>
                    <div class="sport-content">
                        <h3>Athletics Track</h3>
                        <p>200-meter running track with facilities for field events like long jump, high jump, and shot put.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transport Facilities Section -->
    <section class="transport-facilities section">
        <div class="container">
            <div class="transport-container">
                <div class="transport-image">
                    <img src="image/school-bus.jpg" alt="School Transport">
                </div>
                <div class="transport-content">
                    <h2>Transport Facilities</h2>
                    <p>SDLV Inter College provides safe and reliable transportation services for students across Mallawan and surrounding areas. Our fleet of buses ensures comfortable and timely commute for all students.</p>
                    <p>All our buses are equipped with GPS tracking, first-aid kits, and experienced drivers with assistants to ensure student safety at all times.</p>
                    
                    <div class="transport-features">
                        <div class="transport-feature">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="transport-feature-text">
                                <h4>Wide Coverage</h4>
                                <p>Bus routes covering all major areas in and around Mallawan</p>
                            </div>
                        </div>
                        <div class="transport-feature">
                            <i class="fas fa-shield-alt"></i>
                            <div class="transport-feature-text">
                                <h4>Safety First</h4>
                                <p>Regular vehicle maintenance and trained staff</p>
                            </div>
                        </div>
                        <div class="transport-feature">
                            <i class="fas fa-user-friends"></i>
                            <div class="transport-feature-text">
                                <h4>Dedicated Staff</h4>
                                <p>Experienced drivers and attendants for each bus</p>
                            </div>
                        </div>
                        <div class="transport-feature">
                            <i class="fas fa-clock"></i>
                            <div class="transport-feature-text">
                                <h4>Punctual Service</h4>
                                <p>Strict adherence to pickup and drop schedules</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Experience Our Facilities Firsthand</h2>
                <p>Schedule a campus tour to see our world-class facilities and discover how SDLV Inter College can provide the perfect environment for your child's education.</p>
                <div class="cta-btns">
                    <a href="#contact" class="btn btn-accent">Schedule a Visit</a>
                    <a href="#admissions" class="btn">Admission Process</a>
                </div>
            </div>
        </div>
    </section>

    @include("footer")
    <script>
        // Simple animation for facility cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const facilityCards = document.querySelectorAll('.facility-card, .lab-card, .sport-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            
            facilityCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>