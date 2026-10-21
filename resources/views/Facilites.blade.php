<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $seoTitle = trim($__env->yieldContent('title', 'B.S.D.L.V. Inter College'));
        $seoDescription = trim($__env->yieldContent('description', 'B.S.D.L.V. Inter College is located in Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh.'));
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
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.seo', [
        'title' => 'School Facilities | B.S.D.L.V. Inter College',
        'description' => 'Explore the facilities shown at B.S.D.L.V. Inter College in Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh.',
        'breadcrumbs' => 'Facilities',
    ])

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Source+Serif+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ============================================================
           GLOBAL RESET & VARIABLES (PRESERVING EXISTING COLORS)
           ============================================================ */
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
            
            --accent-light: #ffcc66;
            --accent-dark: #cc7a00;
            --text-muted: #666666;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
            --section-bg: #ffffff;
            
            --font-heading: 'Merriweather', serif;
            --font-body: 'Source Serif Pro', serif;
            
            --shadow-sm: 0 4px 6px rgba(26, 75, 140, 0.05);
            --shadow-md: 0 10px 24px -8px rgba(26, 75, 140, 0.15);
            --shadow-lg: 0 20px 40px -12px rgba(26, 75, 140, 0.25);
        }

    
        body {
            font-family: var(--font-body);
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
            min-width: 320px;
        }

       

     

        /* ============================================================
           1. HERO BANNER
           ============================================================ */
        .fac-hero {
            position: relative;
            padding: 140px 0 110px;
            overflow: hidden;
            text-align: center;
            color:var(--primary);
        }

       

        .fac-hero__overlay {
            position: absolute;
            inset: 0;
            z-index: 1;
        }

        .fac-hero__container {
            position: relative;
            z-index: 2;
            margin: 0 auto;
        }

        .fac-hero__breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            
            font-family: var(--font-body);
            font-size: 0.82rem;
            margin-bottom: 24px;
            padding: 8px 18px;
            border: 1px solid var(--accent);
            border-radius: 100px;
        }

        .fac-hero__breadcrumb a {
            text-decoration: none;
            transition: color 0.25s ease;
        }

        .fac-hero__breadcrumb a:hover { color: var(--accent); }
        .fac-hero__breadcrumb i { font-size: 0.6rem; color: var(--accent); }
        .fac-hero__breadcrumb span { color: var(--accent); font-weight: 600; }

        .fac-hero__title {
            font-family: var(--font-heading);
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.15;

            letter-spacing: -0.02em;
            margin: 0 0 20px;
            color:var(--primary);
        }

        .fac-hero__subtitle {
            font-family: var(--font-body);
            font-size: clamp(1rem, 1.5vw, 1.2rem);
            line-height: 1.7;
            color:var(--primary);
            max-width: 640px;
            margin: 0 auto;
        }

        /* ============================================================
           2. INTRODUCTION SECTION
           ============================================================ */
        .fac-intro {
            padding: 100px 0;
        }

        .fac-intro__grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .fac-intro__content {
            max-width: 520px;
        }

        .fac-intro__eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-family: var(--font-body);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: var(--accent-dark);
            padding: 8px 16px;
            background: rgba(249, 168, 38, 0.08);
            border: 1px solid rgba(249, 168, 38, 0.25);
            border-radius: 100px;
            margin-bottom: 20px;
        }



        .fac-intro__eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 3px rgba(249, 168, 38, 0.2);
            animation: facDotPulse 2s ease-in-out infinite;
        }

        @keyframes facDotPulse {
            0%, 100% { box-shadow: 0 0 0 3px rgba(249, 168, 38, 0.2); }
            50%      { box-shadow: 0 0 0 6px rgba(249, 168, 38, 0.05); }
        }

        .fac-intro__title {
            font-family: var(--font-heading);
            font-size: clamp(1.9rem, 3.4vw, 2.6rem);
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -0.02em;
            margin: 0 0 16px;
            line-height: 1.2;
        }
        [data-theme="dark"] .fac-intro__title { color: #f8f9fa; }

        .fac-intro__divider {
            display: block;
            width: 70px;
            height: 3px;
            background: var(--accent);
            border-radius: 3px;
            margin: 0 0 22px;
        }

        .fac-intro__desc {
            font-family: var(--font-body);
            font-size: 1.02rem;
            line-height: 1.75;
            color: var(--text-muted);
            margin: 0;
        }

        .fac-intro__image-wrap {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            aspect-ratio: 4/3;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .fac-intro__image-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fac-intro__image-wrap:hover img {
            transform: scale(1.05);
        }

        /* ============================================================
           3. FACILITIES CARDS GRID
           ============================================================ */
        .fac-grid-section {
            padding: 100px 0;
            background: var(--light);
        }
        [data-theme="dark"] .fac-grid-section { background: #0a0f14; }

        .fac-grid-section__head {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
        }

        .fac-grid-section__title {
            font-family: var(--font-heading);
            font-size: clamp(1.9rem, 3.4vw, 2.6rem);
            font-weight: 900;
            color: var(--primary);
            margin: 0 0 16px;
        }
        [data-theme="dark"] .fac-grid-section__title { color: #f8f9fa; }

        .fac-grid-section__divider {
            display: block;
            width: 70px;
            height: 3px;
            background: var(--accent);
            margin: 0 auto 20px;
        }

        .fac-grid-section__sub {
            font-size: 1.02rem;
            color: var(--text-muted);
            margin: 0;
        }

        .fac-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fac-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.4s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .fac-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .fac-card__image {
            position: relative;
            aspect-ratio: 16/10;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .fac-card__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fac-card:hover .fac-card__image img {
            transform: scale(1.08);
        }

        .fac-card__icon {
            position: absolute;
            bottom: -24px;
            left: 24px;
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: var(--accent);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            z-index: 2;
            box-shadow: var(--shadow-md);
            transition: transform 0.4s ease;
        }

        .fac-card:hover .fac-card__icon {
            transform: rotate(-6deg) scale(1.1);
        }

        .fac-card__body {
            padding: 40px 24px 26px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .fac-card__title {
            font-family: var(--font-heading);
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0 0 10px;
            line-height: 1.3;
        }
        [data-theme="dark"] .fac-card__title { color: #f8f9fa; }

        .fac-card__desc {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin: 0;
        }

        /* ============================================================
           4. FEATURED FACILITY SECTION
           ============================================================ */
        .fac-featured {
            padding: 100px 0;
            background: var(--section-bg);
        }

        .fac-featured__grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
            align-items: center;
            background: var(--light);
            border-radius: 24px;
            padding: 50px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-color);
        }
        [data-theme="dark"] .fac-featured__grid { background: #1e1e1e; }

        .fac-featured__image {
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 4/3;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            position: relative;
        }

        .fac-featured__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .fac-featured__badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent);
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 100px;
            font-family: var(--font-body);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow: var(--shadow-md);
        }

        .fac-featured__content {
            padding: 20px;
        }

        .fac-featured__eyebrow {
            display: inline-block;
            font-family: var(--font-body);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent-dark);
            margin-bottom: 16px;
        }

        .fac-featured__title {
            font-family: var(--font-heading);
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 900;
            color: var(--primary);
            margin: 0 0 20px;
            line-height: 1.25;
        }
        [data-theme="dark"] .fac-featured__title { color: #f8f9fa; }

        .fac-featured__desc {
            font-size: 1rem;
            line-height: 1.75;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .fac-featured__btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 26px;
            background: var(--primary);
            color: #ffffff;
            text-decoration: none;
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.92rem;
            border-radius: 100px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .fac-featured__btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* ============================================================
           5. CAMPUS PHOTO GALLERY
           ============================================================ */
        .fac-gallery {
            padding: 100px 0;
            background: var(--light);
        }
        [data-theme="dark"] .fac-gallery { background: #0a0f14; }

        .fac-gallery__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fac-gallery__item {
            position: relative;
            aspect-ratio: 1/1;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .fac-gallery__item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.8s ease;
        }

        .fac-gallery__item:hover img { transform: scale(1.1); }

        .fac-gallery__overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 40%, rgba(26,75,140,0.85) 100%);
            display: flex;
            align-items: flex-end;
            padding: 16px;
            color: #ffffff;
            font-family: var(--font-heading);
            font-weight: 700;
            font-size: 0.9rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .fac-gallery__item:hover .fac-gallery__overlay { opacity: 1; }

        /* Lightbox */
        .fac-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(10, 20, 32, 0.95);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 40px;
            backdrop-filter: blur(6px);
        }
        .fac-lightbox.is-active { display: flex; }

        .fac-lightbox__img {
            max-width: 90vw;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 40px 80px rgba(0,0,0,0.6);
            border: 2px solid var(--accent);
        }

        .fac-lightbox__close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .fac-lightbox__close:hover {
            background: var(--accent);
            color: var(--primary);
            transform: rotate(90deg);
        }

        /* ============================================================
           6. WHY OUR CAMPUS
           ============================================================ */
        .fac-why {
            padding: 100px 0;
            background: var(--section-bg);
        }

        .fac-why__grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 28px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fac-why__item {
            text-align: center;
            padding: 36px 24px;
            background: var(--light);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        [data-theme="dark"] .fac-why__item { background: #1e1e1e; }

        .fac-why__item:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        .fac-why__icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(249, 168, 38, 0.12);
            color: var(--accent);
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }

        .fac-why__item:hover .fac-why__icon {
            background: var(--accent);
            color: #ffffff;
            transform: scale(1.1) rotate(-6deg);
        }

        .fac-why__title {
            font-family: var(--font-heading);
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0 0 8px;
        }
        [data-theme="dark"] .fac-why__title { color: #f8f9fa; }

        .fac-why__desc {
            font-size: 0.88rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin: 0;
        }

        /* ============================================================
           7. CTA SECTION
           ============================================================ */
        .fac-cta {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .fac-cta::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.1);
        }

        .fac-cta__wrap {
            position: relative;
            z-index: 2;
            max-width: 700px;
            margin: 0 auto;
        }

        .fac-cta__title {
            font-family: var(--font-heading);
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 16px;
            letter-spacing: -0.02em;
        }

        .fac-cta__desc {
            font-size: 1.05rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.85);
            margin: 0 0 30px;
        }

        .fac-cta__btns {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .fac-cta__btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            font-family: var(--font-body);
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            border-radius: 100px;
            transition: all 0.3s ease;
        }

        .fac-cta__btn--primary {
            background: var(--accent);
            color: var(--primary);
            box-shadow: 0 12px 28px -8px rgba(249, 168, 38, 0.5);
        }

        .fac-cta__btn--primary:hover {
            background: var(--accent-light);
            transform: translateY(-3px);
            box-shadow: 0 16px 36px -8px rgba(249, 168, 38, 0.7);
        }

        .fac-cta__btn--ghost {
            background: transparent;
            color: #ffffff;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .fac-cta__btn--ghost:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent);
            color: var(--accent);
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 991px) {
            .fac-intro__grid, .fac-featured__grid { grid-template-columns: 1fr; gap: 40px; }
            .fac-featured__grid { padding: 30px; }
            .fac-intro__content { max-width: 100%; }
            .fac-grid { grid-template-columns: repeat(2, 1fr); gap: 22px; }
            .fac-gallery__grid { grid-template-columns: repeat(3, 1fr); gap: 16px; }
            .fac-why__grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
        }

        @media (max-width: 640px) {
            .fac-hero { padding: 100px 0 80px; }
            .fac-intro, .fac-grid-section, .fac-featured, .fac-gallery, .fac-why, .fac-cta { padding: 70px 0; }
            .fac-grid { grid-template-columns: 1fr; }
            .fac-gallery__grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .fac-why__grid { grid-template-columns: 1fr; }
            .fac-cta__btns { flex-direction: column; align-items: center; }
            .fac-cta__btn { width: 100%; max-width: 280px; justify-content: center; }
            .fac-featured__grid { padding: 20px; border-radius: 16px; }
            .fac-hero__breadcrumb { font-size: 0.75rem; padding: 6px 14px; }
        }

        /* ============================================================
           REDUCED MOTION
           ============================================================ */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            .fac-card:hover, .fac-card:hover .fac-card__image img, .fac-card:hover .fac-card__icon,
            .fac-intro__image-wrap:hover img, .fac-gallery__item:hover img, .fac-why__item:hover,
            .fac-why__item:hover .fac-why__icon, .fac-cta__btn--primary:hover { transform: none !important; }
        }
    </style>
</head>
<body>

@include('header')
    <!-- ============================================================
         1. HERO BANNER
         ============================================================ -->
    <section class="fac-hero">
        <div class="fac-hero__bg"></div>
        <div class="fac-hero__overlay"></div>
        <div class="container fac-hero__container">
            <nav class="fac-hero__breadcrumb" aria-label="Breadcrumb">
                <a href="#">Home</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span aria-current="page">Facilities</span>
            </nav>
            <h1 class="fac-hero__title">Our School Facilities</h1>
            <p class="fac-hero__subtitle">
                Creating a Better Environment for Learning, Growth and Success
            </p>
        </div>
    </section>

    <!-- ============================================================
         2. INTRODUCTION SECTION
         ============================================================ -->
    <section class="fac-intro">
        <div class="container">
            <div class="fac-intro__grid">
                <div class="fac-intro__content">
                    <span class="fac-intro__eyebrow">
                        <span class="fac-intro__eyebrow-dot"></span>
                        Our Environment
                    </span>
                    <h2 class="fac-intro__title">Facilities That Inspire Learning</h2>
                    <span class="fac-intro__divider"></span>
                    <p class="fac-intro__desc">
                        At B.S.D.L.V. Inter College, we believe that a supportive and well-equipped environment is essential for meaningful learning. Our facilities are designed to encourage curiosity, foster creativity, and ensure the safety and comfort of every student.
                    </p>
                </div>
                <div class="fac-intro__image-wrap">
                    <img src="image/5.jpeg" alt="Students learning in a classroom" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=800&q=80'">
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         3. FACILITIES CARDS GRID
         ============================================================ -->
    <section class="fac-grid-section">
        <div class="container">
            <div class="fac-grid-section__head">
                <h2 class="fac-grid-section__title">Explore Our Campus Amenities</h2>
                <span class="fac-grid-section__divider"></span>
                <p class="fac-grid-section__sub">Everything students need to learn, grow and thrive.</p>
            </div>

            <div class="fac-grid">
                <!-- 1. Smart Classrooms -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=600&q=80" alt="Smart Classroom" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Smart Classrooms</h3>
                        <p class="fac-card__desc">Technology-enabled learning spaces that make lessons interactive and engaging.</p>
                    </div>
                </article>

                <!-- 2. Computer Laboratory -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1591696205602-2f950c417dad?auto=format&fit=crop&w=600&q=80" alt="Computer Lab" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-desktop"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Computer Laboratory</h3>
                        <p class="fac-card__desc">Modern computing facilities to build digital literacy and IT skills.</p>
                    </div>
                </article>

                <!-- 3. Science Laboratory -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="image/12.jpeg" alt="Science Lab" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=600&q=80'">
                        <div class="fac-card__icon"><i class="fas fa-flask"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Science Laboratory</h3>
                        <p class="fac-card__desc">Well-equipped labs for practical experiments in Physics, Chemistry and Biology.</p>
                    </div>
                </article>

                <!-- 4. Library -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="image/10.jpeg" alt="Library" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=600&q=80'">
                        <div class="fac-card__icon"><i class="fas fa-book"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Library &amp; Reading Room</h3>
                        <p class="fac-card__desc">A quiet space with a wide collection of books and reference materials.</p>
                    </div>
                </article>

                <!-- 5. Sports -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="image/2.jpeg" alt="Sports Ground" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=600&q=80'">
                        <div class="fac-card__icon"><i class="fas fa-futbol"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Sports &amp; Playground</h3>
                        <p class="fac-card__desc">Open grounds and equipment that encourage physical fitness and teamwork.</p>
                    </div>
                </article>

                <!-- 6. Clean Drinking Water -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?auto=format&fit=crop&w=600&q=80" alt="Clean Drinking Water" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-tint"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Clean Drinking Water</h3>
                        <p class="fac-card__desc">Safe and purified drinking water available across the campus.</p>
                    </div>
                </article>

                <!-- 7. Safe Learning Environment -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=600&q=80" alt="Safe Learning Environment" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-shield-alt"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Safe Learning Environment</h3>
                        <p class="fac-card__desc">A secure and disciplined campus that prioritises student wellbeing.</p>
                    </div>
                </article>

                <!-- 8. CCTV Security -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=600&q=80" alt="CCTV Security" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-video"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">CCTV Security</h3>
                        <p class="fac-card__desc">Continuous monitoring for enhanced campus safety and peace of mind.</p>
                    </div>
                </article>

                <!-- 9. Clean Washrooms -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=600&q=80" alt="Clean Washrooms" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-restroom"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Clean Washrooms</h3>
                        <p class="fac-card__desc">Hygienic and well-maintained washroom facilities for all students.</p>
                    </div>
                </article>

                <!-- 10. Cultural Activities -->
                <article class="fac-card">
                    <div class="fac-card__image">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=600&q=80" alt="Cultural Activities" loading="lazy">
                        <div class="fac-card__icon"><i class="fas fa-music"></i></div>
                    </div>
                    <div class="fac-card__body">
                        <h3 class="fac-card__title">Cultural &amp; Co-curricular</h3>
                        <p class="fac-card__desc">Opportunities for students to explore arts, music, dance and drama.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ============================================================
         4. FEATURED FACILITY
         ============================================================ -->
    <section class="fac-featured">
        <div class="container">
            <div class="fac-featured__grid">
                <div class="fac-featured__image">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=800&q=80" alt="Featured Smart Classroom" loading="lazy">
                    <div class="fac-featured__badge">Featured</div>
                </div>
                <div class="fac-featured__content">
                    <span class="fac-featured__eyebrow">Smart Learning</span>
                    <h2 class="fac-featured__title">Classrooms Built for the Modern Learner</h2>
                    <p class="fac-featured__desc">
                        Our smart classrooms combine traditional teaching with modern technology, making lessons more visual, interactive and easy to understand. Students engage with content actively, which improves both their understanding and retention.
                    </p>
                    <a href="#contact" class="fac-featured__btn">
                        <i class="fas fa-arrow-right"></i> Discover More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         5. CAMPUS PHOTO GALLERY
         ============================================================ -->
    <section class="fac-gallery">
        <div class="container">
            <div class="fac-grid-section__head">
                <h2 class="fac-grid-section__title">Life on Our Campus</h2>
                <span class="fac-grid-section__divider"></span>
                <p class="fac-grid-section__sub">A glimpse of the spaces where our students learn and grow.</p>
            </div>

            <div class="fac-gallery__grid">
                <div class="fac-gallery__item" data-src="image/1.jpeg" onclick="openLightbox(this)">
                    <img src="image/1.jpeg" alt="Campus View" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=600&q=80'">
                    <div class="fac-gallery__overlay">Campus View</div>
                </div>
                <div class="fac-gallery__item" data-src="image/3.jpeg" onclick="openLightbox(this)">
                    <img src="image/3.jpeg" alt="Computer Lab Session" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1591696205602-2f950c417dad?auto=format&fit=crop&w=600&q=80'">
                    <div class="fac-gallery__overlay">Computer Lab</div>
                </div>
                <div class="fac-gallery__item" data-src="image/4.jpeg" onclick="openLightbox(this)">
                    <img src="image/4.jpeg" alt="Sports Day" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=600&q=80'">
                    <div class="fac-gallery__overlay">Sports Day</div>
                </div>
                <div class="fac-gallery__item" data-src="image/6.jpeg" onclick="openLightbox(this)">
                    <img src="image/6.jpeg" alt="Library Reading Session" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=600&q=80'">
                    <div class="fac-gallery__overlay">Library Session</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="fac-lightbox" id="facLightbox" onclick="closeLightbox(event)">
        <button class="fac-lightbox__close" onclick="closeLightbox(event)" aria-label="Close lightbox"><i class="fas fa-times"></i></button>
        <img class="fac-lightbox__img" id="facLightboxImg" src="" alt="Enlarged view">
    </div>

    <!-- ============================================================
         6. WHY OUR CAMPUS
         ============================================================ -->
    <section class="fac-why">
        <div class="container">
            <div class="fac-grid-section__head">
                <h2 class="fac-grid-section__title">Why Our Campus</h2>
                <span class="fac-grid-section__divider"></span>
                <p class="fac-grid-section__sub">The values that define our learning environment.</p>
            </div>

            <div class="fac-why__grid">
                <div class="fac-why__item">
                    <div class="fac-why__icon"><i class="fas fa-leaf"></i></div>
                    <h3 class="fac-why__title">Clean Surroundings</h3>
                    <p class="fac-why__desc">A tidy and well-maintained campus that promotes health and focus.</p>
                </div>
                <div class="fac-why__item">
                    <div class="fac-why__icon"><i class="fas fa-smile"></i></div>
                    <h3 class="fac-why__title">Student Comfort</h3>
                    <p class="fac-why__desc">Spaces designed so students feel relaxed, respected and supported.</p>
                </div>
                <div class="fac-why__item">
                    <div class="fac-why__icon"><i class="fas fa-hands-helping"></i></div>
                    <h3 class="fac-why__title">Learning Support</h3>
                    <p class="fac-why__desc">Approachable teachers and staff who guide every student personally.</p>
                </div>
                <div class="fac-why__item">
                    <div class="fac-why__icon"><i class="fas fa-lightbulb"></i></div>
                    <h3 class="fac-why__title">Practical Education</h3>
                    <p class="fac-why__desc">Real-world learning experiences that connect theory with life.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         7. CTA SECTION
         ============================================================ -->
    <section class="fac-cta">
        <div class="container">
            <div class="fac-cta__wrap">
                <h2 class="fac-cta__title">Discover Our Learning Environment</h2>
                <p class="fac-cta__desc">
                    We invite you to explore our campus, meet our faculty, and see how B.S.D.L.V. Inter College is shaping brighter futures.
                </p>
                <div class="fac-cta__btns">
                    <a href="#contact" class="fac-cta__btn fac-cta__btn--primary">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                    <a href="#about" class="fac-cta__btn fac-cta__btn--ghost">
                        <i class="fas fa-school"></i> Explore Our School
                    </a>
                </div>
            </div>
        </div>
    </section>

  @include('footer')
    <script>
    (function() {
        'use strict';

        // Lightbox Logic
        window.openLightbox = function(el) {
            var src = el.getAttribute('data-src');
            if (!src) return;
            var lightbox = document.getElementById('facLightbox');
            var img = document.getElementById('facLightboxImg');
            img.src = src;
            lightbox.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        };

        window.closeLightbox = function(e) {
            if (e) {
                // If clicking the image itself, don't close
                if (e.target.tagName === 'IMG' && e.target.id === 'facLightboxImg') return;
                // If clicking close button or backdrop
                if (e.target.tagName !== 'BUTTON' && e.target.id !== 'facLightbox') {
                    // If clicking on the inner icon
                    if (!e.target.closest('.fac-lightbox__close')) return;
                }
            }
            var lightbox = document.getElementById('facLightbox');
            lightbox.classList.remove('is-active');
            document.getElementById('facLightboxImg').src = '';
            document.body.style.overflow = '';
        };

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                var lightbox = document.getElementById('facLightbox');
                if (lightbox.classList.contains('is-active')) {
                    window.closeLightbox();
                }
            }
        });

    })();
    </script>
</body>
</html>