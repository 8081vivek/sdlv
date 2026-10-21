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
        'title' => 'School Gallery | B.S.D.L.V. Inter College',
        'description' => 'View the B.S.D.L.V. Inter College campus gallery from Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh.',
        'breadcrumbs' => 'Gallery',
    ])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables */
        :root {
            --primary: #1a5f7a;
            --secondary: #57cc99;
            --accent: #e63946;
            --light: #f8f9fa;
            --dark: #343a40;
            --gradient-primary: linear-gradient(135deg, #1a5f7a 0%, #57cc99 100%);
            --gradient-secondary: linear-gradient(135deg, #57cc99 0%, #80ed99 100%);
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: #fff;
        }

        h1, h2, h3, h4 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 1rem;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-thumb {
            background-color:blue;
            border-radius:20px;
        }

        /* Header Styles */
        .page-header {
            background: var(--gradient-primary);
            color: white;
            text-align: center;
            padding: 120px 0 60px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
        }

        .page-header .container {
            position: relative;
            z-index: 1;
        }

        .page-header h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .page-header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 40px 0 80px;
        }

        .gallery-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }

        .filter-btn {
            padding: 10px 20px;
            background: white;
            border: 2px solid var(--primary);
            border-radius: 50px;
            color: var(--primary);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 60px;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 250px;
            transition: var(--transition);
            cursor: pointer;
            background: #fff;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
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
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 25px 15px 15px;
            transform: translateY(0);
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-overlay {
            padding-top: 40px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        }

        .gallery-overlay h3 {
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .gallery-overlay p {
            font-size: 0.95rem;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Video Gallery */
        .video-gallery {
            padding: 60px 0;
            background: var(--light);
            border-radius: 20px;
            margin: 40px auto;
        }

        .video-gallery h2 {
            text-align: center;
            margin-bottom: 50px;
            color: var(--primary);
            font-size: 2.5rem;
            position: relative;
            padding-bottom: 15px;
        }

        .video-gallery h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .video-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 250px;
            transition: var(--transition);
            cursor: pointer;
            background: #fff;
        }

        .video-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .video-item:hover .video-thumbnail {
            transform: scale(1.1);
        }

        .video-play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: rgba(230, 57, 70, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            transition: var(--transition);
            border: 4px solid white;
        }

        .video-item:hover .video-play-btn {
            background: var(--accent);
            transform: translate(-50%, -50%) scale(1.1);
            box-shadow: 0 0 30px rgba(230, 57, 70, 0.5);
        }

        .video-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 20px 15px 15px;
        }

        .video-overlay h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .video-overlay p {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: 300;
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            padding: 20px;
        }

        .lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 80%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lightbox-content img {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 10px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.8);
            object-fit: contain;
        }

        .lightbox-caption {
            color: white;
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            max-width: 800px;
            padding: 0 20px;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            background: var(--accent);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            transition: var(--transition);
            border: none;
            z-index: 2001;
        }

        .lightbox-close:hover {
            background: #c1121f;
            transform: rotate(90deg);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.8rem;
            transition: var(--transition);
            border: 2px solid rgba(255, 255, 255, 0.2);
            z-index: 2001;
        }

        .lightbox-nav:hover {
            background: var(--primary);
            transform: translateY(-50%) scale(1.1);
            border-color: var(--primary);
        }

        .lightbox-prev {
            left: 30px;
        }

        .lightbox-next {
            right: 30px;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 999;
            border: none;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(26, 95, 122, 0.3);
        }

        .back-to-top:hover {
            background: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(26, 95, 122, 0.4);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        /* Footer Section */
        .footer {
            background: var(--gradient-primary);
            color: white;
            padding: 60px 0 20px;
            margin-top: 60px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo h3 {
            font-size: 1.8rem;
            color: white;
            margin-bottom: 10px;
        }

        .footer-links h4, .footer-contact h4 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: white;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-links h4::after, .footer-contact h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-contact p {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
            
            .video-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 992px) {
            .page-header h1 {
                font-size: 2.8rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .gallery-item {
                height: 220px;
            }
            
            .video-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 100px 0 50px;
            }
            
            .page-header h1 {
                font-size: 2.3rem;
            }
            
            .page-header p {
                font-size: 1.1rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 15px;
            }
            
            .gallery-item {
                height: 200px;
            }
            
            .video-grid {
                grid-template-columns: 1fr;
            }
            
            .video-item {
                height: 220px;
            }
            
            .gallery-filters {
                gap: 8px;
            }
            
            .filter-btn {
                padding: 8px 16px;
                font-size: 0.85rem;
            }
            
            .lightbox-nav {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
            
            .lightbox-prev {
                left: 15px;
            }
            
            .lightbox-next {
                right: 15px;
            }
            
            .lightbox-close {
                top: 15px;
                right: 20px;
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 576px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery-item {
                height: 250px;
            }
            
            .video-item {
                height: 200px;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            .page-header p {
                font-size: 1rem;
            }
            
            .video-gallery h2 {
                font-size: 2rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-links h4::after, .footer-contact h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .back-to-top {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                bottom: 20px;
                right: 20px;
            }
        }

        /* Animation for fade in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .gallery-item {
            animation: fadeIn 0.5s ease forwards;
        }

        .gallery-item:nth-child(1) { animation-delay: 0.1s; }
        .gallery-item:nth-child(2) { animation-delay: 0.2s; }
        .gallery-item:nth-child(3) { animation-delay: 0.3s; }
        .gallery-item:nth-child(4) { animation-delay: 0.4s; }
        .gallery-item:nth-child(5) { animation-delay: 0.5s; }
        .gallery-item:nth-child(6) { animation-delay: 0.6s; }
        .gallery-item:nth-child(7) { animation-delay: 0.7s; }
        .gallery-item:nth-child(8) { animation-delay: 0.8s; }
        .gallery-item:nth-child(9) { animation-delay: 0.9s; }
        .gallery-item:nth-child(10) { animation-delay: 1s; }
    </style>
</head>
<body>
   @include('header')
    <!-- Photo Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="campus">Campus</button>
                <button class="filter-btn" data-filter="students">Students</button>
                <button class="filter-btn" data-filter="sports">Sports</button>
                <button class="filter-btn" data-filter="cultural">Cultural</button>
            </div>

            <div class="gallery-grid">
                <!-- Event Images -->
                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Annual Day Celebration">
                    <div class="gallery-overlay">
                        <h3>Annual Day 2023</h3>
                        <p>Students performing cultural dance</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1498243691581-b145c3f54a5a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Science Exhibition">
                    <div class="gallery-overlay">
                        <h3>Science Exhibition</h3>
                        <p>Students showcasing innovative projects</p>
                    </div>
                </div>

                <!-- Campus Images -->
                <div class="gallery-item" data-category="campus">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" alt="School Building">
                    <div class="gallery-overlay">
                        <h3>Main Building</h3>
                        <p>Front view of SDLV Inter College</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Library">
                    <div class="gallery-overlay">
                        <h3>Library</h3>
                        <p>Well-stocked library with 5000+ books</p>
                    </div>
                </div>

                <!-- Student Images -->
                <div class="gallery-item" data-category="students">
                    <img src="https://images.unsplash.com/photo-1588072432836-4b1721d6edf6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Classroom Session">
                    <div class="gallery-overlay">
                        <h3>Classroom Learning</h3>
                        <p>Interactive teaching session</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="students">
                    <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Computer Lab">
                    <div class="gallery-overlay">
                        <h3>Computer Lab</h3>
                        <p>Students learning digital skills</p>
                    </div>
                </div>

                <!-- Sports Images -->
                <div class="gallery-item" data-category="sports">
                    <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Sports Day">
                    <div class="gallery-overlay">
                        <h3>Annual Sports Day</h3>
                        <p>Students participating in races</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="sports">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Basketball Match">
                    <div class="gallery-overlay">
                        <h3>Basketball Tournament</h3>
                        <p>Inter-school competition</p>
                    </div>
                </div>

                <!-- Cultural Images -->
                <div class="gallery-item" data-category="cultural">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Dance Performance">
                    <div class="gallery-overlay">
                        <h3>Cultural Festival</h3>
                        <p>Traditional dance performance</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="cultural">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" alt="Music Competition">
                    <div class="gallery-overlay">
                        <h3>Music Competition</h3>
                        <p>Students showcasing musical talents</p>
                    </div>
                </div>

                <!-- More Images -->
                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Award Ceremony">
                    <div class="gallery-overlay">
                        <h3>Award Ceremony</h3>
                        <p>Honoring academic achievers</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Science Lab">
                    <div class="gallery-overlay">
                        <h3>Science Laboratory</h3>
                        <p>Well-equipped for practical learning</p>
                    </div>
                </div>
            </div>
            <br><br>

            <!-- Video Gallery Section -->
            <!-- <div class="video-gallery"> -->
                <h2 class="align-center">Video Gallery</h2>
                <div class="video-grid">
                    <div class="video-item">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Annual Day" class="video-thumbnail">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="video-overlay">
                            <h3>Annual Day 2023</h3>
                            <p>Full event highlights</p>
                        </div>
                    </div>

                    <div class="video-item">
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Sports Day" class="video-thumbnail">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="video-overlay">
                            <h3>Sports Day 2023</h3>
                            <p>Highlights of various competitions</p>
                        </div>
                    </div>

                    <div class="video-item">
                        <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Science Exhibition" class="video-thumbnail">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="video-overlay">
                            <h3>Science Exhibition</h3>
                            <p>Student project demonstrations</p>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <img src="" alt="" id="lightbox-img">
            <div class="lightbox-caption" id="lightbox-caption"></div>
            <button class="lightbox-close" id="lightbox-close">
                <i class="fas fa-times"></i>
            </button>
            <button class="lightbox-nav lightbox-prev" id="lightbox-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="lightbox-nav lightbox-next" id="lightbox-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
@include('Footer')
    
    <script>
        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');
                
                const filterValue = button.getAttribute('data-filter');
                
                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        // Add fade-in animation
                        item.style.animation = 'fadeIn 0.5s ease forwards';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Lightbox functionality
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxCaption = document.getElementById('lightbox-caption');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxNext = document.getElementById('lightbox-next');
        
        let currentImageIndex = 0;
        const images = Array.from(galleryItems).map(item => ({
            src: item.querySelector('img').src,
            title: item.querySelector('.gallery-overlay h3').textContent,
            description: item.querySelector('.gallery-overlay p').textContent
        }));
        
        // Open lightbox when gallery item is clicked
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentImageIndex = index;
                updateLightbox();
                lightbox.classList.add('active');
                // Prevent scrolling when lightbox is open
                document.body.style.overflow = 'hidden';
            });
        });
        
        // Video items click (would normally open video player)
        document.querySelectorAll('.video-item').forEach(item => {
            item.addEventListener('click', () => {
                alert('Video player would open here. In a real implementation, this would play the video.');
            });
        });
        
        // Close lightbox
        lightboxClose.addEventListener('click', () => {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
        
        // Navigate lightbox
        lightboxPrev.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updateLightbox();
        });
        
        lightboxNext.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateLightbox();
        });
        
        // Update lightbox content
        function updateLightbox() {
            const currentImage = images[currentImageIndex];
            lightboxImg.src = currentImage.src;
            lightboxImg.alt = currentImage.title;
            lightboxCaption.textContent = `${currentImage.title} - ${currentImage.description}`;
        }
        
        // Close lightbox when clicking outside the image
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
        
        // Keyboard navigation for lightbox
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('active')) {
                if (e.key === 'Escape') {
                    lightbox.classList.remove('active');
                    document.body.style.overflow = 'auto';
                } else if (e.key === 'ArrowLeft') {
                    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                    updateLightbox();
                } else if (e.key === 'ArrowRight') {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    updateLightbox();
                }
            }
        });
        
  
        // Add loading animation for images
        const imagesToLoad = document.querySelectorAll('img');
        imagesToLoad.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = 1;
            });
            // Set initial opacity
            img.style.opacity = 0;
            img.style.transition = 'opacity 0.5s ease';
        });
    </script>
</body>
</html>