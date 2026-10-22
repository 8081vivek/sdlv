<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="image/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           GLOBAL STYLES
           ============================================================ */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --primary: #003366;
            --secondary: #0066cc;
            --accent: #ff9900;
            --accent-light: #ffcc66;
            --accent-dark: #cc7a00;
            --light: #f8f9fa;
            --dark: #2d3748;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
            --radius: 8px;

            --bg-color: #f5f7fa;
            --text-color: #333333;
            --card-bg: white;
            --header-bg: white;
            --nav-bg: white;
            --nav-hover: rgba(0, 0, 0, 0.05);
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #003366, #0066cc);
            --gradient-accent: linear-gradient(135deg, #ff9900, #ffcc66);

            --header-h: 140px;
        }



        

        html { scroll-behavior: smooth; }

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
       
        a { text-decoration: none; color: inherit; transition: var(--transition); }
        ul { list-style: none; }
        img { max-width: 100%; height: auto; display: block; }

        .container {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 20px;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            border-radius: 20px;
        }

        /* ============================================================
           HEADER — premium sticky, desktop-only fixed
           ============================================================ */
        .site-header {
            background: var(--header-bg);
            color: var(--text-color);
            width: 100%;
            z-index: 1000;
            position: relative;
        }

        .header-sticky-core {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--header-bg);
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }
        .site-header.is-stuck .header-sticky-core {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        /* Top info strip */
        .header-top-bar {
            background: rgba(0, 0, 0, 0.04);
            border-bottom: 1px solid var(--border-color);
            font-size: 0.85rem;
            padding: 8px 0;
        }
      

        .header-top-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .header-info {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-wrap: wrap;
        }
        .header-info-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            opacity: 0.9;
            white-space: nowrap;
            color: var(--text-color);
        }
        .header-info-item a { color: inherit; }
        .header-info-item a:hover { color: var(--accent); }
        .header-info-item i { color: var(--accent); }

        .header-social { display: flex; gap: 8px; }
        .social-icon {
            width: 30px; height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.06);
            color: var(--text-color);
            font-size: 0.8rem;
            transition: var(--transition);
        }
        .social-icon:hover {
            background: var(--accent);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Main row */
        .header-main-content {
            display: flex;
            align-items: center;
            gap: 24px;
            padding: 14px 0;
            transition: padding 0.3s ease;
            flex-wrap: wrap;
        }

        /* Branding */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 14px;
            flex: 1;
            min-width: 0;
            text-decoration: none;
            color: inherit;
        }
        .logo {
            width: 72px; height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
            background: #fff;
            padding: 3px;
            flex-shrink: 0;
            transition: width 0.3s ease, height 0.3s ease, border-color 0.3s ease;
        }
        .logo-container:hover .logo { border-color: var(--accent); }
        .school-name { min-width: 0; overflow: hidden; }
        .school-name-title {
            font-family: 'Merriweather', serif;
            font-size: 1.5rem;
            color: var(--primary);
            line-height: 1.2;
            margin: 0 0 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: font-size 0.3s ease;
        }
        .school-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--text-color);
            opacity: 0.8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: font-size 0.3s ease;
        }
        .school-meta i { color: var(--accent); }
        .meta-dot { opacity: 0.5; }

        /* Controls */
        .header-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        /* Theme toggle */
        .theme-toggle {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            border-radius: 999px;
        }
        .theme-toggle:focus-visible {
            outline: 3px solid var(--accent);
            outline-offset: 3px;
        }
        .theme-toggle-track {
            display: flex;
            align-items: center;
            width: 52px; height: 28px;
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 999px;
            position: relative;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .theme-toggle-thumb {
            position: absolute;
            top: 2px; left: 2px;
            width: 20px; height: 20px;
            background: var(--accent);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: left 0.35s cubic-bezier(.4,0,.2,1), background-color 0.3s ease;
            overflow: hidden;
        }
        .theme-toggle-thumb i {
            position: absolute;
            font-size: 0.7rem;
            color: #fff;
            transition: opacity 0.25s ease, transform 0.35s ease;
        }
       
     
        /* Clock + admission */
        .header-contact {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-left: auto;
            flex-shrink: 0;
        }
        .header-clock {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(0, 0, 0, 0.04);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 6px 12px;
            transition: transform 0.3s ease;
        }
        .clock-icon {
            color: var(--accent);
            font-size: 1rem;
            animation: clockTick 2s ease-in-out infinite;
        }
        @keyframes clockTick {
            0%, 100% { transform: rotate(0); }
            50% { transform: rotate(15deg); }
        }
        .clock-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .clock-time {
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            font-variant-numeric: tabular-nums;
        }
        .clock-date { font-size: 0.7rem; opacity: 0.75; }

        /* Admission badge */
        .admission-badge {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: var(--radius);
            background: var(--gradient-accent);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .admission-badge::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,0.35) 50%, transparent 70%);
            transform: translateX(-100%);
            animation: admissionShine 4s ease-in-out infinite;
            pointer-events: none;
        }
        @keyframes admissionShine {
            0%, 60% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .admission-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.18);
        }
        .admission-badge i { font-size: 1rem; }
        .admission-text {
            display: flex;
            flex-direction: column;
            line-height: 1.15;
            white-space: nowrap;
        }
        .admission-text strong { font-size: 0.8rem; }
        .admission-text em { font-size: 0.72rem; font-style: normal; opacity: 0.9; }
        .admission-arrow { transition: transform 0.25s ease; }
        .admission-badge:hover .admission-arrow { transform: translateX(4px); }

        /* Nav */
        .site-nav {
            background: var(--nav-bg);
            border-top: 1px solid var(--border-color);
            transition: var(--transition);
        }
        .nav-links {
            display: flex;
            justify-content: space-between;
            height: 52px;
        }
        .nav-links li {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 0;
        }
        /* FIX 3: No zoom animation — only smooth color + underline */
        .nav-links li a {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 100%;
            width: 100%;
            padding: 0 12px;
            font-size: 0.92rem;
            font-weight: 500;
            color: var(--text-color);
            border-bottom: 3px solid transparent;
            white-space: nowrap;
            transform: none;
            transition: color 0.25s ease, border-bottom-color 0.25s ease, background-color 0.25s ease;
        }
        .nav-links li a:hover,
        .nav-links li a:focus-visible {
            color: var(--accent);
            border-bottom-color: var(--accent);
            background: var(--nav-hover);
            outline: none;
            transform: none;
        }
        .nav-links li a i { color: var(--accent); }
        .nav-links li a::before { display: none; }

        /* ============================================================
           DESKTOP-ONLY FIXED HEADER on scroll (mobile pe normal)
           ============================================================ */
        @media (min-width: 992px) {
            .site-header.is-stuck .header-sticky-core {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
                background: var(--header-bg);
                animation: slideDownHeader 0.35s ease-out;
            }
            @keyframes slideDownHeader {
                from { transform: translateY(-100%); opacity: 0; }
                to   { transform: translateY(0);     opacity: 1; }
            }

            .site-header.is-stuck .header-main-content { padding: 6px 0; gap: 16px; }
            .site-header.is-stuck .logo             { width: 100px; height: 100px; }
            .site-header.is-stuck .school-name-title   { font-size: 30px; }
            .site-header.is-stuck .school-meta      { font-size: 0.68rem; }
            /* .site-header.is-stuck .site-nav         { border-t; } */
            .site-header.is-stuck .nav-links        { height: 44px; }
            .site-header.is-stuck .nav-links li a   { font-size: 0.85rem; padding: 0 10px; border-bottom-width: 3px; }
            .site-header.is-stuck .header-clock,
            .site-header.is-stuck .admission-badge  { transform: scale(0.88); }

            .site-header.is-stuck + .site-header-spacer { height: 100px; }
        }

       .site-header.is-stuck .logo {
  transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
              border-color 0.3s ease,
              box-shadow 0.3s ease;
  will-change: transform; /* smooth rendering */
}

.site-header.is-stuck .logo:hover {
  border-color: var(--accent);
  transform: scale(0.88) rotate(-3deg);
  box-shadow: 0 0 15px color-mix(in srgb, var(--accent) 50%, transparent);
}
        /* Spacer — sirf desktop pe height milti hai */
        .site-header-spacer {
            height: 0;
            transition: height 0.3s ease;
        }

        /* ============================================================
           HERO SLIDER — cinematic (clean overlay, no blue tint)
           ============================================================ */
        .hero {
            position: relative;
            height: 85vh;
            min-height: 540px;
            max-height: 920px;
            overflow: hidden;
            background: #0a0e1a;
            isolation: isolate;
            text-align: left;
            color: #fff;
        }
        .slider-container,
        #slider {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            pointer-events: none;
            z-index: 1;
            transform: translateZ(0);
        }
        .slide.active { opacity: 1; pointer-events: auto; z-index: 2; }

        .slide img.slide-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 30%;
            transform: scale(1);
            transition: transform 12s ease-out;
            will-change: transform;
        }
        .slide.active img.slide-image { transform: scale(1.1); }

        /* FIX 2: Clean dark gradient (no blue tint) */
        .slide-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to right,
                rgba(0, 0, 0, 0.75) 0%,
                rgba(0, 0, 0, 0.45) 45%,
                rgba(0, 0, 0, 0.15) 100%
            );
            z-index: 3;
            pointer-events: none;
        }
        .slide-overlay::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 100%; height: 3px;
            background: linear-gradient(90deg, transparent, #d4af37, #f5e6a3, #d4af37, transparent);
            opacity: 0.7;
        }

        .slide-content {
            position: relative;
            z-index: 10;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 8%;
            max-width: 900px;
            color: #fff;
            background: none;
            text-align: left;
            transform: none;
            top: auto;
            left: auto;
            margin: 0;
        }

        .slide-eyebrow,
        .slide-title,
        .slide-desc,
        .slide-cta {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .slide-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #d4af37;
            margin-bottom: 1.2rem;
            transition-delay: 0s;
        }
        .slide-eyebrow::before {
            content: '';
            width: 32px; height: 2px;
            background: linear-gradient(90deg, #d4af37, transparent);
        }

        .slide-title {
            font-family: 'Merriweather', serif;
            font-size: clamp(2.2rem, 5.2vw, 4.4rem);
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 8px 30px rgba(0, 0, 0, 0.55);
            margin: 0;
            transition-delay: 0.1s;
        }

        .slide-desc {
            font-size: clamp(1rem, 1.5vw, 1.35rem);
            line-height: 1.7;
            max-width: 600px;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.92);
            text-shadow: 0 4px 18px rgba(0, 0, 0, 0.4);
            transition-delay: 0.25s;
        }

        .slide-cta {
            margin-top: 2.2rem;
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
            justify-content: flex-start;
            transition-delay: 0.4s;
        }

        .slide.active .slide-eyebrow,
        .slide.active .slide-title,
        .slide.active .slide-desc,
        .slide.active .slide-cta {
            opacity: 1;
            transform: translateY(0);
        }

        /* CTA buttons */
        .hero .btn-gold,
        .hero .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.9rem 2.4rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.3px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .hero .btn-gold {
            background: linear-gradient(145deg, #d4af37, #b8962e);
            color: #0b0f1c;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 28px -8px rgba(212, 175, 55, 0.5);
        }
        .hero .btn-gold:hover {
            background: linear-gradient(145deg, #e6c34a, #d4af37);
            box-shadow: 0 14px 34px -6px rgba(212, 175, 55, 0.7);
            transform: translateY(-3px);
        }
        .hero .btn-outline {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.65);
            color: #ffffff;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }
        .hero .btn-outline:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: #d4af37;
            color: #f5e6a3;
            transform: translateY(-3px);
        }

        /* Slider arrows */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
            width: 52px; height: 52px;
            border-radius: 50%;
            background: rgba(10, 20, 40, 0.45);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1.8rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            padding: 0;
        }
        .slider-nav:hover {
            background: rgba(212, 175, 55, 0.85);
            color: #0b0f1c;
            border-color: #d4af37;
            box-shadow: 0 0 28px rgba(212, 175, 55, 0.5);
        }
        .slider-nav:focus-visible {
            outline: 3px solid #d4af37;
            outline-offset: 3px;
        }
        #prevBtn { left: 24px; }
        #nextBtn { right: 24px; }

        /* Bottom dots + progress */
        .slider-bottom {
            position: absolute;
            bottom: 28px;
            left: 0;
            width: 100%;
            z-index: 50;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            pointer-events: none;
        }
        #sliderDots {
            display: flex;
            justify-content: center;
            gap: 14px;
            pointer-events: auto;
            padding: 8px 20px;
            border-radius: 60px;
            background: rgba(10, 20, 40, 0.35);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
            box-shadow: none;
            position: relative;
            overflow: hidden;
        }
        .dot::before { display: none; }
        .dot:hover {
            background: rgba(212, 175, 55, 0.7);
            transform: scale(1.25);
        }
        .dot.active {
            background: #d4af37;
            width: 28px;
            border-radius: 20px;
            box-shadow: 0 0 18px rgba(212, 175, 55, 0.6);
        }
        .dot:focus-visible {
            outline: 2px solid #d4af37;
            outline-offset: 4px;
        }

        #sliderProgressBar {
            width: 220px;
            max-width: 50vw;
            height: 3px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 10px;
            overflow: hidden;
            pointer-events: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        #sliderProgressBar .progress-fill {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #d4af37, #f5e6a3);
            border-radius: 10px;
            transform-origin: left;
            transform: scaleX(0);
            transition: transform 0.1s linear;
        }
        #sliderProgressBar .progress-fill.animate {
            animation: heroProgress 7s linear infinite;
        }
        @keyframes heroProgress {
            0%   { transform: scaleX(0); }
            100% { transform: scaleX(1); }
        }

        /* ============================================================
           BACK TO TOP
           ============================================================ */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 52px; height: 52px;
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
            font-size: 1.1rem;
        }
        .back-to-top.active { opacity: 1; visibility: visible; }
        .back-to-top:hover {
            background: var(--gradient-accent);
            transform: translateY(-5px);
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1199px) {
            .school-name-title { font-size: 1.3rem; }
            .nav-links li a { font-size: 0.85rem; padding: 0 8px; gap: 6px; }
            .nav-links li a i { display: none; }
        }

        @media (max-width: 991px) {
            :root { --header-h: 80px; }
            .header-top-bar { display: none; }
            .header-contact { display: none; }
            .mobile-nav-toggle { display: inline-flex; }
            .header-main-content { padding: 10px 0; gap: 10px; }
            .logo { width: 56px; height: 56px; }
            .school-name-title { font-size: 1.15rem; }
            .school-meta { font-size: 0.72rem; }

            .site-nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--nav-bg);
                box-shadow: 0 12px 24px rgba(0,0,0,0.15);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.35s ease;
            }
            .site-nav.is-open { max-height: 80vh; overflow-y: auto; }
            .nav-links {
                flex-direction: column;
                height: auto;
            }
            .nav-links li {
                width: 100%;
                border-bottom: 1px solid var(--border-color);
            }
            .nav-links li a {
                justify-content: flex-start;
                padding: 16px 24px;
                font-size: 1rem;
                border-bottom: none;
                transition: padding-left 0.25s ease, color 0.25s ease, background-color 0.25s ease;
            }
            .nav-links li a i { display: inline-block; }
            .nav-links li a:hover,
            .nav-links li a:focus-visible {
                padding-left: 28px;
                transform: none;
            }

            .hero { height: 78vh; min-height: 500px; }
            .slide-content { padding: 0 6%; }
        }

        @media (max-width: 767px) {
            .hero { height: 72vh; min-height: 440px; }
            .slide-title { font-size: 2rem; }
            .slide-desc { font-size: 0.95rem; margin-top: 1rem; }
            .slide-cta { margin-top: 1.6rem; gap: 0.8rem; }
            .hero .btn-gold,
            .hero .btn-outline { padding: 0.7rem 1.6rem; font-size: 0.9rem; }
            .slider-nav { width: 42px; height: 42px; font-size: 1.4rem; }
            #prevBtn { left: 12px; }
            #nextBtn { right: 12px; }
            .slider-bottom { bottom: 18px; gap: 10px; }
            #sliderDots { gap: 10px; padding: 6px 16px; }
            .dot.active { width: 22px; }
            #sliderProgressBar { width: 150px; }
        }

        @media (max-width: 575px) {
            .school-name-title { font-size: 1rem; }
            .school-meta { font-size: 0.68rem; }
            .logo { width: 48px; height: 48px; }
            .theme-toggle-track { width: 44px; height: 24px; }
            .theme-toggle-thumb { width: 18px; height: 18px; }
            .mobile-nav-toggle { width: 38px; height: 38px; }
            .back-to-top { width: 46px; height: 46px; bottom: 20px; right: 20px; }
        }

        @media (max-width: 480px) {
            .hero { height: 68vh; min-height: 400px; }
            .slide-title { font-size: 1.7rem; }
            .slide-desc { font-size: 0.85rem; line-height: 1.5; }
            .slide-eyebrow { font-size: 0.65rem; letter-spacing: 0.22em; }
            .hero .btn-gold,
            .hero .btn-outline { padding: 0.6rem 1.2rem; font-size: 0.8rem; }
        }

        @media (max-width: 380px) {
            .hero { min-height: 380px; }
            .slide-content { padding: 0 5%; }
            .slide-title { font-size: 1.45rem; }
            .slide-desc { font-size: 0.8rem; }
            .hero .btn-gold,
            .hero .btn-outline { padding: 0.55rem 1rem; font-size: 0.75rem; }
            #sliderProgressBar { width: 120px; }
            .school-meta span:nth-child(4),
            .school-meta .meta-dot { display: none; }
            .theme-toggle-track { width: 40px; height: 22px; }
            .theme-toggle-thumb { width: 16px; height: 16px; }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .site-header,
            .header-sticky-core,
            .logo,
            .school-name-title,
            .school-meta,
            .clock-icon,
            .admission-badge::after,
            .theme-toggle-thumb,
            .theme-toggle-thumb i,
            .mobile-nav-toggle i,
            .site-nav,
            .slide-image,
            .slide-eyebrow,
            .slide-title,
            .slide-desc,
            .slide-cta,
            .slide { transition: none !important; animation: none !important; }
            .slide.active .slide-image { transform: scale(1); }
            #sliderProgressBar .progress-fill.animate {
                animation: none;
                transform: scaleX(1);
            }
        }

        /* Mobile Toggle — Hidden on Desktop */
.mobile-nav-toggle {
    display: none;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    background: var(--card-bg);
    color: var(--primary);
    font-size: 1.2rem;
    cursor: pointer;
    transition: var(--transition);
}

.mobile-nav-toggle:hover {
    background: var(--primary);
    color: #fff;
}

/* Show Toggle Only on Mobile and Tablet */
@media (max-width: 991px) {
    .mobile-nav-toggle {
        display: inline-flex;
    }
}
    </style>
</head>
<body>

    <!-- ============================================================
         HEADER
         ============================================================ -->
    <header id="siteHeader" class="site-header" role="banner">
        <div class="header-wrapper">

            <!-- Top info strip -->
            <div class="header-top-bar">
                <div class="container header-top-content">
                    <div class="header-info">
                        <div class="header-info-item">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span>Mohddinpur Naibasti, Madhoganj, Hardoi, UP – 241302</span>
                        </div>
                        <div class="header-info-item">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <a href="tel:+918081096231">+91-8081096231</a>
                        </div>
                        <div class="header-info-item">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:info@sdvlcollege.com">info@sdvlcollege.com</a>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <div class="header-social" aria-label="Social media">
                            <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky core -->
            <div class="header-sticky-core" id="headerStickyCore">
                <div class="container header-main-content">

                    <!-- Branding -->
                    <a href="/" class="logo-container" aria-label="B.S.D.L.V. Inter College — Home">
                        <img src="image/logo.jpeg" alt="B.S.D.L.V. Inter College logo" class="logo" width="90" height="90">
                        <div class="school-name">
                            <span class="school-name-title">B.S.D.L.V. Inter College</span>
                            <p class="school-meta">
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>Established 2016</span>
                                <span class="meta-dot" aria-hidden="true">•</span>
                                <span>Madhoganj, Hardoi, UP</span>
                            </p>
                        </div>
                    </a>

                    <!-- Controls -->
                    <div class="header-controls">
                        

                        <button type="button" class="mobile-nav-toggle" id="mobileNavToggle"
                                aria-label="Open navigation menu" aria-expanded="false" aria-controls="navLinks">
                            <i class="fas fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>

                    <!-- Clock + admission -->
                    <div class="header-contact">
                        <div class="header-clock" id="headerClock">
                            <i class="fas fa-clock clock-icon" aria-hidden="true"></i>
                            <div class="clock-text">
                                <span class="clock-time" id="currentTime">00:00</span>
                                <span class="clock-date" id="currentDate">Loading…</span>
                            </div>
                        </div>

                        <a href="https://wa.me/8081096231?text=Hello%20B.S.D.L.V.%20Inter%20College%20Team%2C%20I%20would%20like%20to%20enquire%20about%20admissions."
                           class="admission-badge" target="_blank" rel="noopener"
                           aria-label="Enquire about admissions on WhatsApp">
                            <i class="fas fa-bullhorn" aria-hidden="true"></i>
                            <span class="admission-text">
                                <strong>Admissions Information</strong>
                                <em>Enquire Now</em>
                            </span>
                            <i class="fas fa-arrow-right admission-arrow" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <!-- Nav -->
                <nav class="site-nav" aria-label="Primary navigation">
                    <div class="container">
                        
                        <ul class="nav-links" id="navLinks">
                            <li><a href="/"><i class="fas fa-home" aria-hidden="true"></i> Home</a></li>
                            <li><a href="/about"><i class="fas fa-info-circle" aria-hidden="true"></i> About</a></li>
                            <li><a href="/facilities"><i class="fas fa-building" aria-hidden="true"></i> Facilities</a></li>
                            <li><a href="/facultyStaff"><i class="fas fa-user-plus" aria-hidden="true"></i> Faculty & Staff</a></li>
                            <li><a href="/schoolGallery"><i class="fas fa-images" aria-hidden="true"></i> Gallery</a></li>
                            <li><a href="/boy"><i class="fas fa-user-graduate" aria-hidden="true"></i> Student Portal</a></li>
                            <li>
                                <a href="https://wa.me/8081096231?text=Hello%20B.S.D.L.V.%20Inter%20College%20Team%2C%20I%20have%20a%20query%20—%20kindly%20assist%20me."
                                   target="_blank" rel="noopener" title="Chat with us on WhatsApp">
                                    <i class="fas fa-address-book" aria-hidden="true"></i> Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
    </header>

    <!-- Spacer to prevent content jump when header becomes fixed (desktop only) -->
    <div class="site-header-spacer" aria-hidden="true"></div>

    <!-- ============================================================
         HERO SLIDER
         ============================================================ -->
    
    <!-- Back to Top -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

    <!-- ============================================================
         JAVASCRIPT
         ============================================================ -->
    <script>
    (function () {
        'use strict';

        /* -----------------------------------------------------
           1. HEADER STICKY STATE (desktop only — mobile normal)
           ----------------------------------------------------- */
        const siteHeader = document.getElementById('siteHeader');

        function isDesktop() {
            return window.innerWidth > 991;
        }

        function updateSticky() {
            if (!siteHeader) return;
            // Mobile pe fixed behavior hatao
            if (!isDesktop()) {
                siteHeader.classList.remove('is-stuck');
                return;
            }
            const topBar = siteHeader.querySelector('.header-top-bar');
            const threshold = topBar ? topBar.offsetHeight + 4 : 10;
            siteHeader.classList.toggle('is-stuck', window.scrollY > threshold);
        }

        if (siteHeader) {
            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        updateSticky();
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
            updateSticky();
        }

        /* -----------------------------------------------------
           2. THEME TOGGLE
           ----------------------------------------------------- */
        const themeBtn = document.getElementById('themeToggleBtn');
        const bodyEl = document.body;

        function applyTheme(isDark) {
            bodyEl.setAttribute('data-theme', isDark ? 'dark' : 'light');
            try { localStorage.setItem('theme', isDark ? 'dark' : 'light'); } catch (e) {}
            if (themeBtn) {
                themeBtn.setAttribute('aria-pressed', isDark ? 'true' : 'false');
                themeBtn.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
                themeBtn.setAttribute('title', isDark ? 'Switch to light mode' : 'Switch to dark mode');
            }
        }

        let savedTheme = null;
        try { savedTheme = localStorage.getItem('theme'); } catch (e) {}
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        applyTheme(savedTheme ? savedTheme === 'dark' : prefersDark);

        if (themeBtn) {
            themeBtn.addEventListener('click', () => {
                applyTheme(bodyEl.getAttribute('data-theme') !== 'dark');
            });
        }

        /* -----------------------------------------------------
           3. LIVE CLOCK
           ----------------------------------------------------- */
        const clockEl = document.getElementById('headerClock');
        const timeEl  = document.getElementById('currentTime');
        const dateEl  = document.getElementById('currentDate');
        let clockTimer = null;

        function tickClock() {
            if (!timeEl || !dateEl) return;
            const now = new Date();
            timeEl.textContent = now.toLocaleTimeString('en-IN', {
                hour: '2-digit', minute: '2-digit', hour12: true
            });
            dateEl.textContent = now.toLocaleDateString('en-IN', {
                weekday: 'short', day: 'numeric', month: 'short'
            });
        }

        if (clockEl && timeEl && dateEl) {
            tickClock();
            clockTimer = setInterval(tickClock, 1000);
            window.addEventListener('beforeunload', () => {
                if (clockTimer) clearInterval(clockTimer);
            });
        }

        /* -----------------------------------------------------
           4. MOBILE NAV
           ----------------------------------------------------- */
        const mobileToggle = document.getElementById('mobileNavToggle');
        const navLinks     = document.getElementById('navLinks');
        const siteNav      = navLinks ? navLinks.closest('.site-nav') : null;

        function openMenu() {
            if (!siteNav || !mobileToggle) return;
            siteNav.classList.add('is-open');
            mobileToggle.setAttribute('aria-expanded', 'true');
            mobileToggle.setAttribute('aria-label', 'Close navigation menu');
            mobileToggle.innerHTML = '<i class="fas fa-times" aria-hidden="true"></i>';
            document.body.style.overflow = 'hidden';
            const firstLink = navLinks && navLinks.querySelector('a');
            if (firstLink) firstLink.focus({ preventScroll: true });
        }

        function closeMenu() {
            if (!siteNav || !mobileToggle) return;
            siteNav.classList.remove('is-open');
            mobileToggle.setAttribute('aria-expanded', 'false');
            mobileToggle.setAttribute('aria-label', 'Open navigation menu');
            mobileToggle.innerHTML = '<i class="fas fa-bars" aria-hidden="true"></i>';
            document.body.style.overflow = '';
        }

        function toggleMenu() {
            if (!siteNav) return;
            siteNav.classList.contains('is-open') ? closeMenu() : openMenu();
        }

        if (mobileToggle) {
            mobileToggle.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(); });
        }

        if (navLinks) {
            navLinks.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 991) closeMenu();
                });
            });
        }

        document.addEventListener('click', (e) => {
            if (!siteNav || !mobileToggle) return;
            if (window.innerWidth <= 991 &&
                siteNav.classList.contains('is-open') &&
                !navLinks.contains(e.target) &&
                !mobileToggle.contains(e.target)) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && siteNav && siteNav.classList.contains('is-open')) {
                closeMenu();
                if (mobileToggle) mobileToggle.focus();
            }
        });

        /* Resize: mobile pe state reset */
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (window.innerWidth > 991) {
                    closeMenu();
                } else if (siteHeader) {
                    siteHeader.classList.remove('is-stuck');
                }
                if (siteHeader) updateSticky();
            }, 120);
        });

        /* -----------------------------------------------------
           5. HERO SLIDER
           ----------------------------------------------------- */
        const sliderEl = document.getElementById('slider');
        if (!sliderEl) return;

        const slides   = sliderEl.querySelectorAll('.slide');
        const dotsBox  = document.getElementById('sliderDots');
        const sliderPrev = document.getElementById('prevBtn');
        const sliderNext = document.getElementById('nextBtn');
        const progress = document.getElementById('sliderProgressBar');
        const container = sliderEl.closest('.slider-container');
        const total    = slides.length;
        const AUTO_MS  = 7000;
        const reduced  = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        let current = 0;
        let autoTimer = null;
        let paused = false;

        function buildDots() {
            if (!dotsBox) return;
            dotsBox.innerHTML = '';
            slides.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'dot' + (i === 0 ? ' active' : '');
                dot.setAttribute('role', 'tab');
                dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                dot.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
                dot.dataset.index = String(i);
                dot.addEventListener('click', () => {
                    goTo(i);
                    restartAuto();
                });
                dotsBox.appendChild(dot);
            });
        }

        function ensureProgressFill() {
            if (!progress) return null;
            let fill = progress.querySelector('.progress-fill');
            if (!fill) {
                fill = document.createElement('div');
                fill.className = 'progress-fill';
                progress.appendChild(fill);
            }
            return fill;
        }

        function restartProgress() {
            const fill = ensureProgressFill();
            if (!fill || reduced) return;
            fill.classList.remove('animate');
            void fill.offsetWidth;
            fill.classList.add('animate');
        }

        function updateDots() {
            if (!dotsBox) return;
            dotsBox.querySelectorAll('.dot').forEach((dot, i) => {
                const on = i === current;
                dot.classList.toggle('active', on);
                dot.setAttribute('aria-selected', on ? 'true' : 'false');
            });
        }

        function goTo(index) {
            if (!total) return;
            if (index < 0) index = total - 1;
            if (index >= total) index = 0;
            current = index;
            slides.forEach((s, i) => s.classList.toggle('active', i === current));
            updateDots();
            restartProgress();
        }

        function nextSlide() { goTo(current + 1); }
        function prevSlide() { goTo(current - 1); }

        function stopAuto() {
            if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
        }
        function startAuto() {
            stopAuto();
            if (reduced || paused) return;
            autoTimer = setInterval(nextSlide, AUTO_MS);
        }
        function restartAuto() { stopAuto(); startAuto(); }

        if (sliderPrev) sliderPrev.addEventListener('click', () => { prevSlide(); restartAuto(); });
        if (sliderNext) sliderNext.addEventListener('click', () => { nextSlide(); restartAuto(); });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft')  { prevSlide(); restartAuto(); }
            if (e.key === 'ArrowRight') { nextSlide(); restartAuto(); }
        });

        if (container) {
            container.addEventListener('mouseenter', () => { paused = true; stopAuto(); });
            container.addEventListener('mouseleave', () => { paused = false; startAuto(); });
            container.addEventListener('focusin',   () => { paused = true; stopAuto(); });
            container.addEventListener('focusout',  () => { paused = false; startAuto(); });

            let touchStart = 0;
            container.addEventListener('touchstart', (e) => {
                touchStart = e.changedTouches[0].screenX;
                stopAuto();
            }, { passive: true });
            container.addEventListener('touchend', (e) => {
                const diff = touchStart - e.changedTouches[0].screenX;
                if (Math.abs(diff) > 50) (diff > 0 ? nextSlide : prevSlide)();
                startAuto();
            }, { passive: true });
        }

        buildDots();
        ensureProgressFill();
        goTo(0);
        startAuto();
        window.addEventListener('beforeunload', stopAuto);

        /* -----------------------------------------------------
           6. BACK TO TOP
           ----------------------------------------------------- */
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            window.addEventListener('scroll', () => {
                backToTop.classList.toggle('active', window.scrollY > 300);
            }, { passive: true });
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        /* -----------------------------------------------------
           7. ANCHOR SCROLL with header offset
           ----------------------------------------------------- */
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const id = this.getAttribute('href');
                if (!id || id === '#') return;
                const target = document.querySelector(id);
                if (!target) return;
                e.preventDefault();
                const headerH = parseFloat(
                    getComputedStyle(document.documentElement).getPropertyValue('--header-h')
                ) || 120;
                const y = target.getBoundingClientRect().top + window.scrollY - headerH;
                window.scrollTo({ top: y, behavior: 'smooth' });
                if (window.innerWidth <= 991) closeMenu();
            });
        });

    })();
    </script>
</body>
</html>
