<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $seoTitle = 'Faculty & Staff | B.S.D.L.V. Inter College';
        $seoDescription = 'Meet the teaching and support staff at B.S.D.L.V. Inter College in Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh.';
    @endphp
    @include('partials.seo', [
        'title' => $seoTitle,
        'description' => $seoDescription,
        'includeSchoolSchema' => request()->path() === '/',
        'breadcrumbs' => $__env->yieldContent('breadcrumbName'),
    ])
    @stack('styles')
    <link rel="icon" type="image/jpeg" href="{{ asset('image/logo.jpeg') }}">

    {{-- ============================================================
         PRELOADER STYLES — scoped under #bsdlvPreloader
         ============================================================ --}}
    <style>
        /* Prevent horizontal shift / scroll flash while preloading */
        body.bsdlv-loading {
            overflow: hidden !important;
            height: 100vh;
        }

        /* ---- Wrapper ---- */
        #bsdlvPreloader {
            position: fixed;
            inset: 0;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: radial-gradient(ellipse at 50% 40%, #14335e 0%, #0a1e3a 45%, #05101f 100%);
            color: #ffffff;
            font-family: 'Source Serif Pro', Georgia, serif;
            overflow: hidden;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.7s ease, visibility 0.7s ease;
            will-change: opacity;
        }
        #bsdlvPreloader.bsdlv-hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        /* ---- Floating light particles ---- */
        #bsdlvPreloader .bsdlv-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }
        #bsdlvPreloader .bsdlv-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249,168,38,0.9), rgba(249,168,38,0));
            opacity: 0.6;
            animation: bsdlvFloat linear infinite;
            will-change: transform, opacity;
        }
        #bsdlvPreloader .bsdlv-particle:nth-child(1)  { left: 8%;  top: 20%; animation-duration: 12s; animation-delay: 0s;  }
        #bsdlvPreloader .bsdlv-particle:nth-child(2)  { left: 20%; top: 70%; animation-duration: 15s; animation-delay: 2s;  }
        #bsdlvPreloader .bsdlv-particle:nth-child(3)  { left: 35%; top: 35%; animation-duration: 10s; animation-delay: 1s;  }
        #bsdlvPreloader .bsdlv-particle:nth-child(4)  { left: 50%; top: 80%; animation-duration: 14s; animation-delay: 3s;  }
        #bsdlvPreloader .bsdlv-particle:nth-child(5)  { left: 65%; top: 15%; animation-duration: 11s; animation-delay: 0.5s;}
        #bsdlvPreloader .bsdlv-particle:nth-child(6)  { left: 75%; top: 55%; animation-duration: 16s; animation-delay: 4s;  }
        #bsdlvPreloader .bsdlv-particle:nth-child(7)  { left: 88%; top: 30%; animation-duration: 13s; animation-delay: 1.5s;}
        #bsdlvPreloader .bsdlv-particle:nth-child(8)  { left: 42%; top: 60%; animation-duration: 17s; animation-delay: 2.5s;}
        #bsdlvPreloader .bsdlv-particle:nth-child(9)  { left: 55%; top: 25%; animation-duration: 9s;  animation-delay: 0.2s;}
        #bsdlvPreloader .bsdlv-particle:nth-child(10) { left: 15%; top: 45%; animation-duration: 18s; animation-delay: 5s;  }

        @keyframes bsdlvFloat {
            0%   { transform: translate3d(0, 0, 0) scale(1);    opacity: 0.15; }
            50%  { transform: translate3d(20px, -30px, 0) scale(1.4); opacity: 0.7;  }
            100% { transform: translate3d(0, -60px, 0) scale(1);  opacity: 0.15; }
        }

        /* ---- Logo frame ---- */
        #bsdlvPreloader .bsdlv-logo-frame {
            position: relative;
            width: 140px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
            animation: bsdlvBreathe 3s ease-in-out infinite;
        }
        @keyframes bsdlvBreathe {
            0%, 100% { transform: scale(1); }
            50%      { transform: scale(1.04); }
        }

        /* Rotating gold ring */
        #bsdlvPreloader .bsdlv-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            padding: 3px;
            background: conic-gradient(from 0deg, transparent 0deg, #f9a826 60deg, #ffc55a 120deg, #f9a826 180deg, transparent 240deg, transparent 360deg);
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
                    mask-composite: exclude;
            animation: bsdlvSpin 3s linear infinite;
            filter: drop-shadow(0 0 8px rgba(249, 168, 38, 0.6));
        }
        @keyframes bsdlvSpin {
            to { transform: rotate(360deg); }
        }

        /* Inner glass circle */
        #bsdlvPreloader .bsdlv-logo-glass {
            position: relative;
            width: 116px;
            height: 116px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            border: 1px solid rgba(249, 168, 38, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow:
                0 0 40px rgba(249, 168, 38, 0.25),
                inset 0 0 20px rgba(255, 255, 255, 0.05);
        }
        #bsdlvPreloader .bsdlv-logo-glass img {
            width: 114px;
            height: 114px;
            border-radius: 50%;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.3));
            animation: bsdlvLogoFade 1.2s ease 0.2s both;
        }
        @keyframes bsdlvLogoFade {
            from { opacity: 0; transform: scale(0.85); }
            to   { opacity: 1; transform: scale(1); }
        }

        /* Logo fallback */
        #bsdlvPreloader .bsdlv-logo-fallback {
            display: none;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            font-family: 'Merriweather', Georgia, serif;
            font-size: 1.6rem;
            font-weight: 900;
            color: #f9a826;
            letter-spacing: 1px;
        }
        #bsdlvPreloader .bsdlv-logo-glass.bsdlv-img-error img { display: none; }
        #bsdlvPreloader .bsdlv-logo-glass.bsdlv-img-error .bsdlv-logo-fallback { display: flex; }

        /* ---- Text block ---- */
        #bsdlvPreloader .bsdlv-text {
            text-align: center;
            padding: 0 24px;
            max-width: 90vw;
            animation: bsdlvTextFade 1s ease 0.5s both;
        }
        @keyframes bsdlvTextFade {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        #bsdlvPreloader .bsdlv-school-name {
            font-family: 'Merriweather', Georgia, serif;
            font-size: clamp(1.4rem, 4vw, 2rem);
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0 0 10px;
            color: #ffffff;
            line-height: 1.2;
        }
        #bsdlvPreloader .bsdlv-school-name span {
            background: linear-gradient(90deg, #f9a826, #ffc55a, #f9a826);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: bsdlvGoldShine 4s linear infinite;
        }
        @keyframes bsdlvGoldShine {
            to { background-position: 200% center; }
        }

        #bsdlvPreloader .bsdlv-location {
            font-family: 'Source Serif Pro', Georgia, serif;
            font-size: clamp(0.78rem, 2.2vw, 0.95rem);
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 0.4px;
            margin: 0;
        }

        /* ---- Animated progress bar ---- */
        #bsdlvPreloader .bsdlv-progress {
            position: relative;
            width: min(240px, 65vw);
            height: 3px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 3px;
            margin-top: 30px;
            overflow: hidden;
        }
        #bsdlvPreloader .bsdlv-progress-fill {
            position: absolute;
            top: 0; left: 0;
            height: 100%;
            width: 40%;
            border-radius: 3px;
            background: linear-gradient(90deg, transparent, #f9a826, #ffc55a, #f9a826, transparent);
            animation: bsdlvProgress 1.6s ease-in-out infinite;
            filter: drop-shadow(0 0 6px rgba(249, 168, 38, 0.8));
        }
        @keyframes bsdlvProgress {
            0%   { left: -40%; }
            100% { left: 100%; }
        }

        /* ---- Loading dots ---- */
        #bsdlvPreloader .bsdlv-dots {
            display: flex;
            gap: 8px;
            margin-top: 18px;
            justify-content: center;
        }
        #bsdlvPreloader .bsdlv-dots span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #f9a826;
            opacity: 0.4;
            animation: bsdlvDot 1.4s ease-in-out infinite;
        }
        #bsdlvPreloader .bsdlv-dots span:nth-child(1) { animation-delay: 0s;   }
        #bsdlvPreloader .bsdlv-dots span:nth-child(2) { animation-delay: 0.2s; }
        #bsdlvPreloader .bsdlv-dots span:nth-child(3) { animation-delay: 0.4s; }
        @keyframes bsdlvDot {
            0%, 100% { opacity: 0.3; transform: scale(0.85); }
            50%      { opacity: 1;   transform: scale(1.15); }
        }

        /* ---- Created by credit ---- */
        #bsdlvPreloader .bsdlv-credit {
            margin-top: 22px;
            font-family: 'Source Serif Pro', Georgia, serif;
            font-size: 0.72rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
            animation: bsdlvTextFade 1s ease 0.9s both;
        }
        #bsdlvPreloader .bsdlv-credit-name {
            display: inline-block;
            background: linear-gradient(90deg, #f9a826, #ffc55a, #f9a826);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            letter-spacing: 0.22em;
            animation: bsdlvGoldShine 4s linear infinite;
        }

        /* ---- Responsive tweaks ---- */
        @media (max-width: 480px) {
            #bsdlvPreloader .bsdlv-logo-frame { width: 110px; height: 110px; margin-bottom: 24px; }
            #bsdlvPreloader .bsdlv-logo-glass { width: 90px; height: 90px; }
            #bsdlvPreloader .bsdlv-progress { margin-top: 22px; }
            #bsdlvPreloader .bsdlv-credit { margin-top: 16px; font-size: 0.65rem; }
        }

        /* ---- Reduced motion ---- */
        @media (prefers-reduced-motion: reduce) {
            #bsdlvPreloader .bsdlv-particle,
            #bsdlvPreloader .bsdlv-ring,
            #bsdlvPreloader .bsdlv-progress-fill,
            #bsdlvPreloader .bsdlv-dots span,
            #bsdlvPreloader .bsdlv-logo-frame,
            #bsdlvPreloader .bsdlv-school-name span,
            #bsdlvPreloader .bsdlv-logo-glass img,
            #bsdlvPreloader .bsdlv-text,
            #bsdlvPreloader .bsdlv-credit,
            #bsdlvPreloader .bsdlv-credit-name {
                animation: none !important;
                transition: none !important;
            }
            #bsdlvPreloader .bsdlv-progress-fill { left: 30%; width: 40%; opacity: 0.6; }
            #bsdlvPreloader .bsdlv-dots span { opacity: 0.6; }
            #bsdlvPreloader .bsdlv-credit-name {
                -webkit-text-fill-color: #f9a826;
                color: #f9a826;
                background: none;
            }
        }
    </style>
</head>
<body class="bsdlv-loading">

    <!-- ============================================================
         PRELOADER MARKUP
         ============================================================ -->
    <div id="bsdlvPreloader" role="status" aria-live="polite" aria-label="Loading B.S.D.L.V. Inter College">
        <!-- Floating particles (CSS only) -->
        <div class="bsdlv-particles" aria-hidden="true">
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
            <span class="bsdlv-particle"></span>
        </div>

        <!-- Logo -->
        <div class="bsdlv-logo-frame" aria-hidden="true">
            <div class="bsdlv-ring"></div>
            <div class="bsdlv-logo-glass" id="bsdlvLogoWrap">
                <img
                    src="{{ asset('image/logo.jpeg') }}"
                    alt="B.S.D.L.V. Inter College Logo"
                    id="bsdlvLogoImg"
                    onerror="document.getElementById('bsdlvLogoWrap').classList.add('bsdlv-img-error');">
                <span class="bsdlv-logo-fallback">BSD</span>
            </div>
        </div>

        <!-- School identity -->
        <div class="bsdlv-text">
            <p class="bsdlv-school-name"><span>B.S.D.L.V. Inter College</span></p>
            <p class="bsdlv-location">Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh</p>
        </div>

        <!-- Progress line -->
        <div class="bsdlv-progress" aria-hidden="true">
            <div class="bsdlv-progress-fill"></div>
        </div>

        <!-- Loading dots -->
        <div class="bsdlv-dots" aria-hidden="true">
            <span></span><span></span><span></span>
        </div>

        <!-- Created by credit -->
        <p class="bsdlv-credit">
            Created by <span class="bsdlv-credit-name"> Code Like Vivek</span>
        </p>
    </div>

    <!-- ============================================================
         PAGE CONTENT
         ============================================================ -->
    @yield('content')

    <!-- ============================================================
         PRELOADER SCRIPT
         ============================================================ -->
    <script>
    (function () {
        'use strict';

        var MIN_DISPLAY_MS = 1500;   // Minimum loader time (1200–1800 recommended)
        var MAX_WAIT_MS    = 6000;   // Safety fallback

        var preloader = document.getElementById('bsdlvPreloader');
        if (!preloader) {
            document.body.classList.remove('bsdlv-loading');
            return;
        }

        var startTime = Date.now();
        var hidden = false;

        function hidePreloader() {
            if (hidden) return;
            hidden = true;

            var elapsed = Date.now() - startTime;
            var remaining = Math.max(0, MIN_DISPLAY_MS - elapsed);

            setTimeout(function () {
                preloader.classList.add('bsdlv-hidden');

                document.body.classList.remove('bsdlv-loading');
                document.body.style.overflow = '';
                document.body.style.height = '';

                setTimeout(function () {
                    if (preloader && preloader.parentNode) {
                        preloader.parentNode.removeChild(preloader);
                    }
                }, 800);
            }, remaining);
        }

        window.addEventListener('load', hidePreloader);
        setTimeout(hidePreloader, MAX_WAIT_MS);

        if (document.readyState === 'complete') {
            hidePreloader();
        }
    })();
    </script>

    {{-- Aapke existing page scripts yahan aayenge (agar the) --}}
    {{-- @stack('scripts') --}}
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty &amp; Staff | B.S.D.L.V. Inter College</title>
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
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--primary);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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

        /* Faculty Section Styles */
        .faculty-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .tab-btn {
            padding: 12px 24px;
            background: white;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            box-shadow: var(--shadow);
            color: var(--dark);
        }

        .tab-btn.active {
            background: var(--primary);
            color: white;
        }

        .tab-btn:hover:not(.active) {
            background: var(--light);
            transform: translateY(-2px);
        }

        .faculty-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .faculty-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .faculty-card {
            background: white;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .faculty-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .faculty-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-bottom: 3px solid var(--accent);
        }

        .faculty-info {
            padding: 20px;
        }

        .faculty-name {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: var(--primary);
        }

        .faculty-role {
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .faculty-subject {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .faculty-qualification {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 15px;
            color: #555;
            font-size: 0.85rem;
        }

        .faculty-qualification i {
            color: var(--accent);
        }

        .faculty-experience {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 15px;
            color: #555;
            font-size: 0.85rem;
        }

        .faculty-experience i {
            color: var(--accent);
        }

        .faculty-contact {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .faculty-contact a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: var(--light);
            border-radius: 50%;
            transition: var(--transition);
            color: var(--primary);
        }

        .faculty-contact a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Department Stats */
        .department-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: var(--radius);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .faculty-tabs {
                flex-direction: column;
                align-items: center;
            }
            
            .tab-btn {
                width: 100%;
                max-width: 300px;
            }
            
            .faculty-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .section {
                padding: 40px 0;
            }
            
            .section-title h2 {
                font-size: 1.7rem;
            }
            
            .faculty-grid {
                grid-template-columns: 1fr;
            }
            
            .department-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include("header")
    <!-- Faculty Section -->
    <section class="section" id="faculty">
        <div class="container">
            <div class="section-title">
                <h2>Our Distinguished Faculty</h2>
                <p>Meet our dedicated team of experienced educators committed to nurturing young minds</p>
            </div>
            
            <div class="faculty-tabs">
                <button class="tab-btn active" data-tab="teaching">Teaching Staff</button>
                <button class="tab-btn" data-tab="non-teaching">Non-Teaching Staff</button>
                <button class="tab-btn" data-tab="administration">Administration</button>
                <button class="tab-btn" data-tab="support">Support Staff</button>
            </div>
            
            <!-- Teaching Staff -->
            <div class="faculty-content active" id="teaching-content">
                <div class="faculty-grid">
                    <!-- Faculty Member 1 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Dr. Rajesh Kumar" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Dr. Rajesh Kumar</h3>
                            <p class="faculty-role">Principal & Physics Teacher</p>
                            <p class="faculty-subject">Physics (Class 11-12)</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Ph.D. in Physics, B.Ed.</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>22 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Faculty Member 2 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mrs. Priya Sharma" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mrs. Priya Sharma</h3>
                            <p class="faculty-role">Vice Principal & Mathematics Teacher</p>
                            <p class="faculty-subject">Mathematics (Class 9-12)</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>M.Sc. Mathematics, B.Ed.</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>18 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Faculty Member 3 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Ms. Anjali Singh" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Ms. Anjali Singh</h3>
                            <p class="faculty-role">Chemistry HOD</p>
                            <p class="faculty-subject">Chemistry (Class 11-12)</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>M.Sc. Chemistry, B.Ed.</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>15 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Faculty Member 4 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1566753323558-f4e0952af115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mr. Amit Verma" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mr. Amit Verma</h3>
                            <p class="faculty-role">Biology Teacher</p>
                            <p class="faculty-subject">Biology (Class 11-12)</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>M.Sc. Zoology, B.Ed.</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>12 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="department-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-number">48</div>
                        <div class="stat-label">Teaching Staff</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stat-number">32</div>
                        <div class="stat-label">Post Graduates</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="stat-number">15</div>
                        <div class="stat-label">Award Winners</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Avg. Experience (Years)</div>
                    </div>
                </div>
            </div>
            
            <!-- Non-Teaching Staff -->
            <div class="faculty-content" id="non-teaching-content">
                <div class="faculty-grid">
                    <!-- Staff Member 1 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1551836026-d5c2e0c49b13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mr. Ramesh Chand" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mr. Ramesh Chand</h3>
                            <p class="faculty-role">Librarian</p>
                            <p class="faculty-subject">Central Library</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>M.Lib, Diploma in Library Science</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>14 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Staff Member 2 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mrs. Sunita Devi" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mrs. Sunita Devi</h3>
                            <p class="faculty-role">Lab Assistant</p>
                            <p class="faculty-subject">Science Laboratory</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>B.Sc., Lab Technician Certificate</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>9 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Administration -->
            <div class="faculty-content" id="administration-content">
                <div class="faculty-grid">
                    <!-- Admin Member 1 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mr. Sanjay Gupta" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mr. Sanjay Gupta</h3>
                            <p class="faculty-role">Administrative Officer</p>
                            <p class="faculty-subject">Administration Department</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>MBA, B.Com</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>16 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Admin Member 2 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mrs. Rekha Joshi" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mrs. Rekha Joshi</h3>
                            <p class="faculty-role">Accounts Manager</p>
                            <p class="faculty-subject">Finance Department</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>M.Com, CA Inter</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>12 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Support Staff -->
            <div class="faculty-content" id="support-content">
                <div class="faculty-grid">
                    <!-- Support Staff 1 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mr. Ram Singh" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mr. Ram Singh</h3>
                            <p class="faculty-role">Head Peon</p>
                            <p class="faculty-subject">General Administration</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>High School</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>18 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Support Staff 2 -->
                    <div class="faculty-card">
                        <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" alt="Mr. Suresh Kumar" class="faculty-img">
                        <div class="faculty-info">
                            <h3 class="faculty-name">Mr. Suresh Kumar</h3>
                            <p class="faculty-role">Bus Driver</p>
                            <p class="faculty-subject">Transport Department</p>
                            <div class="faculty-qualification">
                                <i class="fas fa-graduation-cap"></i>
                                <span>High School, Heavy Vehicle License</span>
                            </div>
                            <div class="faculty-experience">
                                <i class="fas fa-briefcase"></i>
                                <span>10 Years Experience</span>
                            </div>
                            <div class="faculty-contact">
                                <a href="#"><i class="fas fa-envelope"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include("footer")
    <script>
        // Faculty Tab Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const facultyContents = document.querySelectorAll('.faculty-content');
            
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabBtns.forEach(b => b.classList.remove('active'));
                    facultyContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(`${tabId}-content`).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>