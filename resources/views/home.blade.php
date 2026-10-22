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
</html>@section('title', 'B.S.D.L.V. Inter College | School in Madhoganj, Hardoi')
@section('description', 'B.S.D.L.V. Inter College is located in Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh. Established in 2016. Explore the school, facilities and gallery.')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Source+Serif+Pro:wght@400;600&display=swap" rel="stylesheet">
    <style>
       
   

        * { margin: 0; padding: 0; box-sizing: border-box; }

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
            --section-bg: #ffffff;
            --border-color: #e2e8f0;
            --text-muted: #666666;
            --gradient-primary: linear-gradient(135deg, #1a4b8c, #2c6cb0);
            --gradient-accent: linear-gradient(135deg, #f9a826, #ffc55a);
        }

   
        /* ============================================================
   GLOBAL BODY BACKGROUND — fixed campus photo texture
   Light mode: subtle campus photo · Dark mode: soft navy
   ============================================================ */

body {
    /* Base fallback color if image fails */
    background-color: #f7f9fc;

    /* Background image (fixed so it doesn't scroll away) */
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('image/1.jpeg') }}');
    background-size: cover;
    /* Make it a subtle texture, not distracting */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;

    /* Fade the photo so it doesn't overpower content */
    background-blend-mode: soft-light;

    /* Ensure text stays readable */
    min-height: 100vh;
}

/* Optional soft overlay to keep contrast — light mode */
body::before {
    content: '';
    position: fixed;
    inset: 0;
    background: rgba(247, 249, 252, 0.88);   /* light blue veil */
    pointer-events: none;
    z-index: -1;
}


        h1, h2, h3, h4, h5 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--primary);
        }
       
        a { text-decoration: none; color: inherit; transition: var(--transition); }
        ul { list-style: none; }
        img { max-width: 100%; height: auto; }

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
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }
        .btn:hover::before { left: 100%; }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            background: var(--secondary);
        }
        .btn-accent { background: var(--accent); color: #1a1a1a; }
        .btn-accent:hover { background: var(--accent-dark); }

        .section {
            padding: 80px 0;
            position: relative;
            background-color: var(--section-bg);
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
            animation: underlineGrow 1.2s ease-out both;
        }
        @keyframes underlineGrow {
            from { transform: scaleX(0); }
            to   { transform: scaleX(1); }
        }
        .section-title p {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ============================================================
           HERO SLIDER
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
            background: linear-gradient(90deg, transparent, #f9a826, #ffc55a, #f9a826, transparent);
            background-size: 200% 100%;
            opacity: 0.8;
            animation: goldShimmer 4s linear infinite;
        }
        @keyframes goldShimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
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
            text-align: left;
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
            font-family: 'Source Serif Pro', serif;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #f9a826;
            margin-bottom: 1.2rem;
            transition-delay: 0s;
        }
        .slide-eyebrow::before {
            content: '';
            width: 32px; height: 2px;
            background: linear-gradient(90deg, #f9a826, transparent);
        }
        .slide-title {
            font-family: 'Merriweather', serif;
            font-size: clamp(2rem, 4.8vw, 4rem);
            font-weight: 900;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 8px 30px rgba(0, 0, 0, 0.55);
            margin: 0;
            transition-delay: 0.1s;
        }
        .slide.active .slide-title {
            animation: titleGlow 3s ease-in-out infinite alternate;
        }
        @keyframes titleGlow {
            from { text-shadow: 0 8px 30px rgba(0, 0, 0, 0.55); }
            to   { text-shadow: 0 8px 30px rgba(0, 0, 0, 0.55), 0 0 30px rgba(249, 168, 38, 0.25); }
        }
        .slide-desc {
            font-size: clamp(1rem, 1.5vw, 1.3rem);
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
            transition-delay: 0.4s;
        }
        .slide.active .slide-eyebrow,
        .slide.active .slide-title,
        .slide.active .slide-desc,
        .slide.active .slide-cta {
            opacity: 1;
            transform: translateY(0);
        }

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
            background: linear-gradient(145deg, #f9a826, #e8970f);
            color: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 28px -8px rgba(249, 168, 38, 0.6);
        }
        .hero .btn-gold:hover {
            background: linear-gradient(145deg, #ffc55a, #f9a826);
            box-shadow: 0 14px 34px -6px rgba(249, 168, 38, 0.8);
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
            border-color: #f9a826;
            color: #ffc55a;
            transform: translateY(-3px);
        }

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
            font-size: 1.6rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }
        .slider-nav:hover {
            background: rgba(249, 168, 38, 0.9);
            color: #1a1a1a;
            border-color: #f9a826;
        }
        .slider-nav:hover,
        .slider-nav:focus-visible {
            animation: sliderNavGlow 1.2s ease-in-out infinite alternate;
        }
        @keyframes sliderNavGlow {
            from { box-shadow: 0 8px 24px rgba(249, 168, 38, 0.3); }
            to   { box-shadow: 0 8px 32px rgba(249, 168, 38, 0.7), 0 0 24px rgba(249, 168, 38, 0.5); }
        }
        .slider-nav:focus-visible {
            outline: 3px solid #f9a826;
            outline-offset: 3px;
        }
        #prevBtn { left: 24px; }
        #nextBtn { right: 24px; }

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
            background: rgba(10, 20, 40, 0.4);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.35);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }
        .dot:hover {
            background: rgba(249, 168, 38, 0.8);
            transform: scale(1.25);
        }
        .dot.active {
            background: #f9a826;
            width: 28px;
            border-radius: 20px;
            box-shadow: 0 0 18px rgba(249, 168, 38, 0.6);
        }
        .dot:focus-visible {
            outline: 2px solid #f9a826;
            outline-offset: 4px;
        }

        #sliderProgressBar {
            width: 220px;
            max-width: 50vw;
            height: 3px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }
        #sliderProgressBar .progress-fill {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #f9a826, #ffc55a);
            border-radius: 10px;
            transform-origin: left;
            transform: scaleX(0);
        }
        #sliderProgressBar .progress-fill.animate {
            animation: heroProgress 7s linear infinite, progressGlow 2s ease-in-out infinite;
        }
        @keyframes heroProgress {
            0%   { transform: scaleX(0); }
            100% { transform: scaleX(1); }
        }
        @keyframes progressGlow {
            0%, 100% { box-shadow: 0 0 4px rgba(249, 168, 38, 0.4); }
            50%      { box-shadow: 0 0 12px rgba(249, 168, 38, 0.9); }
        }

        /* ============================================================
           QUICK INFO
           ============================================================ */
      /* ============================================================
   COMBINED SHOWCASE — Interlocking Cards (L) + About (R)
   + 2016 watermark BELOW cards + fixed heading
   Scoped under .combined-showcase
   ============================================================ */

/* ---------- Section wrapper ---------- */
.combined-showcase {
    position: relative;
    padding: 100px 0 110px;
    background: var(--section-bg, #ffffff);
    overflow: hidden;
    isolation: isolate;
    transition: background-color 0.3s ease;
}

        

.combined-showcase__container {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 45fr 55fr;
    gap: 60px;
    align-items: center;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ============================================================
   LEFT — Interlocking info cards + 2016 watermark below
   ============================================================ */

.combined-showcase__left {
    position: relative;
    min-height: 560px;
    padding-bottom: 110px;      /* space for 2016 below */
    display: flex;
    align-items: flex-start;
    justify-content: center;
}

.interlock-cards {
    position: relative;
    width: 100%;
    max-width: 480px;
    height: 560px;
    margin: 0 auto;
}

/* Base card style */
.interlock-card {
    position: absolute;
    background: var(--card-bg, #ffffff);
    border-radius: 18px;
    padding: 22px 20px;
    box-shadow:
        0 12px 30px -12px rgba(26, 75, 140, 0.25),
        0 0 0 1px rgba(26, 75, 140, 0.06);
    border: 1px solid rgba(26, 75, 140, 0.08);
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease,
        border-color 0.4s ease;
    width: 58%;
    cursor: default;
}



/* Gold top accent on hover */
.interlock-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 3px;
    border-radius: 18px 18px 0 0;
    background: linear-gradient(90deg, #f9a826, #ffc55a, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}
.interlock-card:hover::before {
    transform: scaleX(1);
}

/* Interlocking positions */
.interlock-card--1 {
    top: 0;
    left: 0;
    z-index: 4;
}

.interlock-card--2 {
    top: 90px;
    right: 0;
    z-index: 3;
    width: 62%;
}

.interlock-card--3 {
    top: 240px;
    left: 12px;
    z-index: 5;
    width: 56%;
}

.interlock-card--4 {
    top: 340px;
    right: 8px;
    z-index: 2;
    width: 60%;
}

/* Hover lift */
.interlock-card:hover {
    transform: translateY(-8px);
    box-shadow:
        0 24px 48px -14px rgba(26, 75, 140, 0.35),
        0 0 0 1px rgba(249, 168, 38, 0.3);
    border-color: rgba(249, 168, 38, 0.35);
    z-index: 10;
}


/* Card icon */
.interlock-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: linear-gradient(135deg, #1a4b8c, #2c6cb0);
    color: #ffffff;
    font-size: 1.05rem;
    margin-bottom: 14px;
    box-shadow: 0 6px 14px -4px rgba(26, 75, 140, 0.4);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.interlock-card:nth-child(2) .interlock-card__icon {
    background: linear-gradient(135deg, #f9a826, #e8970f);
    color: #1a1a1a;
    box-shadow: 0 6px 14px -4px rgba(249, 168, 38, 0.45);
}
.interlock-card:hover .interlock-card__icon {
    transform: rotate(-6deg) scale(1.08);
}

/* Card title */
.interlock-card__title {
    font-family: 'Merriweather', serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--primary, #1a4b8c);
    margin: 0 0 6px;
    line-height: 1.3;
    transition: color 0.3s ease;
}

.interlock-card:hover .interlock-card__title {
    color: var(--accent-dark, #e8970f);
}


/* Card description */
.interlock-card__desc {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.85rem;
    line-height: 1.55;
    color: var(--text-muted, #555);
    margin: 0;
}

/* ---------- 2016 Watermark — BELOW the 4 cards ---------- */
.combined-showcase__year {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    font-family: 'Merriweather', serif;
    font-weight: 900;
    font-size: clamp(120px, 15vw, 200px);
    line-height: 0.85;
    letter-spacing: -0.05em;
    color: var(--primary, #1a4b8c);
    opacity: 0.07;
    user-select: none;
    pointer-events: none;
    z-index: 0;
    white-space: nowrap;
    text-align: center;
}



/* ============================================================
   RIGHT — About Premium embedded
   ============================================================ */

.combined-showcase__right.about-premium {
    position: relative;
    padding: 0;
    background: transparent;
    overflow: visible;
    isolation: auto;
}

.about-premium--embedded {
    position: relative;
}

.about-premium--embedded .about-premium__content {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
    max-width: 100%;
}

/* ---------- Heading — fixed ---------- */
.about-premium--embedded .about-premium__heading {
    font-family: 'Merriweather', serif;
    font-size: clamp(1.75rem, 2.8vw, 2.4rem);
    font-weight: 900;
    line-height: 1.28;
    letter-spacing: -0.015em;
    color: var(--primary, #1a4b8c);
    margin: 0 0 22px;
    padding-bottom: 6px;
    overflow: visible;
    word-wrap: break-word;
    overflow-wrap: break-word;
    hyphens: none;
}

.about-premium--embedded .about-premium__heading-line {
    display: block;
    margin-bottom: 6px;
}
.about-premium--embedded .about-premium__heading-line:last-child {
    margin-bottom: 0;
}

.about-premium--embedded .about-premium__heading-line--accent {
    position: relative;
    display: block;
    padding-bottom: 12px;
}

.about-premium--embedded .about-premium__underline {
    position: relative;
    display: inline-block;
    background: linear-gradient(90deg, #f9a826, #ffc55a);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    padding-bottom: 4px;
}

.about-premium--embedded .about-premium__underline::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 100%;
    height: 5px;
    background: linear-gradient(90deg, #f9a826, #ffc55a, transparent);
    opacity: 0.4;
    border-radius: 3px;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.4s;
}

.about-premium--embedded.is-visible .about-premium__underline::after {
    transform: scaleX(1);
}

/* Eyebrow */
.about-premium--embedded .about-premium__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--accent-dark, #e8970f);
    margin-bottom: 18px;
    padding: 8px 14px;
    background: rgba(249, 168, 38, 0.08);
    border: 1px solid rgba(249, 168, 38, 0.2);
    border-radius: 100px;
}


.about-premium--embedded .about-premium__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--accent, #f9a826);
    box-shadow: 0 0 0 3px rgba(249, 168, 38, 0.2);
    animation: aboutDotPulse 2s ease-in-out infinite;
}
@keyframes aboutDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(249, 168, 38, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(249, 168, 38, 0.05); }
}

/* Lead */
.about-premium--embedded .about-premium__lead {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.98rem, 1.2vw, 1.1rem);
    font-weight: 600;
    line-height: 1.6;
    color: var(--primary, #1a4b8c);
    margin: 0 0 14px;
    padding-left: 16px;
    border-left: 3px solid var(--accent, #f9a826);
}


/* Body */
.about-premium--embedded .about-premium__body {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.94rem;
    line-height: 1.75;
    color: var(--text-muted, #555);
    margin: 0 0 26px;
    max-width: 100%;
}


/* CTA Button */
.about-premium--embedded .about-premium__cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 26px;
    background: linear-gradient(135deg, #1a4b8c, #2c6cb0);
    color: #ffffff;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.88rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    text-decoration: none;
    border-radius: 100px;
    box-shadow:
        0 12px 28px -10px rgba(26, 75, 140, 0.5),
        inset 0 1px 0 rgba(255, 255, 255, 0.15);
    transition:
        transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.35s ease,
        background 0.35s ease;
    position: relative;
    overflow: hidden;
}
.about-premium--embedded .about-premium__cta::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.7s ease;
}
.about-premium--embedded .about-premium__cta:hover::before {
    left: 100%;
}
.about-premium--embedded .about-premium__cta:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #2c6cb0, #1a4b8c);
    box-shadow:
        0 18px 38px -10px rgba(26, 75, 140, 0.6),
        0 0 0 3px rgba(249, 168, 38, 0.25);
}
.about-premium--embedded .about-premium__cta:focus-visible {
    outline: 3px solid var(--accent, #f9a826);
    outline-offset: 4px;
}
.about-premium--embedded .about-premium__cta i {
    font-size: 0.8rem;
    transition: transform 0.35s ease;
}
.about-premium--embedded .about-premium__cta:hover i {
    transform: translateX(5px);
}

/* Visual / image */
.about-premium--embedded .about-premium__visual {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 8px;
}

.about-premium--embedded .about-premium__image-wrap {
    position: relative;
    width: 100%;
    max-width: 100%;
    aspect-ratio: 16 / 10;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:
        0 24px 60px -20px rgba(26, 75, 140, 0.4),
        0 0 0 1px rgba(249, 168, 38, 0.25),
        0 0 0 6px rgba(249, 168, 38, 0.06);
    transition: box-shadow 0.5s ease;
    background: linear-gradient(135deg, #1a4b8c, #0a1e3a);
}

.about-premium--embedded .about-premium__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transform: scale(1.05);
    transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
}
.about-premium--embedded.is-visible .about-premium__image {
    transform: scale(1);
}
.about-premium--embedded .about-premium__image-wrap:hover .about-premium__image {
    transform: scale(1.06);
}

/* Image fallback */
.about-premium--embedded .about-premium__image-fallback {
    display: none;
    position: absolute;
    inset: 0;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
    color: rgba(255, 255, 255, 0.4);
    font-family: 'Source Serif Pro', serif;
    font-size: 0.8rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}
.about-premium--embedded .about-premium__image-fallback i {
    font-size: 2rem;
    opacity: 0.6;
}

/* Floating badge */
.about-premium--embedded .about-premium__badge {
    position: absolute;
    bottom: 18px;
    left: 18px;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: var(--card-bg, #ffffff);
    border-radius: 12px;
    box-shadow:
        0 18px 40px -12px rgba(26, 75, 140, 0.4),
        0 0 0 1px rgba(249, 168, 38, 0.2);
    animation: aboutBadgeFloat 6s ease-in-out infinite;
    z-index: 3;
}

@keyframes aboutBadgeFloat {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-8px); }
}
.about-premium--embedded .about-premium__badge-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f9a826, #e8970f);
    color: #ffffff;
    font-size: 1rem;
    box-shadow: 0 4px 12px rgba(249, 168, 38, 0.4);
    flex-shrink: 0;
}
.about-premium--embedded .about-premium__badge-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}
.about-premium--embedded .about-premium__badge-text strong {
    font-family: 'Merriweather', serif;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--primary, #1a4b8c);
}

.about-premium--embedded .about-premium__badge-text em {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-style: normal;
    color: var(--accent-dark, #e8970f);
    font-weight: 600;
    letter-spacing: 0.04em;
}


/* Decorative background circles inside right column */
.about-premium--embedded .about-premium__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}
.about-premium--embedded .about-premium__circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(249, 168, 38, 0.15);
}
.about-premium--embedded .about-premium__circle--1 {
    width: 240px;
    height: 240px;
    top: -80px;
    left: -60px;
    background: radial-gradient(circle, rgba(249, 168, 38, 0.04), transparent 70%);
}
.about-premium--embedded .about-premium__circle--2 {
    width: 160px;
    height: 160px;
    bottom: -40px;
    right: 10%;
    background: radial-gradient(circle, rgba(26, 75, 140, 0.04), transparent 70%);
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1199px) {
    .combined-showcase__container {
        gap: 40px;
        grid-template-columns: 1fr 1fr;
    }
    .interlock-cards { height: 520px; }
    .interlock-card { padding: 20px 18px; }
}

/* Tablet — stack but keep design */
@media (max-width: 991px) {
    .combined-showcase {
        padding: 80px 0 90px;
    }
    .combined-showcase__container {
        grid-template-columns: 1fr;
        gap: 60px;
    }
    .combined-showcase__left {
        min-height: auto;
        padding: 20px 0 110px;
    }
    .interlock-cards {
        max-width: 520px;
        height: 540px;
        margin: 0 auto;
    }
    .about-premium--embedded .about-premium__content {
        max-width: 640px;
        margin: 0 auto;
    }
    .combined-showcase__year {
        font-size: 160px;
    }
}

/* Mobile — 2-column grid, no overlaps */
@media (max-width: 640px) {
    .combined-showcase {
        padding: 60px 0 70px;
    }
    .combined-showcase__left {
        padding: 0 0 90px;
        min-height: auto;
    }
    .interlock-cards {
        position: relative;
        height: auto;
        max-width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }
    .interlock-card {
        position: relative !important;
        top: auto !important;
        left: auto !important;
        right: auto !important;
        bottom: auto !important;
        width: 100% !important;
        z-index: 1 !important;
        padding: 18px 16px;
    }
    .interlock-card:hover {
        transform: translateY(-4px);
    }
    .interlock-card__icon {
        width: 38px;
        height: 38px;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    .interlock-card__title {
        font-size: 0.92rem;
    }
    .interlock-card__desc {
        font-size: 0.78rem;
    }

    .combined-showcase__year {
        font-size: 110px;
        bottom: 0;
    }

    .about-premium--embedded .about-premium__heading {
        font-size: 1.5rem;
        line-height: 1.32;
        margin-bottom: 18px;
    }
    .about-premium--embedded .about-premium__heading-line--accent {
        padding-bottom: 10px;
    }
    .about-premium--embedded .about-premium__image-wrap {
        aspect-ratio: 4 / 3;
    }
    .about-premium--embedded .about-premium__badge {
        left: 50%;
        transform: translateX(-50%);
        bottom: -16px;
        animation: none;
        padding: 10px 14px;
    }
    .about-premium--embedded .about-premium__badge-icon {
        width: 34px;
        height: 34px;
        font-size: 0.85rem;
    }
    .about-premium--embedded .about-premium__badge-text strong {
        font-size: 0.78rem;
    }
    .about-premium--embedded .about-premium__badge-text em {
        font-size: 0.65rem;
    }
}

@media (max-width: 480px) {
    .interlock-cards {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    .interlock-card {
        padding: 16px 14px;
    }
    .interlock-card__title {
        font-size: 0.85rem;
    }
    .interlock-card__desc {
        font-size: 0.72rem;
    }
    .combined-showcase__year {
        font-size: 80px;
    }
    .about-premium--embedded .about-premium__heading {
        font-size: 1.35rem;
    }
}

@media (max-width: 380px) {
    .interlock-cards {
        grid-template-columns: 1fr;
    }
    .combined-showcase__year {
        font-size: 70px;
    }
    .about-premium--embedded .about-premium__heading {
        font-size: 1.25rem;
        line-height: 1.35;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .combined-showcase *,
    .combined-showcase *::before,
    .combined-showcase *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .about-premium--embedded .about-premium__badge {
        animation: none !important;
    }
    .about-premium--embedded .about-premium__underline::after {
        transform: scaleX(1);
    }
    .about-premium--embedded .about-premium__image {
        transform: scale(1) !important;
    }
}
        /* ============================================================
           QUICK ACCESS
           ============================================================ */
      /* ============================================================
   QUICK ACCESS — Premium Editorial Dashboard
   Scoped under .quick-access — safe, no conflicts
   ============================================================ */

.quick-access {
    position: relative;
    padding: 100px 0 110px;
    background: var(--section-bg, #ffffff);
    overflow: hidden;
    isolation: isolate;
    transition: background-color 0.3s ease;
}


/* Decorative background */
.quick-access__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}
.quick-access__circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.12);
}
.quick-access__circle--1 {
    width: 420px;
    height: 420px;
    top: -160px;
    right: -120px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.05), transparent 70%);
    animation: qaFloat 16s ease-in-out infinite;
}
.quick-access__circle--2 {
    width: 260px;
    height: 260px;
    bottom: -90px;
    left: -80px;
    background: radial-gradient(circle, rgba(13, 27, 42, 0.04), transparent 70%);
    animation: qaFloat 20s ease-in-out infinite reverse;
}
@keyframes qaFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50%      { transform: translate(16px, -16px) scale(1.04); }
}

.quick-access__line {
    position: absolute;
    left: 50%;
    top: 90px;
    width: 1px;
    height: 40px;
    background: linear-gradient(180deg, transparent, rgba(214, 173, 82, 0.4), transparent);
}
/* ============================================================
   FEATURED CARD — Student Photo
   ============================================================ */

/* Photo container inside featured card */
.qa-card__photo {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 10;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 18px;
    box-shadow: 
        0 12px 28px -8px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(214, 173, 82, 0.4);
    z-index: 2;
    flex-shrink: 0;
    background: linear-gradient(135deg, #1a3a5c, #0a1420);
}

.qa-card__photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
}

.qa-card--featured:hover .qa-card__photo img {
    transform: scale(1.05);
}

/* Dark blue gradient overlay for text readability */
.qa-card__photo-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        transparent 40%,
        rgba(13, 27, 42, 0.5) 80%,
        rgba(13, 27, 42, 0.8) 100%
    );
    pointer-events: none;
    z-index: 1;
}

/* Photo badge (Student Portal label) */
.qa-card__photo-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: rgba(214, 173, 82, 0.95);
    color: #0D1B2A;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    border-radius: 100px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 2;
    backdrop-filter: blur(6px);
}

.qa-card__photo-badge i {
    font-size: 0.72rem;
}

/* ============================================================
   FEATURED CARD — body spacing adjustment
   ============================================================ */
.qa-card--featured {
    padding: 22px 22px 22px;
}

.qa-card--featured .qa-card__body {
    gap: 8px;
    padding: 0 4px 4px;
}

.qa-card--featured .qa-card__title {
    font-size: 1.35rem;
    margin-bottom: 2px;
}

.qa-card--featured .qa-card__desc {
    font-size: 0.88rem;
    line-height: 1.5;
    margin-bottom: 8px;
}

.qa-card--featured .qa-card__cta {
    padding-top: 8px;
    font-size: 0.88rem;
}

/* ============================================================
   Regular cards — slightly bigger icons for balance
   ============================================================ */
.qa-card__icon {
    width: 54px;
    height: 54px;
    font-size: 1.4rem;
    border-radius: 15px;
}

/* ============================================================
   Featured card hover — subtle photo lift
   ============================================================ */
.qa-card--featured:hover .qa-card__photo {
    box-shadow: 
        0 18px 36px -10px rgba(0, 0, 0, 0.6),
        0 0 0 1px rgba(214, 173, 82, 0.6),
        0 0 0 4px rgba(214, 173, 82, 0.1);
    transition: box-shadow 0.4s ease;
}

/* ============================================================
   RESPONSIVE — mobile pe photo chhoti
   ============================================================ */
@media (max-width: 991px) {
    .qa-card__photo {
        aspect-ratio: 16 / 9;
    }
    .qa-card--featured .qa-card__title {
        font-size: 1.25rem;
    }
}

@media (max-width: 575px) {
    .qa-card__photo {
        aspect-ratio: 4 / 3;
        margin-bottom: 14px;
        border-radius: 10px;
    }
    .qa-card__photo-badge {
        top: 8px;
        left: 8px;
        padding: 4px 10px;
        font-size: 0.62rem;
    }
    .qa-card--featured {
        padding: 18px;
    }
    .qa-card--featured .qa-card__title {
        font-size: 1.15rem;
    }
    .qa-card--featured .qa-card__desc {
        font-size: 0.82rem;
    }
    .qa-card__icon {
        width: 46px;
        height: 46px;
        font-size: 1.2rem;
    }
}

/* ============================================================
   REDUCED MOTION — photo hover disable
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .qa-card__photo img,
    .qa-card--featured:hover .qa-card__photo img {
        transition: none !important;
        transform: none !important;
    }
}

/* ============================================================
   Section header
   ============================================================ */
.quick-access__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 720px;
    margin: 0 auto 60px;
}

.quick-access__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    margin-bottom: 20px;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
}

.quick-access__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: qaDot 2s ease-in-out infinite;
}
@keyframes qaDot {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.quick-access__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.8vw, 2.9rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: var(--primary, #0D1B2A);
    margin: 0 0 18px;
}

.quick-access__title-accent {
    background: linear-gradient(90deg, #D6AD52, #f0d78c, #D6AD52);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: qaShine 5s linear infinite;
}
@keyframes qaShine {
    to { background-position: 200% center; }
}

.quick-access__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: var(--text-muted, #555);
    max-width: 560px;
    margin: 0 auto 24px;
}


.quick-access__underline {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.2s;
}
.quick-access.is-visible .quick-access__underline {
    transform: scaleX(1);
}

/* ============================================================
   Cards grid — asymmetric editorial
   ============================================================ */
.quick-access__grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 1fr;
    gap: 22px;
    max-width: 1200px;
    margin: 0 auto;
}
/* Quick Access — subtle background photo */
.quick-access__bg::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('image/1.jpeg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.05;
    filter: grayscale(40%);
    pointer-events: none;
    z-index: 0;
}


.qa-card--featured {
    grid-column: span 2;
    grid-row: span 2;
}

/* ============================================================
   Card base
   ============================================================ */
.qa-card {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 28px 24px 24px;
    background: var(--card-bg, #ffffff);
    border: 1px solid rgba(13, 27, 42, 0.08);
    border-radius: 18px;
    text-decoration: none;
    color: var(--dark, #2d3748);
    overflow: hidden;
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease,
        border-color 0.4s ease;
    will-change: transform;
    isolation: isolate;
    min-height: 200px;
}



.qa-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 3px;
    background: linear-gradient(90deg, #D6AD52, #f0d78c, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 3;
}
.qa-card:hover::before,
.qa-card:focus-visible::before {
    transform: scaleX(1);
}

.qa-card:hover,
.qa-card:focus-visible {
    transform: translateY(-6px);
    box-shadow:
        0 22px 44px -18px rgba(13, 27, 42, 0.25),
        0 0 0 1px rgba(214, 173, 82, 0.3);
    border-color: rgba(214, 173, 82, 0.35);
    outline: none;
}
.qa-card:focus-visible {
    box-shadow:
        0 0 0 3px rgba(214, 173, 82, 0.4),
        0 22px 44px -18px rgba(13, 27, 42, 0.25);
}


/* ============================================================
   Icon treatment (regular cards)
   ============================================================ */
.qa-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 52px;
    height: 52px;
    border-radius: 14px;
    font-size: 1.35rem;
    color: #ffffff;
    flex-shrink: 0;
    transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease;
    box-shadow: 0 8px 18px -8px rgba(0, 0, 0, 0.3);
}

.qa-card:hover .qa-card__icon,
.qa-card:focus-visible .qa-card__icon {
    transform: rotate(-6deg) scale(1.08);
}

.qa-card__icon--gold {
    background: linear-gradient(135deg, #f0d78c, #D6AD52);
    color: #0D1B2A;
    box-shadow: 0 8px 18px -8px rgba(214, 173, 82, 0.45);
}
.qa-card__icon--telegram {
    background: linear-gradient(135deg, #229ED9, #1a86bd);
}
.qa-card__icon--whatsapp {
    background: linear-gradient(135deg, #25D366, #128C7E);
}
.qa-card__icon--contact {
    background: linear-gradient(135deg, #0D1B2A, #1a3a5c);
}

/* ============================================================
   Featured card — Student Login with emblem
   ============================================================ */
.qa-card--featured {
    background: linear-gradient(145deg, #0D1B2A 0%, #16324f 55%, #0D1B2A 100%);
    border-color: rgba(214, 173, 82, 0.25);
    color: #ffffff;
    padding: 32px 28px 28px;
    justify-content: flex-start;
}

.qa-card--featured:hover,
.qa-card--featured:focus-visible {
    transform: translateY(-6px);
    box-shadow:
        0 28px 60px -20px rgba(13, 27, 42, 0.65),
        0 0 0 1px rgba(214, 173, 82, 0.5);
    border-color: rgba(214, 173, 82, 0.55);
}
.qa-card--featured .qa-card__glow {
    position: absolute;
    top: -40%;
    right: -30%;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.22), transparent 65%);
    pointer-events: none;
    z-index: 0;
    animation: qaGlow 8s ease-in-out infinite;
}
@keyframes qaGlow {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50%      { transform: scale(1.15); opacity: 1; }
}
.qa-card--featured > * {
    position: relative;
    z-index: 1;
}

/* Emblem (logo-style visual for Student Login) */
.qa-card__emblem {
    position: relative;
    width: 92px;
    height: 92px;
    margin-bottom: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.qa-card__emblem-ring {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: conic-gradient(from 0deg, transparent 0deg, #D6AD52 90deg, #f0d78c 180deg, #D6AD52 270deg, transparent 360deg);
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor;
            mask-composite: exclude;
    padding: 2px;
    animation: qaSpin 6s linear infinite;
    opacity: 0.85;
}
@keyframes qaSpin {
    to { transform: rotate(360deg); }
}
.qa-card__emblem-inner {
    position: absolute;
    inset: 8px;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, #1a3a5c, #0a1420);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #D6AD52;
    font-size: 2rem;
    box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, 0.1),
        0 8px 24px -8px rgba(214, 173, 82, 0.5);
}
.qa-card--featured:hover .qa-card__emblem-inner {
    color: #f0d78c;
}

/* Featured card body */
.qa-card--featured .qa-card__title {
    color: #ffffff;
    font-size: 1.35rem;
}
.qa-card--featured .qa-card__desc {
    color: rgba(255, 255, 255, 0.75);
    font-size: 0.9rem;
}
.qa-card--featured .qa-card__tag {
    color: #f0d78c;
}
.qa-card--featured .qa-card__cta {
    color: #D6AD52;
    padding-top: 20px;
}
.qa-card--featured:hover .qa-card__cta,
.qa-card--featured:focus-visible .qa-card__cta {
    color: #f0d78c;
}

/* ============================================================
   Card body (shared)
   ============================================================ */
.qa-card__body {
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex: 1;
    min-width: 0;
}
.qa-card__tag {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: #D6AD52;
    margin-bottom: 2px;
}
.qa-card__title {
    font-family: 'Merriweather', serif;
    font-size: 1.1rem;
    font-weight: 700;
    line-height: 1.3;
    color: var(--primary, #0D1B2A);
    margin: 0;
    transition: color 0.3s ease;
}

.qa-card:hover .qa-card__title,
.qa-card:focus-visible .qa-card__title {
    color: #b8912f;
}

.qa-card__desc {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.85rem;
    line-height: 1.55;
    color: var(--text-muted, #666);
    margin: 0;
}

.qa-card__cta {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: auto;
    padding-top: 14px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    color: #0D1B2A;
    transition: color 0.3s ease, gap 0.3s ease;
}

.qa-card__cta i {
    font-size: 0.72rem;
    transition: transform 0.35s ease;
}
.qa-card:hover .qa-card__cta,
.qa-card:focus-visible .qa-card__cta {
    color: #b8912f;
    gap: 12px;
}

.qa-card:hover .qa-card__cta i,
.qa-card:focus-visible .qa-card__cta i {
    transform: translateX(4px);
}

/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 991px) {
    .quick-access {
        padding: 80px 0 90px;
    }
    .quick-access__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }
    .qa-card--featured {
        grid-column: span 2;
        grid-row: auto;
    }
}
@media (max-width: 575px) {
    .quick-access {
        padding: 60px 0 70px;
    }
    .quick-access__grid {
        grid-template-columns: 1fr;
        gap: 14px;
    }
    .qa-card--featured {
        grid-column: span 1;
    }
    .qa-card {
        padding: 22px 20px 20px;
        min-height: auto;
    }
    .qa-card--featured {
        padding: 26px 22px 22px;
    }
    .qa-card__emblem {
        width: 76px;
        height: 76px;
    }
    .qa-card__emblem-inner {
        font-size: 1.6rem;
    }
    .qa-card__icon {
        width: 46px;
        height: 46px;
        font-size: 1.2rem;
    }
    .qa-card__title {
        font-size: 1.02rem;
    }
    .qa-card--featured .qa-card__title {
        font-size: 1.2rem;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    .quick-access *,
    .quick-access *::before,
    .quick-access *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .qa-card:hover,
    .qa-card:focus-visible {
        transform: none;
    }
    .qa-card__emblem-ring {
        animation: none;
    }
    .quick-access__underline {
        transform: scaleX(1);
    }
}  /* ============================================================
           ABOUT
           ============================================================ */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        .about-text h2 { margin-bottom: 20px; }
        .about-text p { margin-bottom: 20px; font-size: 1.05rem; }
        .about-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }
        .about-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: var(--transition);
        }
        .about-image:hover img { transform: scale(1.05); }

        /* ============================================================
           PRINCIPAL / MANAGER MESSAGES
           ============================================================ */
/* ============================================================
   PRINCIPAL'S MESSAGE — Premium Editorial Section
   Scoped under .principal-message — no conflicts
   ============================================================ */

.principal-message {
    position: relative;
    padding: 100px 0 110px;
    background: #f7f9fc;
    overflow: hidden;
    isolation: isolate;
}


/* ---- Background decorations ---- */
.principal-message__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.principal-message__circle {
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.12);
    top: -140px;
    left: -120px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.05), transparent 70%);
    animation: principalCircleFloat 16s ease-in-out infinite;
}

@keyframes principalCircleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50%      { transform: translate(16px, -16px) scale(1.04); }
}

.principal-message__quote-bg {
    position: absolute;
    bottom: -120px;
    right: -40px;
    font-family: 'Merriweather', serif;
    font-size: 500px;
    font-weight: 900;
    line-height: 1;
    color: #0D1B2A;
    opacity: 0.03;
    pointer-events: none;
    user-select: none;
}



/* ---- Header ---- */
.principal-message__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 680px;
    margin: 0 auto 60px;
}

.principal-message__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 20px;
}



.principal-message__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: principalDotPulse 2s ease-in-out infinite;
}

@keyframes principalDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.principal-message__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.6vw, 2.8rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D1B2A;
    margin: 0 0 18px;
}


.principal-message__divider {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto 18px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
}

.principal-message.is-visible .principal-message__divider {
    transform: scaleX(1);
}

.principal-message__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    margin: 0 auto;
    max-width: 560px;
}



/* ---- Layout ---- */
.principal-message__layout {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 0.9fr 1.1fr;
    gap: 70px;
    align-items: center;
}

/* ============================================================
   LEFT — Portrait
   ============================================================ */
.principal-portrait {
    position: relative;
    max-width: 420px;
    margin: 0 auto;
    width: 100%;
}

/* Decorative offset outline */
.principal-portrait__decor {
    position: absolute;
    inset: 20px -20px -20px 20px;
    border: 2px solid #D6AD52;
    border-radius: 20px;
    z-index: 0;
    opacity: 0.35;
    transition: inset 0.5s ease, opacity 0.5s ease;
}

.principal-portrait:hover .principal-portrait__decor {
    inset: 14px -14px -14px 14px;
    opacity: 0.55;
}

/* Big quote mark beside portrait */
.principal-portrait__quote-mark {
    position: absolute;
    top: -30px;
    left: -30px;
    font-family: 'Merriweather', serif;
    font-size: 120px;
    font-weight: 900;
    line-height: 1;
    color: #D6AD52;
    opacity: 0.18;
    z-index: 2;
    pointer-events: none;
}

/* Frame */
.principal-portrait__frame {
    position: relative;
    z-index: 1;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:
        0 24px 60px -20px rgba(13, 27, 42, 0.4),
        0 0 0 1px rgba(214, 173, 82, 0.3);
    background: linear-gradient(135deg, #1a3a5c, #0a1420);
    aspect-ratio: 4 / 5;
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.principal-portrait:hover .principal-portrait__frame {
    transform: translateY(-6px);
}

.principal-portrait__frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.principal-portrait:hover .principal-portrait__frame img {
    transform: scale(1.06);
}

/* Image fallback */
.principal-portrait__fallback {
    display: none;
    position: absolute;
    inset: 0;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
    color: rgba(255, 255, 255, 0.5);
    font-family: 'Source Serif Pro', serif;
    font-size: 0.9rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.principal-portrait__fallback i {
    font-size: 3rem;
    opacity: 0.7;
}

/* Nameplate */
.principal-portrait__nameplate {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px 22px 20px;
    background: linear-gradient(180deg, transparent, rgba(13, 27, 42, 0.92) 60%);
    color: #ffffff;
    z-index: 2;
}

.principal-portrait__name {
    font-family: 'Merriweather', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 4px;
    line-height: 1.2;
    letter-spacing: -0.01em;
}

.principal-portrait__role {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.04em;
    color: rgba(255, 255, 255, 0.78);
    margin: 0;
}

/* ============================================================
   RIGHT — Message
   ============================================================ */
.principal-message__content {
    position: relative;
    max-width: 640px;
}

/* Oversized quote mark decorative */
.principal-message__quote-icon {
    position: absolute;
    top: -50px;
    left: -20px;
    font-family: 'Merriweather', serif;
    font-size: 140px;
    font-weight: 900;
    line-height: 1;
    color: #D6AD52;
    opacity: 0.15;
    z-index: 0;
    pointer-events: none;
    user-select: none;
}

/* Small label */
.principal-message__label {
    display: inline-block;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: #b8912f;
    margin-bottom: 12px;
    position: relative;
    z-index: 1;
}


.principal-message__greeting {
    font-family: 'Merriweather', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #0D1B2A;
    margin: 0 0 24px;
    line-height: 1.35;
    position: relative;
    z-index: 1;
    letter-spacing: -0.01em;
}



/* Body paragraphs */
.principal-message__body {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 32px;
}

.principal-message__body p {
    font-family: 'Source Serif Pro', serif;
    font-size: 1rem;
    line-height: 1.8;
    color: #4a5568;
    margin: 0;
    max-width: 100%;
}



/* Signature */
.principal-message__signature {
    display: flex;
    align-items: center;
    gap: 20px;
    padding-top: 24px;
    margin-bottom: 24px;
    position: relative;
    z-index: 1;
}

.principal-message__signature-line {
    display: block;
    width: 50px;
    height: 2px;
    background: #D6AD52;
    flex-shrink: 0;
}

.principal-message__signature-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.principal-message__signature-text strong {
    font-family: 'Merriweather', serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: #0D1B2A;
    line-height: 1.2;
}


.principal-message__signature-text em {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.82rem;
    font-style: normal;
    color: #b8912f;
    letter-spacing: 0.02em;
}


/* Small badge */
.principal-message__badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 18px;
    background: rgba(214, 173, 82, 0.1);
    border: 1px solid rgba(214, 173, 82, 0.3);
    border-radius: 100px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 0.04em;
    color: #b8912f;
    position: relative;
    z-index: 1;
}



.principal-message__badge i {
    font-size: 0.9rem;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 991px) {
    .principal-message {
        padding: 80px 0 90px;
    }
    .principal-message__layout {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    .principal-portrait {
        max-width: 360px;
    }
    .principal-message__content {
        max-width: 100%;
    }
    .principal-message__quote-icon {
        font-size: 100px;
        top: -35px;
        left: -10px;
    }
}

@media (max-width: 640px) {
    .principal-message {
        padding: 60px 0 70px;
    }
    .principal-message__head {
        margin-bottom: 44px;
    }
    .principal-message__layout {
        gap: 40px;
    }
    .principal-portrait {
        max-width: 280px;
    }
    .principal-portrait__decor {
        inset: 14px -14px -14px 14px;
    }
    .principal-portrait__quote-mark {
        font-size: 90px;
        top: -20px;
        left: -20px;
    }
    .principal-portrait__nameplate {
        padding: 20px 18px 16px;
    }
    .principal-portrait__name {
        font-size: 1.15rem;
    }
    .principal-portrait__role {
        font-size: 0.72rem;
    }
    .principal-message__greeting {
        font-size: 1.15rem;
    }
    .principal-message__body p {
        font-size: 0.94rem;
        line-height: 1.7;
    }
    .principal-message__signature {
        gap: 14px;
    }
    .principal-message__signature-line {
        width: 36px;
    }
    .principal-message__signature-text strong {
        font-size: 0.95rem;
    }
    .principal-message__quote-icon {
        font-size: 80px;
        top: -25px;
    }
    .principal-message__badge {
        font-size: 0.72rem;
        padding: 8px 14px;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .principal-message *,
    .principal-message *::before,
    .principal-message *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .principal-message__divider {
        transform: scaleX(1);
    }
    .principal-portrait:hover .principal-portrait__frame {
        transform: none;
    }
    .principal-portrait:hover .principal-portrait__frame img {
        transform: none;
    }
}        
/* ============================================================
   MANAGER'S MESSAGE — Premium Editorial Section
   Scoped under .manager-message — no conflicts
   ============================================================ */

.manager-message {
    position: relative;
    padding: 100px 0 110px;
    background: #f7f9fc;
    overflow: hidden;
    isolation: isolate;
}


/* ---- Background decorations ---- */
.manager-message__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.manager-message__circle {
    position: absolute;
    width: 400px;
    height: 400px;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.12);
    top: -140px;
    right: -120px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.05), transparent 70%);
    animation: managerCircleFloat 16s ease-in-out infinite;
}

@keyframes managerCircleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50%      { transform: translate(-16px, -16px) scale(1.04); }
}

.manager-message__quote-bg {
    position: absolute;
    bottom: -120px;
    left: -40px;
    font-family: 'Merriweather', serif;
    font-size: 500px;
    font-weight: 900;
    line-height: 1;
    color: #0D1B2A;
    opacity: 0.03;
    pointer-events: none;
    user-select: none;
}



/* ---- Header ---- */
.manager-message__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 680px;
    margin: 0 auto 60px;
}

.manager-message__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 20px;
}


.manager-message__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: managerDotPulse 2s ease-in-out infinite;
}

@keyframes managerDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.manager-message__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.6vw, 2.8rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D1B2A;
    margin: 0 0 18px;
}


.manager-message__divider {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto 18px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
}

.manager-message.is-visible .manager-message__divider {
    transform: scaleX(1);
}

.manager-message__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    margin: 0 auto;
    max-width: 560px;
}



/* ---- Layout ---- */
.manager-message__layout {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 70px;
    align-items: center;
}

/* ============================================================
   LEFT — Message
   ============================================================ */
.manager-message__content {
    position: relative;
    max-width: 640px;
}

/* Oversized quote mark */
.manager-message__quote-icon {
    position: absolute;
    top: -50px;
    left: -20px;
    font-family: 'Merriweather', serif;
    font-size: 140px;
    font-weight: 900;
    line-height: 1;
    color: #D6AD52;
    opacity: 0.15;
    z-index: 0;
    pointer-events: none;
    user-select: none;
}

.manager-message__greeting {
    font-family: 'Merriweather', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #0D1B2A;
    margin: 0 0 24px;
    line-height: 1.35;
    position: relative;
    z-index: 1;
    letter-spacing: -0.01em;
}



.manager-message__body {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 32px;
}

.manager-message__body p {
    font-family: 'Source Serif Pro', serif;
    font-size: 1rem;
    line-height: 1.8;
    color: #4a5568;
    margin: 0;
    max-width: 100%;
}


/* Signature */
.manager-message__signature {
    display: flex;
    align-items: center;
    gap: 20px;
    padding-top: 24px;
    position: relative;
    z-index: 1;
}

.manager-message__signature-line {
    display: block;
    width: 50px;
    height: 2px;
    background: #D6AD52;
    flex-shrink: 0;
}

.manager-message__signature-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.manager-message__signature-text strong {
    font-family: 'Merriweather', serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: #0D1B2A;
    line-height: 1.2;
}



.manager-message__signature-text em {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.82rem;
    font-style: normal;
    color: #b8912f;
    letter-spacing: 0.02em;
}


/* ============================================================
   RIGHT — Portrait
   ============================================================ */
.manager-portrait {
    position: relative;
    max-width: 420px;
    margin: 0 auto;
    width: 100%;
}

/* Decorative offset outline */
.manager-portrait__decor {
    position: absolute;
    inset: 20px -20px -20px 20px;
    border: 2px solid #D6AD52;
    border-radius: 20px;
    z-index: 0;
    opacity: 0.35;
    transition: inset 0.5s ease, opacity 0.5s ease;
}

.manager-portrait:hover .manager-portrait__decor {
    inset: 14px -14px -14px 14px;
    opacity: 0.55;
}

/* Big quote mark beside portrait */
.manager-portrait__quote-mark {
    position: absolute;
    top: -30px;
    right: -30px;
    font-family: 'Merriweather', serif;
    font-size: 120px;
    font-weight: 900;
    line-height: 1;
    color: #D6AD52;
    opacity: 0.18;
    z-index: 2;
    pointer-events: none;
}

/* Frame */
.manager-portrait__frame {
    position: relative;
    z-index: 1;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:
        0 24px 60px -20px rgba(13, 27, 42, 0.4),
        0 0 0 1px rgba(214, 173, 82, 0.3);
    background: linear-gradient(135deg, #1a3a5c, #0a1420);
    aspect-ratio: 4 / 5;
    transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.manager-portrait:hover .manager-portrait__frame {
    transform: translateY(-6px);
}

.manager-portrait__frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    display: block;
    transition: transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.manager-portrait:hover .manager-portrait__frame img {
    transform: scale(1.06);
}

/* Image fallback */
.manager-portrait__fallback {
    display: none;
    position: absolute;
    inset: 0;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 10px;
    color: rgba(255, 255, 255, 0.5);
    font-family: 'Source Serif Pro', serif;
    font-size: 0.9rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.manager-portrait__fallback i {
    font-size: 3rem;
    opacity: 0.7;
}

/* Nameplate */
.manager-portrait__nameplate {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 24px 22px 20px;
    background: linear-gradient(180deg, transparent, rgba(13, 27, 42, 0.92) 60%);
    color: #ffffff;
    z-index: 2;
}

.manager-portrait__name {
    font-family: 'Merriweather', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 4px;
    line-height: 1.2;
    letter-spacing: -0.01em;
}

.manager-portrait__role {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.04em;
    color: rgba(255, 255, 255, 0.78);
    margin: 0;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 991px) {
    .manager-message {
        padding: 80px 0 90px;
    }
    .manager-message__layout {
        grid-template-columns: 1fr;
        gap: 50px;
    }
    .manager-portrait {
        max-width: 360px;
        /* Image below text on tablet/mobile */
        order: 2;
    }
    .manager-message__content {
        max-width: 100%;
        order: 1;
    }
    .manager-message__quote-icon {
        font-size: 100px;
        top: -35px;
        left: -10px;
    }
    .manager-portrait__quote-mark {
        right: -20px;
    }
}

@media (max-width: 640px) {
    .manager-message {
        padding: 60px 0 70px;
    }
    .manager-message__head {
        margin-bottom: 44px;
    }
    .manager-message__layout {
        gap: 40px;
    }
    .manager-portrait {
        max-width: 280px;
    }
    .manager-portrait__decor {
        inset: 14px -14px -14px 14px;
    }
    .manager-portrait__quote-mark {
        font-size: 90px;
        top: -20px;
        right: -15px;
    }
    .manager-portrait__nameplate {
        padding: 20px 18px 16px;
    }
    .manager-portrait__name {
        font-size: 1.15rem;
    }
    .manager-portrait__role {
        font-size: 0.72rem;
    }
    .manager-message__greeting {
        font-size: 1.15rem;
    }
    .manager-message__body p {
        font-size: 0.94rem;
        line-height: 1.7;
    }
    .manager-message__signature {
        gap: 14px;
    }
    .manager-message__signature-line {
        width: 36px;
    }
    .manager-message__signature-text strong {
        font-size: 0.95rem;
    }
    .manager-message__quote-icon {
        font-size: 80px;
        top: -25px;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .manager-message *,
    .manager-message *::before,
    .manager-message *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .manager-message__divider {
        transform: scaleX(1);
    }
    .manager-portrait:hover .manager-portrait__frame {
        transform: none;
    }
    .manager-portrait:hover .manager-portrait__frame img {
        transform: none;
    }
}
        .message-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 40px;
            align-items: center;
        }
        .manager-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            align-items: center;
        }
        .principal-image,
        .manager-image {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            position: relative;
        }
        .principal-image img,
        .manager-image img { width: 100%; height: auto; display: block; }

        .principal-overlay,
        .manager-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            background: rgba(0,0,0,0.75);
            color: white;
            padding: 15px;
            text-align: center;
        }
        .principal-overlay h4,
        .manager-overlay h4 { color: white; margin: 0; font-size: 1.2rem; }
        .principal-overlay p,
        .manager-overlay p { margin: 5px 0 0; font-size: 0.9rem; opacity: 0.9; }

        .message-content,
        .manager-content {
            padding: 25px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }
        .message-content h2,
        .manager-content h2 { margin-bottom: 20px; color: var(--primary); }
       
        .message-content p,
        .manager-content p {
            margin-bottom: 15px;
            font-size: 1.05rem;
            line-height: 1.8;
        }
        .principal-name,
        .manager-name {
            font-weight: 600;
            color: var(--primary);
            margin-top: 20px;
            font-style: italic;
        }
        

        /* ============================================================
           FACILITIES
           ============================================================ */
        /* ============================================================
   OUR FACILITIES — Premium Editorial Section
   Scoped under .facilities — no conflicts
   ============================================================ */

.facilities {
    position: relative;
    padding: 100px 0 110px;
    background: var(--section-bg, #f7f9fc);
    overflow: hidden;
    isolation: isolate;
    transition: background-color 0.3s ease;
}


/* ---- Background decorations ---- */
.facilities__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.facilities__circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.15);
}

.facilities__circle--1 {
    width: 450px;
    height: 450px;
    top: -180px;
    right: -150px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.04), transparent 70%);
}

.facilities__circle--2 {
    width: 300px;
    height: 300px;
    bottom: -120px;
    left: -100px;
    background: radial-gradient(circle, rgba(13, 27, 42, 0.03), transparent 70%);
}

/* ---- Header ---- */
.facilities__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.facilities__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 20px;
}



.facilities__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: facDotPulse 2s ease-in-out infinite;
}

@keyframes facDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.facilities__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.6vw, 2.8rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D1B2A;
    margin: 0 0 18px;
}


.facilities__divider {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto 18px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
}

.facilities.is-visible .facilities__divider {
    transform: scaleX(1);
}

.facilities__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    margin: 0 auto;
    max-width: 560px;
}


/* ---- Grid ---- */
.facilities__grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    max-width: 1200px;
    margin: 0 auto;
}

/* ---- Card Base ---- */
.facility-card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(13, 27, 42, 0.08);
    box-shadow: 0 8px 24px -8px rgba(13, 27, 42, 0.12);
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease,
        border-color 0.4s ease;
    will-change: transform;
}



/* Gold top accent on hover */
.facility-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 3px;
    background: linear-gradient(90deg, #D6AD52, #f0d78c, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 5;
}

.facility-card:hover::before,
.facility-card:focus-within::before {
    transform: scaleX(1);
}

.facility-card:hover,
.facility-card:focus-within {
    transform: translateY(-8px);
    box-shadow: 0 22px 44px -18px rgba(13, 27, 42, 0.22);
    border-color: rgba(214, 173, 82, 0.35);
}


/* ---- Image ---- */
.facility-card__image-wrap {
    position: relative;
    width: 100%;
    aspect-ratio: 4 / 3;
    overflow: hidden;
    background: linear-gradient(135deg, #1a3a5c, #0a1420);
}

.facility-card__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.facility-card:hover .facility-card__image,
.facility-card:focus-within .facility-card__image {
    transform: scale(1.08);
}

/* Image overlay (dark gradient at bottom for badge readability) */
.facility-card__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        transparent 55%,
        rgba(13, 27, 42, 0.4) 100%
    );
    pointer-events: none;
    z-index: 1;
}

/* Badge (icon) */
.facility-card__badge {
    position: absolute;
    bottom: 16px;
    left: 16px;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: linear-gradient(135deg, #D6AD52, #b8912f);
    color: #0D1B2A;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    z-index: 2;
    box-shadow: 0 6px 16px -4px rgba(214, 173, 82, 0.5);
    transition: transform 0.4s ease;
}

.facility-card:hover .facility-card__badge,
.facility-card:focus-within .facility-card__badge {
    transform: rotate(-6deg) scale(1.1);
}

/* ---- Content ---- */
.facility-card__content {
    position: relative;
    padding: 22px 22px 24px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    flex: 1;
}

.facility-card__title {
    font-family: 'Merriweather', serif;
    font-size: 1.2rem;
    font-weight: 700;
    color: #0D1B2A;
    line-height: 1.3;
    margin: 0;
    transition: color 0.3s ease;
    letter-spacing: -0.01em;
}



.facility-card:hover .facility-card__title,
.facility-card:focus-within .facility-card__title {
    color: #b8912f;
}


.facility-card__desc {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.88rem;
    line-height: 1.6;
    color: #666;
    margin: 0 0 12px;
    flex: 1;
}


/* Arrow */
.facility-card__arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(13, 27, 42, 0.06);
    color: #0D1B2A;
    font-size: 0.72rem;
    align-self: flex-start;
    margin-top: auto;
    transition:
        background 0.3s ease,
        color 0.3s ease,
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}


.facility-card:hover .facility-card__arrow,
.facility-card:focus-within .facility-card__arrow {
    background: #D6AD52;
    color: #0D1B2A;
    transform: translateX(4px);
}

/* Keyboard focus on card (if it's a link) */
.facility-card:focus-visible,
.facility-card a:focus-visible {
    outline: 3px solid #D6AD52;
    outline-offset: 4px;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

/* Tablet — 2 columns */
@media (max-width: 991px) {
    .facilities {
        padding: 80px 0 90px;
    }
    .facilities__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    .facilities__head {
        margin-bottom: 48px;
    }
}

/* Mobile — 1 column */
@media (max-width: 640px) {
    .facilities {
        padding: 60px 0 70px;
    }
    .facilities__grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .facility-card__image-wrap {
        aspect-ratio: 16 / 10;
    }
    .facility-card__content {
        padding: 20px 20px 22px;
    }
    .facility-card__title {
        font-size: 1.1rem;
    }
    .facility-card__desc {
        font-size: 0.85rem;
    }
    .facility-card__badge {
        width: 40px;
        height: 40px;
        font-size: 1rem;
        bottom: 14px;
        left: 14px;
    }
    .facility-card__arrow {
        width: 30px;
        height: 30px;
        font-size: 0.68rem;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .facilities *,
    .facilities *::before,
    .facilities *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .facilities__divider {
        transform: scaleX(1);
    }
    .facility-card:hover,
    .facility-card:focus-within {
        transform: none;
    }
    .facility-card:hover .facility-card__image,
    .facility-card:focus-within .facility-card__image {
        transform: none;
    }
    .facility-card:hover .facility-card__badge,
    .facility-card:focus-within .facility-card__badge {
        transform: none;
    }
    .facility-card:hover .facility-card__arrow,
    .facility-card:focus-within .facility-card__arrow {
        transform: none;
    }
}

        /* ============================================================
           GALLERY
           ============================================================ */
        /* ============================================================
   OUR PHOTO GALLERY — Premium Editorial Section
   Scoped under .gallery — no conflicts
   ============================================================ */

.gallery {
    position: relative;
    padding: 100px 0 110px;
    background: var(--section-bg, #f7f9fc);
    overflow: hidden;
    isolation: isolate;
    transition: background-color 0.3s ease;
}



/* ---- Background ---- */
.gallery__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.gallery__circle {
    position: absolute;
    width: 450px;
    height: 450px;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.12);
    top: -180px;
    left: -150px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.04), transparent 70%);
}

/* ---- Header ---- */
.gallery__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 720px;
    margin: 0 auto 60px;
}

.gallery__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 20px;
}


.gallery__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: galDotPulse 2s ease-in-out infinite;
}

@keyframes galDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.gallery__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.6vw, 2.8rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D1B2A;
    margin: 0 0 18px;
}



.gallery__divider {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto 18px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
}

.gallery.is-visible .gallery__divider {
    transform: scaleX(1);
}

.gallery__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    margin: 0 auto;
    max-width: 600px;
}



/* ---- Grid (Editorial Masonry) ---- */
.gallery__grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 220px;
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Large items span 2 cols + 2 rows */
.gallery__item--large {
    grid-column: span 2;
    grid-row: span 2;
}

/* ---- Item ---- */
.gallery__item {
    position: relative;
    border: none;
    padding: 0;
    margin: 0;
    background: #0D1B2A;
    border-radius: 14px;
    overflow: hidden;
    cursor: pointer;
    display: block;
    isolation: isolate;
    box-shadow: 0 4px 14px -4px rgba(13, 27, 42, 0.15);
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease;
    will-change: transform;
}

.gallery__item:focus-visible {
    outline: 3px solid #D6AD52;
    outline-offset: 3px;
}

.gallery__item:hover,
.gallery__item:focus-visible {
    transform: translateY(-4px);
    box-shadow:
        0 16px 36px -12px rgba(13, 27, 42, 0.35),
        0 0 0 2px rgba(214, 173, 82, 0.4);
}

/* Image */
.gallery__item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform;
}

.gallery__item:hover img,
.gallery__item:focus-visible img {
    transform: scale(1.08);
}

/* Gradient overlay */
.gallery__overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        transparent 45%,
        rgba(13, 27, 42, 0.75) 100%
    );
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
    pointer-events: none;
}

.gallery__item:hover .gallery__overlay,
.gallery__item:focus-visible .gallery__overlay {
    opacity: 1;
}

/* Expand icon */
.gallery__icon {
    position: absolute;
    top: 14px;
    right: 14px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(214, 173, 82, 0.95);
    color: #0D1B2A;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    z-index: 2;
    opacity: 0;
    transform: translateY(-6px) scale(0.85);
    transition: opacity 0.3s ease, transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 0 6px 16px -4px rgba(214, 173, 82, 0.5);
}

.gallery__item:hover .gallery__icon,
.gallery__item:focus-visible .gallery__icon {
    opacity: 1;
    transform: translateY(0) scale(1);
}

/* Caption */
.gallery__caption {
    position: absolute;
    left: 16px;
    right: 16px;
    bottom: 16px;
    color: #ffffff;
    font-family: 'Merriweather', serif;
    font-size: 0.95rem;
    font-weight: 700;
    line-height: 1.3;
    z-index: 2;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.35s ease 0.05s, transform 0.35s ease 0.05s;
    pointer-events: none;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
}

.gallery__item:hover .gallery__caption,
.gallery__item:focus-visible .gallery__caption {
    opacity: 1;
    transform: translateY(0);
}

/* Small items caption size */
.gallery__item:not(.gallery__item--large) .gallery__caption {
    font-size: 0.85rem;
}

/* ============================================================
   LIGHTBOX
   ============================================================ */
.gallery-lightbox {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 80px;
    opacity: 0;
    transition: opacity 0.35s ease;
    pointer-events: none;
}

.gallery-lightbox.is-open {
    opacity: 1;
    pointer-events: auto;
}

.gallery-lightbox[hidden] {
    display: none;
}

.gallery-lightbox__backdrop {
    position: absolute;
    inset: 0;
    background: rgba(10, 20, 32, 0.94);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    cursor: zoom-out;
}

.gallery-lightbox__stage {
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    max-width: 90vw;
    max-height: 90vh;
    transform: scale(0.96);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.gallery-lightbox.is-open .gallery-lightbox__stage {
    transform: scale(1);
}

.gallery-lightbox__image-wrap {
    position: relative;
    max-width: 100%;
    max-height: 76vh;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    overflow: hidden;
    box-shadow:
        0 40px 80px -20px rgba(0, 0, 0, 0.7),
        0 0 0 1px rgba(214, 173, 82, 0.3);
    background: #0D1B2A;
}

.gallery-lightbox__image {
    max-width: 100%;
    max-height: 76vh;
    width: auto;
    height: auto;
    display: block;
    object-fit: contain;
}

.gallery-lightbox__meta {
    display: flex;
    align-items: center;
    gap: 20px;
    color: #ffffff;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.9rem;
    text-align: center;
}

.gallery-lightbox__caption {
    color: #ffffff;
    font-family: 'Merriweather', serif;
    font-size: 1rem;
    font-weight: 700;
}

.gallery-lightbox__counter {
    color: #D6AD52;
    font-weight: 600;
    letter-spacing: 0.1em;
    font-size: 0.85rem;
    padding: 4px 12px;
    border: 1px solid rgba(214, 173, 82, 0.4);
    border-radius: 100px;
}

/* Close button */
.gallery-lightbox__close {
    position: absolute;
    top: 24px;
    right: 24px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(214, 173, 82, 0.4);
    color: #ffffff;
    font-size: 1.15rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    transition: background 0.25s ease, transform 0.3s ease;
    backdrop-filter: blur(6px);
}

.gallery-lightbox__close:hover,
.gallery-lightbox__close:focus-visible {
    background: #D6AD52;
    color: #0D1B2A;
    transform: rotate(90deg);
    outline: none;
}

/* Nav arrows */
.gallery-lightbox__nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 54px;
    height: 54px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(214, 173, 82, 0.4);
    color: #ffffff;
    font-size: 1.1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    transition: background 0.25s ease, transform 0.3s ease;
    backdrop-filter: blur(6px);
}

.gallery-lightbox__nav:hover,
.gallery-lightbox__nav:focus-visible {
    background: #D6AD52;
    color: #0D1B2A;
    outline: none;
}

.gallery-lightbox__nav--prev {
    left: 24px;
}

.gallery-lightbox__nav--next {
    right: 24px;
}

.gallery-lightbox__nav--prev:hover,
.gallery-lightbox__nav--prev:focus-visible {
    transform: translateY(-50%) translateX(-3px);
}

.gallery-lightbox__nav--next:hover,
.gallery-lightbox__nav--next:focus-visible {
    transform: translateY(-50%) translateX(3px);
}

/* Lock body scroll when lightbox open */
body.gallery-lightbox-open {
    overflow: hidden;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

/* Tablet — 2 large + smaller */
@media (max-width: 991px) {
    .gallery {
        padding: 80px 0 90px;
    }
    .gallery__grid {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 200px;
        gap: 16px;
    }
    .gallery__item--large {
        grid-column: span 2;
        grid-row: span 2;
    }
    .gallery-lightbox {
        padding: 60px 24px;
    }
    .gallery-lightbox__nav {
        width: 46px;
        height: 46px;
        font-size: 0.95rem;
    }
    .gallery-lightbox__nav--prev { left: 12px; }
    .gallery-lightbox__nav--next { right: 12px; }
    .gallery-lightbox__close {
        width: 44px;
        height: 44px;
        top: 16px;
        right: 16px;
    }
}

/* Mobile — 1 col */
@media (max-width: 640px) {
    .gallery {
        padding: 60px 0 70px;
    }
    .gallery__grid {
        grid-template-columns: 1fr;
        grid-auto-rows: 220px;
        gap: 14px;
    }
    .gallery__item--large {
        grid-column: span 1;
        grid-row: span 1;
    }
    .gallery__caption {
        opacity: 1;
        transform: translateY(0);
        font-size: 0.85rem;
    }
    .gallery__overlay {
        opacity: 1;
    }
    .gallery__icon {
        opacity: 1;
        transform: translateY(0) scale(1);
        width: 34px;
        height: 34px;
        font-size: 0.8rem;
    }
    .gallery-lightbox {
        padding: 70px 16px 90px;
    }
    .gallery-lightbox__image-wrap {
        max-height: 65vh;
        border-radius: 8px;
    }
    .gallery-lightbox__image {
        max-height: 65vh;
    }
    .gallery-lightbox__meta {
        flex-direction: column;
        gap: 10px;
        font-size: 0.85rem;
    }
    .gallery-lightbox__caption {
        font-size: 0.9rem;
    }
    .gallery-lightbox__counter {
        font-size: 0.78rem;
    }
    .gallery-lightbox__nav {
        width: 40px;
        height: 40px;
        font-size: 0.85rem;
    }
    .gallery-lightbox__nav--prev { left: 8px; }
    .gallery-lightbox__nav--next { right: 8px; }
    .gallery-lightbox__close {
        width: 40px;
        height: 40px;
        font-size: 1rem;
        top: 12px;
        right: 12px;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .gallery *,
    .gallery *::before,
    .gallery *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .gallery__divider {
        transform: scaleX(1);
    }
    .gallery__item:hover,
    .gallery__item:focus-visible {
        transform: none;
    }
    .gallery__item:hover img,
    .gallery__item:focus-visible img {
        transform: none;
    }
    .gallery__icon {
        transition: none;
    }
    .gallery-lightbox__stage {
        transition: none;
    }
}/* ============================================================
           ANNOUNCEMENTS
           ============================================================ */
        /* ============================================================
   LATEST ANNOUNCEMENTS — Premium Editorial Dashboard
   Scoped under .announcements — no conflicts
   ============================================================ */

.announcements {
    position: relative;
    padding: 100px 0 110px;
    background: var(--section-bg, #f7f9fc);
    overflow: hidden;
    isolation: isolate;
    transition: background-color 0.3s ease;
}


/* ---- Background decoration ---- */
.announcements__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.announcements__circle {
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    border: 1px solid rgba(214, 173, 82, 0.12);
    top: -160px;
    right: -140px;
    background: radial-gradient(circle, rgba(214, 173, 82, 0.04), transparent 70%);
}

/* ---- Header ---- */
.announcements__head {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 720px;
    margin: 0 auto 60px;
}

.announcements__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 20px;
}



.announcements__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: annDotPulse 2s ease-in-out infinite;
}

@keyframes annDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.announcements__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.6vw, 2.8rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D1B2A;
    margin: 0 0 18px;
}



.announcements__divider {
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #D6AD52, #f0d78c, #D6AD52, transparent);
    border-radius: 3px;
    margin: 0 auto 18px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1) 0.3s;
}

.announcements.is-visible .announcements__divider {
    transform: scaleX(1);
}

.announcements__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    margin: 0 auto;
    max-width: 620px;
}


/* ---- Grid ---- */
.announcements__grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 26px;
    max-width: 1200px;
    margin: 0 auto;
}

/* ---- Card ---- */
.announcement-card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid rgba(13, 27, 42, 0.08);
    box-shadow: 0 8px 24px -8px rgba(13, 27, 42, 0.1);
    padding: 26px 24px 22px;
    overflow: hidden;
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease,
        border-color 0.4s ease;
    will-change: transform;
}


/* Gold top accent on hover */
.announcement-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 3px;
    background: linear-gradient(90deg, #D6AD52, #f0d78c, transparent);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.announcement-card:hover::before,
.announcement-card:focus-within::before {
    transform: scaleX(1);
}

.announcement-card:hover,
.announcement-card:focus-within {
    transform: translateY(-8px);
    box-shadow: 0 22px 44px -18px rgba(13, 27, 42, 0.22);
    border-color: rgba(214, 173, 82, 0.35);
}



/* ---- Top row (icon + category) ---- */
.announcement-card__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 18px;
}

.announcement-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 12px;
    font-size: 1.15rem;
    flex-shrink: 0;
    transition: transform 0.4s ease;
}

.announcement-card:hover .announcement-card__icon,
.announcement-card:focus-within .announcement-card__icon {
    transform: rotate(-6deg) scale(1.08);
}

/* Icon variants per type */
.announcement-card__icon--event {
    background: linear-gradient(135deg, #0D1B2A, #1a3a5c);
    color: #ffffff;
    box-shadow: 0 6px 14px -4px rgba(13, 27, 42, 0.4);
}

.announcement-card__icon--meeting {
    background: linear-gradient(135deg, #D6AD52, #b8912f);
    color: #0D1B2A;
    box-shadow: 0 6px 14px -4px rgba(214, 173, 82, 0.45);
}

.announcement-card__icon--achievement {
    background: linear-gradient(135deg, #f0d78c, #D6AD52);
    color: #0D1B2A;
    box-shadow: 0 6px 14px -4px rgba(214, 173, 82, 0.5);
}

/* Category label */
.announcement-card__category {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 4px 10px;
    background: rgba(214, 173, 82, 0.1);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
}


/* ---- Body ---- */
.announcement-card__body {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
}

.announcement-card__title {
    font-family: 'Merriweather', serif;
    font-size: 1.15rem;
    font-weight: 700;
    line-height: 1.35;
    color: #0D1B2A;
    margin: 0;
    transition: color 0.3s ease;
    letter-spacing: -0.01em;
}


.announcement-card:hover .announcement-card__title,
.announcement-card:focus-within .announcement-card__title {
    color: #b8912f;
}



.announcement-card__desc {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.92rem;
    line-height: 1.6;
    color: #666;
    margin: 0;
}



/* ---- Footer (date + accent) ---- */
.announcement-card__footer {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    padding-top: 16px;
    border-top: 1px solid rgba(13, 27, 42, 0.08);
    margin-top: auto;
}


.announcement-card__date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.78rem;
    font-weight: 500;
    color: #666;
}



.announcement-card__date i {
    color: #D6AD52;
    font-size: 0.82rem;
}

/* Small gold accent line at footer */
.announcement-card__accent {
    display: block;
    height: 2px;
    flex: 1;
    max-width: 40px;
    background: #D6AD52;
    border-radius: 2px;
    margin-left: auto;
    opacity: 0.5;
    transition: opacity 0.3s ease;
}

.announcement-card:hover .announcement-card__accent,
.announcement-card:focus-within .announcement-card__accent {
    opacity: 1;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 991px) {
    .announcements {
        padding: 80px 0 90px;
    }
    .announcements__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 22px;
    }
    .announcements__head {
        margin-bottom: 48px;
    }
}

@media (max-width: 640px) {
    .announcements {
        padding: 60px 0 70px;
    }
    .announcements__grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .announcement-card {
        padding: 22px 20px 18px;
    }
    .announcement-card__title {
        font-size: 1.08rem;
    }
    .announcement-card__desc {
        font-size: 0.88rem;
    }
    .announcement-card__icon {
        width: 42px;
        height: 42px;
        font-size: 1rem;
    }
    .announcement-card__category {
        font-size: 0.6rem;
        padding: 3px 8px;
    }
    .announcement-card__date {
        font-size: 0.74rem;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .announcements *,
    .announcements *::before,
    .announcements *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .announcements__divider {
        transform: scaleX(1);
    }
    .announcement-card:hover,
    .announcement-card:focus-within {
        transform: none;
    }
    .announcement-card:hover .announcement-card__icon,
    .announcement-card:focus-within .announcement-card__icon {
        transform: none;
    }
}
        /* ============================================================
           CONTACT
           ============================================================ */
        .contact { background-color: var(--section-bg); }
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }
        .contact-info h3 {
            margin-bottom: 20px;
            color: var(--primary);
        }
        .contact-details { margin-bottom: 30px; }
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }
        .contact-icon {
            width: 50px; height: 50px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .contact-text h4 { margin-bottom: 5px; }
        .map-container {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            height: 400px;
        }
        .map-container iframe { width: 100%; height: 100%; border: none; }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px; height: 40px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            transition: var(--transition);
        }
        .social-icons a:hover {
            transform: translateY(-3px);
            background: var(--secondary);
        }
        .social-icons a:hover i {
            animation: socialSpin 0.6s ease;
        }
        @keyframes socialSpin {
            0%   { transform: rotate(0) scale(1); }
            50%  { transform: rotate(180deg) scale(1.2); }
            100% { transform: rotate(360deg) scale(1); }
        }

        /* ============================================================
           VERTICAL BUTTONS — FIXED: no overlap, no left overflow
           ============================================================ */
        .vertical-btn-wrap {
            position: fixed;
            left: 0;
            top: 30%;
            z-index: 1150;
            display: flex;
            flex-direction: column;
            gap: 14px;
            pointer-events: none;
        }

        .v-btn {
            position: relative;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 10px;
            border: none;
            border-radius: 0 14px 14px 0;
            cursor: pointer;
            font-family: 'Source Serif Pro', serif;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #ffffff;
            overflow: hidden;
            pointer-events: auto;
            outline: none;
            -webkit-tap-highlight-color: transparent;

            writing-mode: vertical-rl;
            text-orientation: mixed;

            transition:
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                box-shadow 0.35s ease,
                filter 0.35s ease;
            animation: vbtnSlide 4s ease-in-out infinite;
        }
        .v-btn:nth-child(2) { animation-delay: 1.2s; }

        @keyframes vbtnSlide {
            0%, 100% { transform: translateX(0); }
            50%      { transform: translateX(6px); }
        }

        .v-btn--login {
            background: linear-gradient(135deg, #1a4b8c, #2c6cb0);
            box-shadow:
                0 8px 20px rgba(26, 75, 140, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }
        .v-btn--result {
            background: linear-gradient(135deg, #f9a826, #e8970f);
            color: #1a1a1a;
            box-shadow:
                0 8px 20px rgba(249, 168, 38, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .v-btn__icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            font-size: 0.9rem;
            border-radius: 50%;
            transform: scale(1);
            transform-style: preserve-3d;
            transform: translateZ(0);
            transform: translate3d(0, 0, 0);
            transform:rotate(90deg);
            transform-origin: center;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), background 0.3s ease;
        }
        .v-btn--login .v-btn__icon {
            transform: scale(1.05);
                        transform:rotate(90deg);

            background: rgba(255, 255, 255, 0.2);
            transition: transform 0.4s ease, background 0.3s ease;
            writing-mode: horizontal-tb;
        }
        .v-btn--result .v-btn__icon { background: rgba(26, 26, 26, 0.18); }

        .v-btn__label {
            display: inline-block;
            white-space: nowrap;
            transition: letter-spacing 0.3s ease;
        }

        .v-btn::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transform: skewX(-20deg);
            transition: left 0.7s ease;
            pointer-events: none;
        }

        .v-btn:hover,
        .v-btn:focus-visible {
            transform: translateX(10px) scale(1.03);
            animation: none;
            filter: brightness(1.08);
        }
        .v-btn--login:hover,
        .v-btn--login:focus-visible {
            box-shadow:
                0 12px 28px rgba(26, 75, 140, 0.55),
                0 0 0 3px rgba(249, 168, 38, 0.35);
        }
        .v-btn--result:hover,
        .v-btn--result:focus-visible {
            box-shadow:
                0 12px 28px rgba(249, 168, 38, 0.65),
                0 0 0 3px rgba(26, 75, 140, 0.35);
        }
        .v-btn:hover::before,
        .v-btn:focus-visible::before { left: 130%; }
        .v-btn:hover .v-btn__icon,
        .v-btn:focus-visible .v-btn__icon {
            transform: scale(1.15) rotate(-8deg);
            background: rgba(255, 255, 255, 0.35);
        }
        .v-btn:hover .v-btn__label,
        .v-btn:focus-visible .v-btn__label { letter-spacing: 1px; }
        .v-btn:focus-visible {
            outline: 3px solid #f9a826;
            outline-offset: 4px;
        }

        /* ============================================================
           PREMIUM FAB — LEFT side, opens UPWARD
           ============================================================ */
        .fab-container {
            position: fixed;
            left: 0;
            bottom: 30px;
            z-index: 1200;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 14px;
            font-family: 'Source Serif Pro', serif;
            max-width: calc(100vw - 48px);
            isolation: isolate;
            padding-left: 24px;
        }

        .fab-main {
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            background: linear-gradient(135deg, #1a4b8c, #2c6cb0);
            color: #ffffff;
            font-size: 1.45rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow:
                0 10px 24px rgba(26, 75, 140, 0.35),
                0 4px 10px rgba(0, 0, 0, 0.12);
            transition:
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                background 0.35s ease,
                box-shadow 0.35s ease;
            outline: none;
            -webkit-tap-highlight-color: transparent;
            z-index: 2;
        }
        .fab-main:hover,
        .fab-main:focus-visible {
            transform: scale(1.06);
            background: linear-gradient(135deg, #2c6cb0, #1a4b8c);
            box-shadow:
                0 14px 32px rgba(26, 75, 140, 0.5),
                0 0 0 4px rgba(249, 168, 38, 0.28);
        }
        .fab-main:focus-visible {
            outline: 3px solid #f9a826;
            outline-offset: 4px;
        }

        .fab-main i {
            position: absolute;
            transition: opacity 0.3s ease, transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }
        .fab-main .fab-icon-comment { opacity: 1; transform: rotate(0) scale(1); }
        .fab-main .fab-icon-close { opacity: 0; transform: rotate(-90deg) scale(0.4); }
        .fab-container:not(.is-open) .fab-icon-comment {
            animation: iconWiggle 3s ease-in-out infinite;
        }
        @keyframes iconWiggle {
            0%, 100% { transform: rotate(0) scale(1); }
            10%      { transform: rotate(8deg) scale(1); }
            20%      { transform: rotate(-8deg) scale(1); }
            30%      { transform: rotate(0) scale(1); }
        }
        .fab-container.is-open .fab-main .fab-icon-comment { opacity: 0; transform: rotate(90deg) scale(0.4); }
        .fab-container.is-open .fab-main .fab-icon-close { opacity: 1; transform: rotate(0) scale(1); }

        .fab-container:not(.is-open) .fab-main::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 2px solid rgba(249, 168, 38, 0.55);
            animation: fabPulse 2.4s ease-out infinite;
            pointer-events: none;
        }
        @keyframes fabPulse {
            0%   { transform: scale(1);    opacity: 0.9; }
            70%  { transform: scale(1.6);  opacity: 0;   }
            100% { transform: scale(1.6);  opacity: 0;   }
        }

        .fab-main .fab-tooltip {
            position: absolute;
            left: 72px;
            top: 50%;
            transform: translateY(-50%) translateX(-8px);
            background: #1a4b8c;
            color: #fff;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            padding: 8px 14px;
            border-radius: 8px;
            white-space: nowrap;
            box-shadow: 0 6px 18px rgba(26, 75, 140, 0.3);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s ease, transform 0.25s ease;
        }
        .fab-main .fab-tooltip::after {
            content: '';
            position: absolute;
            top: 50%; left: -5px;
            transform: translateY(-50%) rotate(45deg);
            width: 10px; height: 10px;
            background: #1a4b8c;
        }
        .fab-main:hover .fab-tooltip,
        .fab-main:focus-visible .fab-tooltip {
            opacity: 1;
            transform: translateY(-50%) translateX(0);
        }
        .fab-container.is-open .fab-main .fab-tooltip { opacity: 0 !important; }

        .fab-actions {
            position: absolute;
            bottom: 72px;
            left: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
            pointer-events: none;
            z-index: 1;
        }
        .fab-item {
            position: relative;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.25rem;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.18);
            opacity: 0;
            transform: translateY(20px) scale(0.6);
            pointer-events: none;
            transition:
                opacity 0.3s ease,
                transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1),
                background 0.25s ease,
                box-shadow 0.25s ease;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }
        .fab-item.whatsapp { background: #25D366; }
        .fab-item.call     { background: #f9a826; color: #1a1a1a; }
        .fab-item.telegram { background: #229ED9; }

        .fab-container.is-open .fab-actions { pointer-events: auto; }
        .fab-container.is-open .fab-item {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }
        .fab-container.is-open .fab-item.telegram { transition-delay: 0.05s; }
        .fab-container.is-open .fab-item.call     { transition-delay: 0.10s; }
        .fab-container.is-open .fab-item.whatsapp { transition-delay: 0.15s; }

        .fab-item:hover,
        .fab-item:focus-visible {
            transform: translateY(0) scale(1.1);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.28);
        }
        .fab-item:focus-visible {
            outline: 3px solid #1a4b8c;
            outline-offset: 3px;
        }

        .fab-item-tooltip {
            position: absolute;
            left: 64px;
            top: 50%;
            transform: translateY(-50%) translateX(-6px);
            background: #1a4b8c;
            color: #fff;
            font-size: 0.74rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            padding: 6px 12px;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease, transform 0.2s ease;
            box-shadow: 0 4px 12px rgba(26, 75, 140, 0.28);
        }
        .fab-item-tooltip::after {
            content: '';
            position: absolute;
            top: 50%; left: -4px;
            transform: translateY(-50%) rotate(45deg);
            width: 8px; height: 8px;
            background: #1a4b8c;
        }
        .fab-item:hover .fab-item-tooltip,
        .fab-item:focus-visible .fab-item-tooltip {
            opacity: 1;
            transform: translateY(-50%) translateX(0);
        }

        /* ============================================================
           BACK TO TOP — RIGHT side
           ============================================================ */
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
        .back-to-top::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 2px solid var(--accent);
            opacity: 0;
            animation: backToTopPulse 2.5s ease-out infinite;
            pointer-events: none;
        }
        @keyframes backToTopPulse {
            0%   { transform: scale(1);    opacity: 0.7; }
            70%  { transform: scale(1.4);  opacity: 0;   }
            100% { transform: scale(1.4);  opacity: 0;   }
        }
        .back-to-top i { animation: arrowBounceUp 1.8s ease-in-out infinite; }
        @keyframes arrowBounceUp {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-3px); }
        }
        .back-to-top.active { opacity: 1; visibility: visible; }
        .back-to-top:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1199px) {
            .quick-access .quick-access-grid { grid-template-columns: repeat(3, 1fr); }
        }
        @media (max-width: 992px) {
            .section { padding: 60px 0; }
            .section-title h2 { font-size: 2rem; }
        }
        @media (max-width: 768px) {
            .about-content,
            .message-container,
            .manager-container,
            .contact-container { grid-template-columns: 1fr; }
            .principal-image,
            .manager-image { max-width: 300px; margin: 0 auto; }
            .manager-content { order: 2; }
            .manager-image { order: 1; }

            .quick-access { padding: 60px 0; }
            .quick-access .quick-access-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
            .quick-access .quick-access-card {
                padding: 22px 18px 18px;
                min-height: 200px;
            }
            .quick-access .qa-icon { width: 50px; height: 50px; font-size: 1.35rem; }
            .quick-access .qa-title { font-size: 1.05rem; }
            .quick-access .qa-desc { font-size: 0.82rem; }

            .section { padding: 40px 0; }
            .section-title h2 { font-size: 1.8rem; }

            .hero { height: 72vh; min-height: 440px; }
            .slide-title { font-size: 2rem; }
            .slide-desc { font-size: 0.95rem; margin-top: 1rem; }
            .slide-cta { margin-top: 1.6rem; gap: 0.8rem; }
            .hero .btn-gold,
            .hero .btn-outline { padding: 0.7rem 1.6rem; font-size: 0.9rem; }
            .slider-nav { width: 42px; height: 42px; font-size: 1.3rem; }
            #prevBtn { left: 12px; }
            #nextBtn { right: 12px; }
            .slider-bottom { bottom: 18px; gap: 10px; }
            #sliderDots { gap: 10px; padding: 6px 16px; }
            .dot.active { width: 22px; }
            #sliderProgressBar { width: 150px; }

            .vertical-btn-wrap {
                top: 22%;
                gap: 12px;
            }
            .v-btn {
                padding: 12px 8px;
                font-size: 0.78rem;
                border-radius: 0 12px 12px 0;
            }
            .v-btn__icon { width: 20px; height: 20px; font-size: 0.8rem; }

            .fab-container {
                left: 0;
                bottom: 88px;
                padding-left: 16px;
            }
            .fab-main { width: 56px; height: 56px; font-size: 1.35rem; }
            .fab-item { width: 48px; height: 48px; font-size: 1.15rem; }
            .fab-actions { gap: 10px; bottom: 68px; }
            .fab-main .fab-tooltip,
            .fab-item-tooltip { display: none; }
        }
        @media (max-width: 576px) {
            .info-cards,
            .facility-grid { grid-template-columns: 1fr; }

            .quick-access { padding: 50px 0; }
            .quick-access .quick-access-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .quick-access .quick-access-card {
                min-height: auto;
                flex-direction: row;
                align-items: center;
                gap: 16px;
                padding: 18px;
            }
            .quick-access .qa-body { gap: 4px; }
            .quick-access .qa-desc { display: none; }
            .quick-access .qa-cta { padding-top: 6px; font-size: 0.78rem; }

            .back-to-top { bottom: 20px; right: 20px; width: 45px; height: 45px; }

            .hero { height: 68vh; min-height: 400px; }
            .slide-title { font-size: 1.7rem; }
            .slide-desc { font-size: 0.85rem; line-height: 1.5; }
            .slide-eyebrow { font-size: 0.65rem; letter-spacing: 0.22em; }
            .hero .btn-gold,
            .hero .btn-outline { padding: 0.6rem 1.2rem; font-size: 0.8rem; }

            /* Vertical buttons flip to right on small screens */
            .vertical-btn-wrap {
                left: auto;
                right: 0;
                top: 30%;
                gap: 10px;
            }
            .v-btn {
                border-radius: 12px 0 0 12px;
                padding: 10px 8px;
                font-size: 0.72rem;
                animation: vbtnSlideRight 4s ease-in-out infinite;
            }
            .v-btn:nth-child(2) { animation-delay: 1.2s; }
            @keyframes vbtnSlideRight {
                0%, 100% { transform: translateX(0); }
                50%      { transform: translateX(-6px); }
            }
            .v-btn:hover,
            .v-btn:focus-visible {
                transform: translateX(-10px) scale(1.03);
                animation: none;
            }
            .v-btn__icon { width: 18px; height: 18px; font-size: 0.72rem; }
        }
        @media (max-width: 380px) {
            .fab-container { left: 0; bottom: 80px; gap: 10px; padding-left: 12px; }
            .fab-main { width: 50px; height: 50px; font-size: 1.2rem; }
            .fab-item { width: 44px; height: 44px; font-size: 1.05rem; }
            .fab-actions { bottom: 62px; gap: 10px; }
            .v-btn { padding: 8px 6px; font-size: 0.68rem; }
            .v-btn__icon { width: 16px; height: 16px; font-size: 0.68rem; }
        }

        /* ============================================================
           REDUCED MOTION
           ============================================================ */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
            .quick-access .quick-access-card:hover,
            .quick-access .quick-access-card:focus-visible { transform: none; }
            .quick-access .quick-access-card:hover .qa-icon,
            .quick-access .quick-access-card:focus-visible .qa-icon { transform: none; }
            .info-card:hover { transform: none; }
            .facility-card:hover { transform: none; }
            .gallery-item:hover { transform: none; }
            .fab-main:hover,
            .fab-main:focus-visible { transform: none; }
            .fab-container.is-open .fab-item { transform: none; }
            .fab-item:hover,
            .fab-item:focus-visible { transform: none; }
            .back-to-top::before,
            .back-to-top i,
            .fab-container:not(.is-open) .fab-icon-comment,
            .slider-nav:hover,
            .slider-nav:focus-visible,
            .info-card-icon,
            .announcement-icon,
            .social-icons a:hover i,
            .section-title::after,
            .slide-overlay::after,
            #sliderProgressBar .progress-fill.animate,
            .slide.active .slide-title,
            .v-btn,
            .v-btn:nth-child(2) {
                animation: none !important;
            }
            .v-btn,
            .v-btn:hover,
            .v-btn:focus-visible {
                transform: none !important;
            }
        }




        /* *****************************************************************************./ */



        /* ============================================================
   SCHOOL STATS — Premium Counter Section
   Scoped under .school-stats — no conflicts
   ============================================================ */

.school-stats {
    position: relative;
    padding: 100px 0 160px;         /* extra bottom for curve */
    background: #f7f9fc;
    overflow: hidden;
    isolation: isolate;
}



/* ---- Background decorations ---- */
.school-stats__bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}
/* Quick Access — subtle background photo */
.school-stats__bg:before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('image/1.jpeg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.05;
    filter: grayscale(40%);
    pointer-events: none;
    z-index: 0;
}



/* Subtle campus photo texture */
.school-stats__bg-photo {
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('image/1.jpeg') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.04;
    filter: grayscale(40%);
}


/* Small decorative dots (top-left) */
.school-stats__dot {
    position: absolute;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    opacity: 0.5;
}
.school-stats__dot--1 { top: 80px; left: 60px; }
.school-stats__dot--2 { top: 100px; left: 90px; }
.school-stats__dot--3 { top: 60px; left: 120px; }

/* Overlapping navy/gold circles (top-right) */
.school-stats__circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid;
}
.school-stats__circle--navy {
    width: 200px;
    height: 200px;
    top: -60px;
    right: -60px;
    border-color: rgba(13, 43, 85, 0.15);
    background: radial-gradient(circle, rgba(13, 43, 85, 0.04), transparent 70%);
}
.school-stats__circle--gold {
    width: 140px;
    height: 140px;
    top: 20px;
    right: 40px;
    border-color: rgba(214, 173, 82, 0.3);
    background: radial-gradient(circle, rgba(214, 173, 82, 0.08), transparent 70%);
}

/* Container */
.school-stats__container {
    position: relative;
    z-index: 2;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ---- Header ---- */
.school-stats__head {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 60px;
}

.school-stats__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-family: 'Source Serif Pro', serif;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: #b8912f;
    padding: 8px 16px;
    background: rgba(214, 173, 82, 0.08);
    border: 1px solid rgba(214, 173, 82, 0.25);
    border-radius: 100px;
    margin-bottom: 22px;
}

.school-stats__eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #D6AD52;
    box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2);
    animation: statDotPulse 2s ease-in-out infinite;
}
@keyframes statDotPulse {
    0%, 100% { box-shadow: 0 0 0 3px rgba(214, 173, 82, 0.2); }
    50%      { box-shadow: 0 0 0 6px rgba(214, 173, 82, 0.05); }
}

.school-stats__title {
    font-family: 'Merriweather', serif;
    font-size: clamp(2rem, 3.8vw, 2.9rem);
    font-weight: 900;
    line-height: 1.2;
    letter-spacing: -0.02em;
    color: #0D2B55;
    margin: 0 0 18px;
}

.school-stats__title-accent {
    background: linear-gradient(90deg, #D6AD52, #f0d78c, #D6AD52);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: statShine 5s linear infinite;
}
@keyframes statShine {
    to { background-position: 200% center; }
}

.school-stats__subtitle {
    font-family: 'Source Serif Pro', serif;
    font-size: clamp(0.95rem, 1.3vw, 1.08rem);
    line-height: 1.65;
    color: #666;
    max-width: 640px;
    margin: 0 auto;
}


/* ---- Grid ---- */
.school-stats__grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 26px;
    align-items: stretch;
}

/* ---- Card ---- */
.school-stat-card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid rgba(13, 43, 85, 0.1);
    box-shadow: 0 8px 24px -8px rgba(13, 43, 85, 0.12);
    padding: 0;
    overflow: visible;
    margin-top: 28px;                /* space for badge overlap */
    transition:
        transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow 0.4s ease;
    will-change: transform;
}


/* Gold/navy alternating border-bottom */
.school-stat-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 4px;
    border-radius: 0 0 16px 16px;
    background: #0D2B55;
}
.school-stat-card--reverse::after {
    background: #D6AD52;
}

/* Hover */
.school-stat-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 44px -12px rgba(13, 43, 85, 0.22);
}


/* ---- Icon badge (overlaps top edge) ---- */
.school-stat-card__badge {
    position: absolute;
    top: -28px;
    left: 50%;
    transform: translateX(-50%);
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    color: #ffffff;
    z-index: 3;
    box-shadow:
        0 8px 20px -6px rgba(0, 0, 0, 0.3),
        0 0 0 4px #ffffff;
    animation: statBadgeFloat 6s ease-in-out infinite;
}

@keyframes statBadgeFloat {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50%      { transform: translateX(-50%) translateY(-4px); }
}

.school-stat-card__badge--navy {
    background: linear-gradient(135deg, #0D2B55, #1a4a7f);
}
.school-stat-card__badge--gold {
    background: linear-gradient(135deg, #D6AD52, #b8912f);
    color: #0D2B55;
}

/* ---- Body ---- */
.school-stat-card__body {
    padding: 44px 24px 20px;
    text-align: center;
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.school-stat-card__number {
    font-family: 'Merriweather', serif;
    font-size: 2.8rem;
    font-weight: 900;
    line-height: 1;
    color: #0D2B55;
    margin-bottom: 10px;
    letter-spacing: -0.03em;
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 2px;
}

.school-stat-card__count {
    display: inline-block;
    font-variant-numeric: tabular-nums;
}

.school-stat-card__label {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: #0D2B55;
    margin: 0 0 14px;
}


.school-stat-card__divider {
    display: block;
    width: 32px;
    height: 2px;
    background: #D6AD52;
    border-radius: 2px;
    margin: 0 auto 14px;
}

.school-stat-card__desc {
    font-family: 'Source Serif Pro', serif;
    font-size: 0.88rem;
    line-height: 1.55;
    color: #666;
    margin: 0;
    max-width: 200px;
}


/* ---- Card image (bottom) ---- */
.school-stat-card__image {
    position: relative;
    width: calc(100% - 24px);
    margin: 0 12px 12px;
    aspect-ratio: 16 / 10;
    border-radius: 10px;
    overflow: hidden;
    background: linear-gradient(135deg, #1a3a5c, #0a1420);
}

.school-stat-card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.school-stat-card:hover .school-stat-card__image img {
    transform: scale(1.06);
}



/* ============================================================
   RESPONSIVE
   ============================================================ */
@media (max-width: 1199px) {
    .school-stats__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    .school-stat-card__number {
        font-size: 2.4rem;
    }
}

@media (max-width: 640px) {
    .school-stats {
        padding: 70px 0 120px;
    }
    .school-stats__head {
        margin-bottom: 45px;
    }
    .school-stats__grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .school-stat-card {
        margin-top: 24px;
    }
    .school-stat-card__badge {
        width: 48px;
        height: 48px;
        font-size: 1.15rem;
        top: -24px;
    }
    .school-stat-card__body {
        padding: 40px 20px 18px;
    }
    .school-stat-card__number {
        font-size: 2.2rem;
    }
    .school-stat-card__label {
        font-size: 0.72rem;
    }
    .school-stat-card__desc {
        font-size: 0.82rem;
    }
    .school-stat-card__image {
        aspect-ratio: 16 / 9;
    }
    .school-stats__footer-curve {
        height: 80px;
    }
    .school-stats__circle--navy {
        width: 140px;
        height: 140px;
        top: -40px;
        right: -40px;
    }
    .school-stats__circle--gold {
        width: 100px;
        height: 100px;
        top: 20px;
        right: 20px;
    }
}

/* ============================================================
   REDUCED MOTION
   ============================================================ */
@media (prefers-reduced-motion: reduce) {
    .school-stats *,
    .school-stats *::before,
    .school-stats *::after {
        animation: none !important;
        transition-duration: 0.01ms !important;
    }
    .school-stat-card__badge {
        animation: none !important;
    }
    .school-stat-card:hover {
        transform: none;
    }
    .school-stat-card:hover .school-stat-card__image img {
        transform: none;
    }
}
    </style>
</head>
<body>

@include('header')




<!-- ============================================================
     VERTICAL BUTTONS — LEFT side, TOP 30%
     ============================================================ -->
<div class="vertical-btn-wrap">
    <button type="button" class="v-btn v-btn--login" aria-label="Student Login">
       
        <span class="v-btn__label">  <span class="v-btn__icon"><i class="fas fa-user-graduate"></i></span>Student Login</span>
    </button>
    <button type="button" class="v-btn v-btn--result" aria-label="Student Result">
        
        <span class="v-btn__label"><span class="v-btn__icon"><i class="fas fa-chart-line"></i></span>Student Result</span>
    </button>
</div>

<!-- ============================================================
     HERO SLIDER
     ============================================================ -->
<section class="hero" id="home" aria-label="School hero slider">
    <div class="slider-container">
        <div class="slider" id="slider">

            <div class="slide active" data-index="0">
                <img src="image/banner_01.jpg" alt="B.S.D.L.V. Inter College Campus" class="slide-image">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <span class="slide-eyebrow">Welcome to B.S.D.L.V. Inter College</span>
                    <h1 class="slide-title">B.S.D.L.V. Inter College in Madhoganj, Hardoi</h1>
                    <p class="slide-desc">Providing quality education and shaping future leaders with world-class infrastructure.</p>
                    <div class="slide-cta">
                        <a href="#quick-access" class="btn-gold">Quick Access</a>
                        <a href="#about" class="btn-outline">Explore Campus</a>
                    </div>
                </div>
            </div>

            <div class="slide" data-index="1">
                <img src="image/banner_02.jpg" alt="Students at B.S.D.L.V." class="slide-image">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <span class="slide-eyebrow">Welcome to B.S.D.L.V. Inter College</span>
                    <h2 class="slide-title">Nurturing Young Minds</h2>
                    <p class="slide-desc">Creating an environment for holistic development and lifelong learning experiences.</p>
                    <div class="slide-cta">
                        <a href="#facilities" class="btn-gold">Our Facilities</a>
                        <a href="#gallery" class="btn-outline">View Gallery</a>
                    </div>
                </div>
            </div>

            <div class="slide" data-index="2">
                <img src="image/banner_03.jpg" alt="College Achievements" class="slide-image">
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <span class="slide-eyebrow">Welcome to B.S.D.L.V. Inter College</span>
                    <h2 class="slide-title">A School Established in 2016</h2>
                    <p class="slide-desc">Celebrating excellence in academics, sports, and co-curricular activities.</p>
                    <div class="slide-cta">
                        <a href="#announcements" class="btn-gold">Announcements</a>
                        <a href="#contact" class="btn-outline">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>

        <button id="prevBtn" class="slider-nav" aria-label="Previous slide">‹</button>
        <button id="nextBtn" class="slider-nav" aria-label="Next slide">›</button>

        <div class="slider-bottom">
            <div id="sliderDots" role="tablist" aria-label="Slide navigation dots"></div>
            <div id="sliderProgressBar" aria-hidden="true"></div>
        </div>
    </div>
</section>
<!-- ============================================================
     SCHOOL STATS — Premium Counter Section
     Replace values in data-target attributes below
     ============================================================ -->
<section class="school-stats" id="school-stats" aria-labelledby="school-stats-title">

    <!-- Background texture + decorative shapes -->
    <div class="school-stats__bg" aria-hidden="true">
        <span class="school-stats__bg-photo"></span>
        <span class="school-stats__dot school-stats__dot--1"></span>
        <span class="school-stats__dot school-stats__dot--2"></span>
        <span class="school-stats__dot school-stats__dot--3"></span>
        <span class="school-stats__circle school-stats__circle--navy"></span>
        <span class="school-stats__circle school-stats__circle--gold"></span>
    </div>

    <div class="container school-stats__container">

        <!-- Header -->
        <div class="school-stats__head">
            <span class="school-stats__eyebrow">
                <span class="school-stats__eyebrow-dot" aria-hidden="true"></span>
                Our Institution at a Glance
            </span>

            <h2 class="school-stats__title" id="school-stats-title">
                Numbers That Tell <span class="school-stats__title-accent">Our Story</span>
            </h2>

            <p class="school-stats__subtitle">
                At B.S.D.L.V. Inter College, we are committed to building a strong academic foundation and a brighter future for every student.
            </p>
        </div>

        <!-- Cards -->
        <div class="school-stats__grid">

            <!-- 1. STUDENTS -->
            <article class="school-stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="school-stat-card__badge school-stat-card__badge--navy" aria-hidden="true">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="school-stat-card__body">
                    <div class="school-stat-card__number">
                        <span class="school-stat-card__count" data-target="500" data-suffix="+">0</span>
                    </div>
                    <h3 class="school-stat-card__label">Students</h3>
                    <span class="school-stat-card__divider" aria-hidden="true"></span>
                    <p class="school-stat-card__desc">Bright minds, brighter futures</p>
                </div>
                <div class="school-stat-card__image">
                    <img
                        src="{{ asset('image/stats-students.jpg') }}"
                        alt="Students studying together in a classroom"
                        loading="lazy"
                        onerror="this.src='{{ asset('image/5.jpeg') }}'; this.onerror=null;">
                </div>
            </article>

            <!-- 2. TEACHING STAFF -->
            <article class="school-stat-card school-stat-card--reverse" data-aos="fade-up" data-aos-delay="200">
                <div class="school-stat-card__badge school-stat-card__badge--gold" aria-hidden="true">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="school-stat-card__body">
                    <div class="school-stat-card__number">
                        <span class="school-stat-card__count" data-target="25" data-suffix="+">0</span>
                    </div>
                    <h3 class="school-stat-card__label">Teaching Staff</h3>
                    <span class="school-stat-card__divider" aria-hidden="true"></span>
                    <p class="school-stat-card__desc">Dedicated to learning and growth</p>
                </div>
                <div class="school-stat-card__image">
                    <img
                        src="{{ asset('image/stats-teachers.jpg') }}"
                        alt="A teacher guiding students in a classroom"
                        loading="lazy"
                        onerror="this.src='{{ asset('image/12.jpeg') }}'; this.onerror=null;">
                </div>
            </article>

            <!-- 3. CLASSES -->
            <article class="school-stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="school-stat-card__badge school-stat-card__badge--navy" aria-hidden="true">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="school-stat-card__body">
                    <div class="school-stat-card__number">
                        <span class="school-stat-card__count" data-target="12" data-suffix="+">0</span>
                    </div>
                    <h3 class="school-stat-card__label">Classes</h3>
                    <span class="school-stat-card__divider" aria-hidden="true"></span>
                    <p class="school-stat-card__desc">Building strong foundations</p>
                </div>
                <div class="school-stat-card__image">
                    <img
                        src="{{ asset('image/stats-classes.jpg') }}"
                        alt="Books and learning materials in a classroom"
                        loading="lazy"
                        onerror="this.src='{{ asset('image/10.jpeg') }}'; this.onerror=null;">
                </div>
            </article>

            <!-- 4. CAMPUS -->
            <article class="school-stat-card school-stat-card--reverse" data-aos="fade-up" data-aos-delay="400">
                <div class="school-stat-card__badge school-stat-card__badge--gold" aria-hidden="true">
                    <i class="fas fa-school"></i>
                </div>
                <div class="school-stat-card__body">
                    <div class="school-stat-card__number">
                        <span class="school-stat-card__count" data-target="1" data-suffix="">0</span>
                    </div>
                    <h3 class="school-stat-card__label">Campus</h3>
                    <span class="school-stat-card__divider" aria-hidden="true"></span>
                    <p class="school-stat-card__desc">A place to learn, grow and succeed</p>
                </div>
                <div class="school-stat-card__image">
                    <img
                        src="{{ asset('image/1.jpeg') }}"
                        alt="B.S.D.L.V. Inter College campus building"
                        loading="lazy">
                </div>
            </article>

        </div>
    </div>

    <!-- Curved footer with gold accent -->
    
</section>

<!-- ============================================================
     QUICK INFO
     ============================================================ -->
<!-- ============================================================
     COMBINED: INTERLOCKING INFO CARDS (LEFT) + ABOUT PREMIUM (RIGHT)
     Replaces old .quick-info and .about-premium standalone sections
     ============================================================ -->
<section class="combined-showcase" id="about" aria-labelledby="combined-about-title">

    <div class="container combined-showcase__container">

        <!-- =====================================================
             LEFT — Interlocking Info Cards
             ===================================================== -->
        <div class="combined-showcase__left" aria-label="Institution highlights">

            <div class="interlock-cards">

                <!-- Card 1: Our History -->
                <article class="interlock-card interlock-card--1">
                    <div class="interlock-card__icon">
                        <i class="fas fa-book-open" aria-hidden="true"></i>
                    </div>
                    <h3 class="interlock-card__title">Our History</h3>
                    <p class="interlock-card__desc">
                        Dedicated to service since 2016, shaping young minds with care.
                    </p>
                </article>

                <!-- Card 2: Our Mission -->
                <article class="interlock-card interlock-card--2">
                    <div class="interlock-card__icon">
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <h3 class="interlock-card__title">Our Mission</h3>
                    <p class="interlock-card__desc">
                        Unparalleled contribution to education in Mohddinpur Naibasti, Madhoganj, Hardoi.
                    </p>
                </article>

                <!-- Card 3: Our Location -->
                <article class="interlock-card interlock-card--3">
                    <div class="interlock-card__icon">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    </div>
                    <h3 class="interlock-card__title">Our Location</h3>
                    <p class="interlock-card__desc">
                        LAT: 27.0630224 · LONG: 80.1355547
                    </p>
                </article>

                <!-- Card 4: Our Address -->
                <article class="interlock-card interlock-card--4">
                    <div class="interlock-card__icon">
                        <i class="fas fa-address-card" aria-hidden="true"></i>
                    </div>
                    <h3 class="interlock-card__title">Our Address</h3>
                    <p class="interlock-card__desc">
                        Mohddinpur Naibasti, Madhoganj, Hardoi — 241302
                    </p>
                </article>

            </div>
        </div>

        <!-- =====================================================
             RIGHT — Premium About section (preserved content)
             ===================================================== -->
        <div class="combined-showcase__right about-premium about-premium--embedded">

            <!-- Decorative background layer -->
            <div class="about-premium__bg" aria-hidden="true">
                <span class="about-premium__year">2016</span>
                <span class="about-premium__circle about-premium__circle--1"></span>
                <span class="about-premium__circle about-premium__circle--2"></span>
            </div>

            <div class="about-premium__content">

                <!-- Left column of About -->
                <div class="about-premium__text">

                    <span class="about-premium__eyebrow">
                        <span class="about-premium__eyebrow-dot" aria-hidden="true"></span>
                        Discover Our Institution
                    </span>

                    <h2 class="about-premium__heading" id="combined-about-title">
                        <span class="about-premium__heading-line">More Than Education.</span>
                        <span class="about-premium__heading-line about-premium__heading-line--accent">
                            <span class="about-premium__underline">A Foundation for Life.</span>
                        </span>
                    </h2>

                    <p class="about-premium__lead">
                        Shaping futures with quality education since 2016.
                    </p>

                    <p class="about-premium__body">
                        B.S.D.L.V. Inter College is dedicated to nurturing curious minds
                        and building strong character. We focus on meaningful learning,
                        the pursuit of knowledge, and values that guide students far
                        beyond the classroom — preparing them for life, not just for
                        examinations.
                    </p>

                    <a href="{{ url('/about') }}" class="about-premium__cta">
                        <span>Explore Our Story</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>

                <!-- Right column of About (visual) -->
                <div class="about-premium__visual">
                    <div class="about-premium__image-wrap">
                        <img
                            src="{{ asset('image/1.jpeg') }}"
                            alt="B.S.D.L.V. Inter College campus"
                            class="about-premium__image"
                            loading="lazy"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="about-premium__image-fallback" aria-hidden="true">
                            <i class="fas fa-image"></i>
                            <span>School Photo</span>
                        </div>
                    </div>

                    <!-- Floating info card -->
                    <div class="about-premium__badge">
                        <span class="about-premium__badge-icon" aria-hidden="true">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="about-premium__badge-text">
                            <strong>Building Futures</strong>
                            <em>Since 2016</em>
                        </span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================================================
     QUICK ACCESS
     ============================================================ -->
<!-- ============================================================
     QUICK ACCESS — Premium Editorial Dashboard
     ============================================================ -->
<section class="section quick-access" id="quick-access">

    <div class="quick-access__bg" aria-hidden="true">
        <span class="quick-access__circle quick-access__circle--1"></span>
        <span class="quick-access__circle quick-access__circle--2"></span>
        <span class="quick-access__line"></span>
    </div>

    <div class="container">

        <!-- Section header -->
        <div class="quick-access__head" data-aos="fade-up">
            <span class="quick-access__eyebrow">
                <span class="quick-access__eyebrow-dot" aria-hidden="true"></span>
                Your Digital Gateway
            </span>

            <h2 class="quick-access__title">
                Everything You Need, <span class="quick-access__title-accent">One Click Away.</span>
            </h2>

            <p class="quick-access__subtitle">
                Quickly access student services, academic results and school communication channels.
            </p>

            <span class="quick-access__underline" aria-hidden="true"></span>
        </div>

        <!-- Cards -->
        <div class="quick-access__grid">

            <!-- 1. Featured: Student Login — WITH PHOTO -->
            <a href="studentlogin.html"
               class="qa-card qa-card--featured"
               data-aos="fade-up"
               data-aos-delay="60"
               aria-label="Student Login portal">

                <span class="qa-card__glow" aria-hidden="true"></span>

                <!-- Featured student photo -->
                <div class="qa-card__photo">
                    <img
                        src="{{ asset('image/students-classroom.jpg') }}"
                        alt="Students studying in a modern classroom at B.S.D.L.V. Inter College"
                        loading="lazy"
                        onerror="this.src='{{ asset('image/5.jpeg') }}'; this.onerror=null;">
                    <span class="qa-card__photo-overlay" aria-hidden="true"></span>
                    <span class="qa-card__photo-badge">
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                        Student Portal
                    </span>
                </div>

                <div class="qa-card__body">
                    <h3 class="qa-card__title">Student Login</h3>
                    <p class="qa-card__desc">
                        Sign in to access your dashboard, notes, attendance and learning resources.
                    </p>
                    <span class="qa-card__cta">
                        Login Now
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </div>
            </a>

            <!-- 2. Student Result -->
            <a href="result.html"
               class="qa-card"
               data-aos="fade-up"
               data-aos-delay="120"
               aria-label="Student Result portal">
                <div class="qa-card__icon qa-card__icon--gold">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                </div>
                <div class="qa-card__body">
                    <h3 class="qa-card__title">Student Result</h3>
                    <p class="qa-card__desc">Check your exam results and academic performance.</p>
                    <span class="qa-card__cta">
                        Check Result <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </div>
            </a>

            <!-- 3. Telegram -->
            <a href="https://t.me/IT_Technology50"
               class="qa-card"
               target="_blank" rel="noopener"
               data-aos="fade-up"
               data-aos-delay="180"
               aria-label="Join Telegram Group">
                <div class="qa-card__icon qa-card__icon--telegram">
                    <i class="fab fa-telegram" aria-hidden="true"></i>
                </div>
                <div class="qa-card__body">
                    <h3 class="qa-card__title">Telegram Group</h3>
                    <p class="qa-card__desc">Join our official channel for updates.</p>
                    <span class="qa-card__cta">
                        Join Group <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </div>
            </a>

            <!-- 4. WhatsApp -->
            <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF"
               class="qa-card"
               target="_blank" rel="noopener"
               data-aos="fade-up"
               data-aos-delay="240"
               aria-label="Join WhatsApp Group">
                <div class="qa-card__icon qa-card__icon--whatsapp">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                </div>
                <div class="qa-card__body">
                    <h3 class="qa-card__title">WhatsApp Group</h3>
                    <p class="qa-card__desc">Connect with us for quick updates.</p>
                    <span class="qa-card__cta">
                        Join Group <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </div>
            </a>

            <!-- 5. Contact Us -->
            <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF"
               class="qa-card"
               target="_blank" rel="noopener"
               data-aos="fade-up"
               data-aos-delay="300"
               aria-label="Contact Us">
                <div class="qa-card__icon qa-card__icon--contact">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                </div>
                <div class="qa-card__body">
                    <h3 class="qa-card__title">Contact Us</h3>
                    <p class="qa-card__desc">Reach out to our team for any queries.</p>
                    <span class="qa-card__cta">
                        Get in Touch <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </div>
            </a>

        </div>
    </div>
</section><!-- ============================================================
     ABOUT
     ============================================================ -->
<section class="section about" id="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>About Our College</h2>
            <p>B.S.D.L.V. Inter College has been providing quality education since 2016</p>
        </div>
        <div class="about-content" data-aos="fade-up" data-aos-delay="50">
            <div class="about-text" data-aos="fade-right" data-aos-delay="70">
                <h2>Welcome to B.S.D.L.V. Inter College</h2>
                <p>Established in 2016, B.S.D.L.V. Inter College has been a beacon of quality education in the Mohddinpur Naibasti, Madhoganj region of Hardoi. Our institution is committed to providing holistic education that nurtures not only academic excellence but also character development.</p>
                <p>With a dedicated team of experienced educators and state-of-the-art facilities, we strive to create an environment where every student can discover their potential and develop into responsible citizens.</p>
                <p>Our curriculum is designed to balance academic rigor with co-curricular activities, ensuring the all-round development of our students.</p>
            </div>
            <div class="about-image" data-aos="fade-left" data-aos-delay="100">
                <img src="image/1.jpeg" alt="SDLV Inter College Campus">
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     PRINCIPAL'S MESSAGE
     ============================================================ -->
<!-- ============================================================
     PRINCIPAL'S MESSAGE — Premium Editorial Section
     Preserves: image path, name, role, message content
     ============================================================ -->
<section class="principal-message" id="principal-message" aria-labelledby="principal-title">

    <!-- Decorative background -->
    <div class="principal-message__bg" aria-hidden="true">
        <span class="principal-message__circle"></span>
        <span class="principal-message__quote-bg">"</span>
    </div>

    <div class="container">

        <!-- Section Header -->
        <div class="principal-message__head" data-aos="fade-up">
            <span class="principal-message__eyebrow">
                <span class="principal-message__eyebrow-dot" aria-hidden="true"></span>
                A Message From Our Leadership
            </span>
            <h2 class="principal-message__title" id="principal-title">Principal's Message</h2>
            <span class="principal-message__divider" aria-hidden="true"></span>
            <p class="principal-message__subtitle">
                Guiding every student towards knowledge, character and a brighter future.
            </p>
        </div>

        <!-- Two-column layout -->
        <div class="principal-message__layout">

            <!-- LEFT: Portrait -->
            <div class="principal-portrait" data-aos="fade-right" data-aos-delay="80">
                <span class="principal-portrait__decor" aria-hidden="true"></span>
                <span class="principal-portrait__quote-mark" aria-hidden="true">"</span>

                <div class="principal-portrait__frame">
                    <img
                        src="{{ asset('image/principal-photo.jpg') }}"
                        alt="Mrs. Manju Kumari, Principal of B.S.D.L.V. Inter College"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="principal-portrait__fallback" aria-hidden="true">
                        <i class="fas fa-user-tie"></i>
                        <span>Principal</span>
                    </div>

                    <!-- Nameplate -->
                    <div class="principal-portrait__nameplate">
                        <h3 class="principal-portrait__name">Mrs. Manju Kumari</h3>
                        <p class="principal-portrait__role">Principal, B.S.D.L.V. Inter College</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Message -->
            <div class="principal-message__content" data-aos="fade-left" data-aos-delay="150">
                <span class="principal-message__quote-icon" aria-hidden="true">"</span>

                <span class="principal-message__label">Words of Wisdom</span>

                <h3 class="principal-message__greeting">Dear Students, Parents, and Well-wishers,</h3>

                <div class="principal-message__body">
                    <p>
                        It gives me immense pleasure to welcome you to B.S.D.L.V. Inter College,
                        an institution that has been shaping young minds since 2016. Our commitment
                        to excellence in education is reflected in our consistent 100% results and
                        the holistic development of our students.
                    </p>
                    <p>
                        At B.S.D.L.V.I., we believe that education is not just about academic
                        achievement but about nurturing responsible, compassionate, and well-rounded
                        individuals. Our dedicated faculty works tirelessly to create a learning
                        environment that encourages curiosity, critical thinking, and creativity.
                    </p>
                    <p>
                        We take pride in our state-of-the-art facilities, including smart classrooms,
                        well-equipped laboratories, a comprehensive library, and spaces for sports
                        and cultural activities. These resources, combined with our innovative
                        teaching methodologies, ensure that our students receive a world-class education.
                    </p>
                    <p>
                        I invite you to explore our website to learn more about our programs,
                        facilities, and the vibrant life at B.S.D.L.V. Inter College. Together,
                        let us continue our journey towards excellence in education.
                    </p>
                </div>

                <div class="principal-message__signature">
                    <span class="principal-message__signature-line" aria-hidden="true"></span>
                    <p class="principal-message__signature-text">
                        <strong>Mrs. Manju Kumari</strong>
                        <em>Principal, B.S.D.L.V. Inter College</em>
                    </p>
                </div>

                <span class="principal-message__badge">
                    <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                    Inspiring Young Minds Since 2016
                </span>
            </div>
        </div>
    </div>
</section><!-- ============================================================
     MANAGER'S MESSAGE
     ============================================================ -->
<!-- ============================================================
     MANAGER'S MESSAGE — Premium Editorial Section
     Preserves: image path, name, role, message content
     ============================================================ -->
<section class="manager-message" id="manager-message" aria-labelledby="manager-title">

    <!-- Decorative background -->
    <div class="manager-message__bg" aria-hidden="true">
        <span class="manager-message__circle"></span>
        <span class="manager-message__quote-bg">"</span>
    </div>

    <div class="container">

        <!-- Section Header -->
        <div class="manager-message__head" data-aos="fade-up">
            <span class="manager-message__eyebrow">
                <span class="manager-message__eyebrow-dot" aria-hidden="true"></span>
                Leadership &amp; Vision
            </span>
            <h2 class="manager-message__title" id="manager-title">Manager's Message</h2>
            <span class="manager-message__divider" aria-hidden="true"></span>
            <p class="manager-message__subtitle">
                Building a stronger educational future through commitment, care and collaboration.
            </p>
        </div>

        <!-- Two-column layout -->
        <div class="manager-message__layout">

            <!-- LEFT: Message -->
            <div class="manager-message__content" data-aos="fade-right" data-aos-delay="80">
                <span class="manager-message__quote-icon" aria-hidden="true">"</span>

                <h3 class="manager-message__greeting">Dear Students and Parents,</h3>

                <div class="manager-message__body">
                    <p>
                        As the manager of B.S.D.L.V. Inter College, it is my privilege to oversee the
                        administrative and operational aspects of our institution, ensuring that we
                        provide the best possible environment for learning and growth.
                    </p>
                    <p>
                        Our college is committed to maintaining high standards in all areas, from
                        infrastructure to academic delivery. We continuously invest in upgrading our
                        facilities and resources to meet the evolving needs of education in the 21st century.
                    </p>
                    <p>
                        I work closely with our principal, teaching staff, and support teams to create
                        a safe, inclusive, and stimulating environment where every student can thrive.
                        Our focus remains on providing quality education that prepares students not
                        just for examinations, but for life.
                    </p>
                    <p>
                        I encourage parents to actively participate in their children's educational
                        journey and welcome your feedback and suggestions for further improvement
                        of our institution.
                    </p>
                </div>

                <div class="manager-message__signature">
                    <span class="manager-message__signature-line" aria-hidden="true"></span>
                    <p class="manager-message__signature-text">
                        <strong>Mr. Phoolchandra Verma</strong>
                        <em>Manager, B.S.D.L.V. Inter College</em>
                    </p>
                </div>
            </div>

            <!-- RIGHT: Portrait -->
            <div class="manager-portrait" data-aos="fade-left" data-aos-delay="150">
                <span class="manager-portrait__decor" aria-hidden="true"></span>
                <span class="manager-portrait__quote-mark" aria-hidden="true">"</span>

                <div class="manager-portrait__frame">
                    <img
                        src="{{ asset('image/manager-photo.jpg') }}"
                        alt="Mr. Phoolchandra Verma, Manager of B.S.D.L.V. Inter College"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="manager-portrait__fallback" aria-hidden="true">
                        <i class="fas fa-user-tie"></i>
                        <span>Manager</span>
                    </div>

                    <!-- Nameplate -->
                    <div class="manager-portrait__nameplate">
                        <h3 class="manager-portrait__name">Mr. Phoolchandra Verma</h3>
                        <p class="manager-portrait__role">Manager, B.S.D.L.V. Inter College</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================================================
     FACILITIES
     ============================================================ -->
<!-- ============================================================
     OUR FACILITIES — Premium Editorial Section
     Preserves all image paths, descriptions & functionality
     ============================================================ -->
<section class="section facilities" id="facilities" aria-labelledby="facilities-title">

    <!-- Decorative Background Elements -->
    <div class="facilities__bg" aria-hidden="true">
        <span class="facilities__circle facilities__circle--1"></span>
        <span class="facilities__circle facilities__circle--2"></span>
    </div>

    <div class="container">

        <!-- Section Header -->
        <div class="facilities__head" data-aos="fade-up">
            <span class="facilities__eyebrow">
                <span class="facilities__eyebrow-dot" aria-hidden="true"></span>
                Campus &amp; Learning
            </span>

            <h2 class="facilities__title" id="facilities-title">
                Our Facilities
            </h2>

            <span class="facilities__divider" aria-hidden="true"></span>

            <p class="facilities__subtitle">
                A better environment for learning, creativity, and all-round development.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="facilities__grid">

            <!-- 1. Smart Classroom -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="100">
                <div class="facility-card__image-wrap">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                         alt="Smart Classroom at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Smart Classroom</h3>
                    <p class="facility-card__desc">
                        Modern technology-enabled learning environment with interactive boards and digital resources.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

            <!-- 2. Science Lab -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="150">
                <div class="facility-card__image-wrap">
                    <img src="{{ asset('image/12.jpeg') }}"
                         alt="Science Laboratory at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-flask"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Science Lab</h3>
                    <p class="facility-card__desc">
                        Well-equipped laboratory for practical learning and scientific experiments.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

            <!-- 3. Library -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="200">
                <div class="facility-card__image-wrap">
                    <img src="{{ asset('image/10.jpeg') }}"
                         alt="Library at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-book"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Library</h3>
                    <p class="facility-card__desc">
                        Collection of 5000+ books for comprehensive learning and research.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

            <!-- 4. Computer Lab -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="250">
                <div class="facility-card__image-wrap">
                    <img src="https://images.unsplash.com/photo-1591696205602-2f950c417dad?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                         alt="Computer Lab at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-desktop"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Computer Lab</h3>
                    <p class="facility-card__desc">
                        Modern computing facilities for digital literacy and IT education.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

            <!-- 5. Sports Ground -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="300">
                <div class="facility-card__image-wrap">
                    <img src="{{ asset('image/2.jpeg') }}"
                         alt="Sports Ground at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-futbol"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Sports Ground</h3>
                    <p class="facility-card__desc">
                        Spacious ground for various sports activities and physical education.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

            <!-- 6. Auditorium -->
            <article class="facility-card" data-aos="fade-up" data-aos-delay="350">
                <div class="facility-card__image-wrap">
                    <img src="https://images.unsplash.com/photo-1492684223066-e81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                         alt="Auditorium at B.S.D.L.V. Inter College"
                         class="facility-card__image"
                         loading="lazy">
                    <div class="facility-card__overlay" aria-hidden="true"></div>
                    <span class="facility-card__badge">
                        <i class="fas fa-theater-masks"></i>
                    </span>
                </div>
                <div class="facility-card__content">
                    <h3 class="facility-card__title">Auditorium</h3>
                    <p class="facility-card__desc">
                        Modern auditorium for cultural events, seminars, and presentations.
                    </p>
                    <span class="facility-card__arrow" aria-hidden="true">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </div>
            </article>

        </div>
    </div>
</section>
<!-- ============================================================
     GALLERY
     ============================================================ -->
<!-- ============================================================
     OUR PHOTO GALLERY — Premium Editorial Masonry
     Preserves all image paths, captions & functionality
     ============================================================ -->
<section class="section gallery" id="gallery" aria-labelledby="gallery-title">

    <div class="gallery__bg" aria-hidden="true">
        <span class="gallery__circle"></span>
    </div>

    <div class="container">

        <!-- Header -->
        <div class="gallery__head" data-aos="fade-up">
            <span class="gallery__eyebrow">
                <span class="gallery__eyebrow-dot" aria-hidden="true"></span>
                Life at B.S.D.L.V.
            </span>

            <h2 class="gallery__title" id="gallery-title">
                Our Photo Gallery
            </h2>

            <span class="gallery__divider" aria-hidden="true"></span>

            <p class="gallery__subtitle">
                Capturing memories, celebrating achievements, and showcasing life on our campus.
            </p>
        </div>

        <!-- Masonry Grid -->
        <div class="gallery__grid" id="galleryGrid">

            <!-- 1 -->
            <button type="button"
                    class="gallery__item gallery__item--large"
                    data-index="0"
                    data-src="{{ asset('image/1.jpeg') }}"
                    data-caption="Annual Day Celebration"
                    aria-label="View Annual Day Celebration image">
                <img src="{{ asset('image/1.jpeg') }}"
                     alt="Annual Day Celebration at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Annual Day Celebration</span>
            </button>

            <!-- 2 -->
            <button type="button"
                    class="gallery__item"
                    data-index="1"
                    data-src="{{ asset('image/2.jpeg') }}"
                    data-caption="Science Exhibition"
                    aria-label="View Science Exhibition image">
                <img src="{{ asset('image/2.jpeg') }}"
                     alt="Science Exhibition at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Science Exhibition</span>
            </button>

            <!-- 3 -->
            <button type="button"
                    class="gallery__item"
                    data-index="2"
                    data-src="{{ asset('image/3.jpeg') }}"
                    data-caption="Computer Lab Session"
                    aria-label="View Computer Lab Session image">
                <img src="{{ asset('image/3.jpeg') }}"
                     alt="Computer Lab Session at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Computer Lab Session</span>
            </button>

            <!-- 4 -->
            <button type="button"
                    class="gallery__item"
                    data-index="3"
                    data-src="{{ asset('image/4.jpeg') }}"
                    data-caption="Sports Day"
                    aria-label="View Sports Day image">
                <img src="{{ asset('image/4.jpeg') }}"
                     alt="Sports Day at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Sports Day</span>
            </button>

            <!-- 5 -->
            <button type="button"
                    class="gallery__item gallery__item--large"
                    data-index="4"
                    data-src="{{ asset('image/5.jpeg') }}"
                    data-caption="Interactive Classroom"
                    aria-label="View Interactive Classroom image">
                <img src="{{ asset('image/5.jpeg') }}"
                     alt="Interactive Classroom at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Interactive Classroom</span>
            </button>

            <!-- 6 -->
            <button type="button"
                    class="gallery__item"
                    data-index="5"
                    data-src="{{ asset('image/6.jpeg') }}"
                    data-caption="Library Reading Session"
                    aria-label="View Library Reading Session image">
                <img src="{{ asset('image/6.jpeg') }}"
                     alt="Library Reading Session at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Library Reading Session</span>
            </button>

            <!-- 7 -->
            <button type="button"
                    class="gallery__item"
                    data-index="6"
                    data-src="{{ asset('image/7.jpeg') }}"
                    data-caption="Campus View"
                    aria-label="View Campus View image">
                <img src="{{ asset('image/7.jpeg') }}"
                     alt="Campus View at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Campus View</span>
            </button>

            <!-- 8 -->
            <button type="button"
                    class="gallery__item"
                    data-index="7"
                    data-src="{{ asset('image/8.jpeg') }}"
                    data-caption="Student Activities"
                    aria-label="View Student Activities image">
                <img src="{{ asset('image/8.jpeg') }}"
                     alt="Student Activities at B.S.D.L.V. Inter College"
                     loading="lazy">
                <span class="gallery__overlay" aria-hidden="true"></span>
                <span class="gallery__icon" aria-hidden="true">
                    <i class="fas fa-expand-alt"></i>
                </span>
                <span class="gallery__caption">Student Activities</span>
            </button>

        </div>
    </div>

    <!-- ============================================================
         LIGHTBOX
         ============================================================ -->
    <div class="gallery-lightbox" id="galleryLightbox" role="dialog" aria-modal="true" aria-label="Gallery image viewer" hidden>
        <div class="gallery-lightbox__backdrop" data-close></div>

        <button type="button" class="gallery-lightbox__close" id="galleryClose" aria-label="Close gallery">
            <i class="fas fa-times"></i>
        </button>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" id="galleryPrev" aria-label="Previous image">
            <i class="fas fa-chevron-left"></i>
        </button>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" id="galleryNext" aria-label="Next image">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="gallery-lightbox__stage">
            <div class="gallery-lightbox__image-wrap">
                <img class="gallery-lightbox__image" id="galleryImage" src="" alt="">
            </div>
            <div class="gallery-lightbox__meta">
                <span class="gallery-lightbox__caption" id="galleryCaption"></span>
                <span class="gallery-lightbox__counter" id="galleryCounter">01 / 08</span>
            </div>
        </div>
    </div>

</section><!-- ============================================================
     ANNOUNCEMENTS
     ============================================================ -->
<!-- ============================================================
     LATEST ANNOUNCEMENTS — Premium Editorial Dashboard
     Preserves all content, dates & icons exactly
     ============================================================ -->
<section class="announcements" id="announcements" aria-labelledby="announcements-title">

    <!-- Decorative background -->
    <div class="announcements__bg" aria-hidden="true">
        <span class="announcements__circle"></span>
    </div>

    <div class="container">

        <!-- Header -->
        <div class="announcements__head" data-aos="fade-up">
            <span class="announcements__eyebrow">
                <span class="announcements__eyebrow-dot" aria-hidden="true"></span>
                Campus Updates
            </span>

            <h2 class="announcements__title" id="announcements-title">
                Latest Announcements
            </h2>

            <span class="announcements__divider" aria-hidden="true"></span>

            <p class="announcements__subtitle">
                Stay informed about important notices, academic updates, and upcoming college events.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="announcements__grid">

            <!-- 1. Annual Sports Day -->
            <article class="announcement-card"
                     data-aos="fade-up"
                     data-aos-delay="100"
                     aria-labelledby="ann-1-title">
                <div class="announcement-card__top">
                    <span class="announcement-card__icon announcement-card__icon--event" aria-hidden="true">
                        <i class="fas fa-bullhorn"></i>
                    </span>
                    <span class="announcement-card__category">Event</span>
                </div>

                <div class="announcement-card__body">
                    <h3 class="announcement-card__title" id="ann-1-title">
                        Annual Sports Day
                    </h3>
                    <p class="announcement-card__desc">
                        Annual sports day will be held on 15th December 2023. All students are requested to participate.
                    </p>
                </div>

                <div class="announcement-card__footer">
                    <span class="announcement-card__date">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                        Posted on November 10, 2023
                    </span>
                    <span class="announcement-card__accent" aria-hidden="true"></span>
                </div>
            </article>

            <!-- 2. Parent-Teacher Meeting -->
            <article class="announcement-card"
                     data-aos="fade-up"
                     data-aos-delay="200"
                     aria-labelledby="ann-2-title">
                <div class="announcement-card__top">
                    <span class="announcement-card__icon announcement-card__icon--meeting" aria-hidden="true">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                    <span class="announcement-card__category">Meeting</span>
                </div>

                <div class="announcement-card__body">
                    <h3 class="announcement-card__title" id="ann-2-title">
                        Parent-Teacher Meeting
                    </h3>
                    <p class="announcement-card__desc">
                        The next parent-teacher meeting is scheduled for 20th November 2023.
                    </p>
                </div>

                <div class="announcement-card__footer">
                    <span class="announcement-card__date">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                        Posted on November 5, 2023
                    </span>
                    <span class="announcement-card__accent" aria-hidden="true"></span>
                </div>
            </article>

            <!-- 3. Board Exam Results -->
            <article class="announcement-card"
                     data-aos="fade-up"
                     data-aos-delay="300"
                     aria-labelledby="ann-3-title">
                <div class="announcement-card__top">
                    <span class="announcement-card__icon announcement-card__icon--achievement" aria-hidden="true">
                        <i class="fas fa-award"></i>
                    </span>
                    <span class="announcement-card__category">Achievement</span>
                </div>

                <div class="announcement-card__body">
                    <h3 class="announcement-card__title" id="ann-3-title">
                        Board Exam Results
                    </h3>
                    <p class="announcement-card__desc">
                        Congratulations to all students for achieving 100% results in board examinations.
                    </p>
                </div>

                <div class="announcement-card__footer">
                    <span class="announcement-card__date">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                        Posted on October 25, 2023
                    </span>
                    <span class="announcement-card__accent" aria-hidden="true"></span>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
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
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-text">
                            <h4>Our Address</h4>
                            <p>Mohddinpur Naibasti, Madhoganj, Hardoi, Uttar Pradesh - 241302</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div class="contact-text">
                            <h4>Phone Number</h4>
                            <p>+91-8081096231</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-text">
                            <h4>Email Address</h4>
                            <p>info@sdvlcollege.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-clock"></i></div>
                        <div class="contact-text">
                            <h4>Working Hours</h4>
                            <p>Monday - Saturday: 8:00 AM - 3:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/codelikevivek/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="http://www.youtube.com/@vivekpatel-8081" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3555.238900909577!2d80.132966!3d27.0630224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDAzJzQ2LjkiTiA4MMKwMDcnNTguNyJF!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" allowfullscreen="" loading="lazy" title="College Location Map"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     PREMIUM FAB — LEFT side, opens UPWARD
     ============================================================ -->
<div class="fab-container" id="fabContainer">

    <button type="button"
            class="fab-main"
            id="fabMain"
            aria-label="Open quick contact menu"
            aria-expanded="false"
            aria-controls="fabActions"
            title="Chat with us">
        <i class="fas fa-comment-dots fab-icon-comment" aria-hidden="true"></i>
        <i class="fas fa-times fab-icon-close" aria-hidden="true"></i>
        <span class="fab-tooltip" aria-hidden="true">Chat with us</span>
    </button>

    <div class="fab-actions" id="fabActions" role="menu" aria-label="Quick contact options">

        <a href="https://chat.whatsapp.com/FdwFUDqSlCxCCAL6ah6NlF"
           class="fab-item whatsapp"
           target="_blank" rel="noopener noreferrer"
           role="menuitem"
           aria-label="Chat on WhatsApp"
           data-fab-action>
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
            <span class="fab-item-tooltip" aria-hidden="true">WhatsApp</span>
        </a>

        <a href="tel:+918081096231"
           class="fab-item call"
           role="menuitem"
           aria-label="Call us at +91 80810 96231"
           data-fab-action>
            <i class="fas fa-phone-alt" aria-hidden="true"></i>
            <span class="fab-item-tooltip" aria-hidden="true">Call Us</span>
        </a>

        <a href="https://t.me/IT_Technology50"
           class="fab-item telegram"
           target="_blank" rel="noopener noreferrer"
           role="menuitem"
           aria-label="Join us on Telegram"
           data-fab-action>
            <i class="fab fa-telegram-plane" aria-hidden="true"></i>
            <span class="fab-item-tooltip" aria-hidden="true">Telegram</span>
        </a>

    </div>
</div>

<!-- Back to Top (RIGHT) -->
<button class="back-to-top" id="backToTop" aria-label="Back to top">
    <i class="fas fa-chevron-up"></i>
</button>

@include('footer')

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    /* ============================================================
       1. AOS
       ============================================================ */
    if (window.AOS) {
        AOS.init({
            duration: 900,
            once: true,
            offset: 60,
            easing: 'ease-out-cubic',
            disable: function () {
                return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            }
        });
    }

    /* ============================================================
       2. HERO SLIDER
       ============================================================ */
    (function () {
        const sliderEl = document.getElementById('slider');
        if (!sliderEl) return;

        const slides = sliderEl.querySelectorAll('.slide');
        const dotsBox = document.getElementById('sliderDots');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const progress = document.getElementById('sliderProgressBar');
        const container = sliderEl.closest('.slider-container');
        const total = slides.length;
        const AUTO_MS = 7000;
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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
                dot.addEventListener('click', () => { goTo(i); restartAuto(); });
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

        function stopAuto() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }
        function startAuto() {
            stopAuto();
            if (reduced || paused) return;
            autoTimer = setInterval(nextSlide, AUTO_MS);
        }
        function restartAuto() { stopAuto(); startAuto(); }

        if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); restartAuto(); });
        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); restartAuto(); });

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
    })();

    /* ============================================================
       3. PREMIUM FAB
       ============================================================ */
    (function () {
        'use strict';
        const container = document.getElementById('fabContainer');
        const mainBtn   = document.getElementById('fabMain');
        const actions   = document.getElementById('fabActions');
        if (!container || !mainBtn || !actions) return;

        function openFab() {
            container.classList.add('is-open');
            mainBtn.setAttribute('aria-expanded', 'true');
            mainBtn.setAttribute('aria-label', 'Close quick contact menu');
            const firstAction = actions.querySelector('.fab-item');
            if (firstAction) setTimeout(() => firstAction.focus({ preventScroll: true }), 220);
        }
        function closeFab(returnFocus) {
            container.classList.remove('is-open');
            mainBtn.setAttribute('aria-expanded', 'false');
            mainBtn.setAttribute('aria-label', 'Open quick contact menu');
            if (returnFocus) mainBtn.focus({ preventScroll: true });
        }
        function toggleFab() {
            if (container.classList.contains('is-open')) closeFab(false);
            else openFab();
        }

        mainBtn.addEventListener('click', function (e) { e.stopPropagation(); toggleFab(); });
        actions.querySelectorAll('[data-fab-action]').forEach(function (item) {
            item.addEventListener('click', function () { setTimeout(() => closeFab(false), 120); });
        });
        document.addEventListener('click', function (e) {
            if (!container.classList.contains('is-open')) return;
            if (!container.contains(e.target)) closeFab(false);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && container.classList.contains('is-open')) closeFab(true);
        });
        actions.addEventListener('keydown', function (e) {
            const items = Array.from(actions.querySelectorAll('.fab-item'));
            const currentIndex = items.indexOf(document.activeElement);
            if (currentIndex === -1) return;
            if (e.key === 'ArrowUp' || e.key === 'ArrowDown') {
                e.preventDefault();
                const dir = e.key === 'ArrowDown' ? 1 : -1;
                const next = (currentIndex + dir + items.length) % items.length;
                items[next].focus();
            }
        });
    })();

    /* ============================================================
       4. BACK TO TOP
       ============================================================ */
    (function () {
        const btn = document.getElementById('backToTop');
        if (!btn) return;
        window.addEventListener('scroll', () => {
            btn.classList.toggle('active', window.scrollY > 300);
        }, { passive: true });
        btn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    })();

    /* ============================================================
       5. ANCHOR SCROLL
       ============================================================ */
    (function () {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                const id = this.getAttribute('href');
                if (!id || id === '#') return;
                const target = document.querySelector(id);
                if (!target) return;
                e.preventDefault();
                const headerH = 90;
                const y = target.getBoundingClientRect().top + window.scrollY - headerH;
                window.scrollTo({ top: y, behavior: 'smooth' });
            });
        });
    })();


    /* ============================================================
   SCHOOL STATS — Animated counters with IntersectionObserver
   Runs only once when section enters viewport
   ============================================================ */
(function () {
    'use strict';

    var section = document.getElementById('school-stats');
    if (!section) return;

    var counters = section.querySelectorAll('.school-stat-card__count');
    if (!counters.length) return;

    var started = false;

    function animateCounter(el) {
        var target = parseFloat(el.dataset.target);
        var suffix = el.dataset.suffix || '';
        if (isNaN(target)) { el.textContent = '0' + suffix; return; }

        var duration = 1800;
        var startTime = null;
        var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (reduced) {
            el.textContent = target + suffix;
            return;
        }

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            // easeOutCubic for smooth deceleration
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(eased * target);

            el.textContent = current + suffix;

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = target + suffix;
            }
        }
        requestAnimationFrame(step);
    }

    function startCounters() {
        if (started) return;
        started = true;
        counters.forEach(function (el, i) {
            setTimeout(function () { animateCounter(el); }, i * 120);
        });
    }

    if (!('IntersectionObserver' in window)) {
        startCounters();
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                startCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.25 });

    observer.observe(section);
})();

/* ============================================================
   OUR PHOTO GALLERY — Lightbox + Underline
   ============================================================ */
(function () {
    'use strict';

    var gallerySection = document.getElementById('gallery');
    var grid = document.getElementById('galleryGrid');
    var lightbox = document.getElementById('galleryLightbox');
    if (!gallerySection || !grid || !lightbox) return;

    var items = Array.prototype.slice.call(grid.querySelectorAll('.gallery__item'));
    var imgEl = document.getElementById('galleryImage');
    var captionEl = document.getElementById('galleryCaption');
    var counterEl = document.getElementById('galleryCounter');
    var closeBtn = document.getElementById('galleryClose');
    var prevBtn = document.getElementById('galleryPrev');
    var nextBtn = document.getElementById('galleryNext');

    var current = 0;
    var total = items.length;
    var lastFocused = null;
    var isOpen = false;

    /* ---- Underline reveal ---- */
    if ('IntersectionObserver' in window) {
        var underlineObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    gallerySection.classList.add('is-visible');
                    underlineObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        underlineObserver.observe(gallerySection);
    } else {
        gallerySection.classList.add('is-visible');
    }

    /* ---- Helpers ---- */
    function pad(num) {
        return num < 10 ? '0' + num : '' + num;
    }

    function updateLightbox() {
        var item = items[current];
        if (!item) return;
        var src = item.getAttribute('data-src');
        var caption = item.getAttribute('data-caption') || '';
        imgEl.src = src;
        imgEl.alt = caption;
        captionEl.textContent = caption;
        counterEl.textContent = pad(current + 1) + ' / ' + pad(total);
    }

    function openLightbox(index) {
        current = index;
        isOpen = true;
        lastFocused = document.activeElement;
        updateLightbox();
        lightbox.hidden = false;
        // Force reflow to trigger transition
        void lightbox.offsetWidth;
        lightbox.classList.add('is-open');
        document.body.classList.add('gallery-lightbox-open');
        // Focus close button
        setTimeout(function () {
            closeBtn.focus();
        }, 50);
    }

    function closeLightbox() {
        isOpen = false;
        lightbox.classList.remove('is-open');
        document.body.classList.remove('gallery-lightbox-open');
        setTimeout(function () {
            lightbox.hidden = true;
            imgEl.src = '';
            imgEl.alt = '';
            if (lastFocused && typeof lastFocused.focus === 'function') {
                lastFocused.focus();
            }
        }, 350);
    }

    function showPrev() {
        current = (current - 1 + total) % total;
        updateLightbox();
    }

    function showNext() {
        current = (current + 1) % total;
        updateLightbox();
    }

    /* ---- Bind item clicks ---- */
    items.forEach(function (item, i) {
        item.addEventListener('click', function () {
            openLightbox(i);
        });
    });

    /* ---- Lightbox controls ---- */
    closeBtn.addEventListener('click', closeLightbox);
    prevBtn.addEventListener('click', showPrev);
    nextBtn.addEventListener('click', showNext);

    /* ---- Backdrop click ---- */
    var backdrop = lightbox.querySelector('[data-close]');
    if (backdrop) {
        backdrop.addEventListener('click', closeLightbox);
    }

    /* ---- Keyboard ---- */
    document.addEventListener('keydown', function (e) {
        if (!isOpen) return;
        if (e.key === 'Escape') {
            e.preventDefault();
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            showPrev();
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            showNext();
        } else if (e.key === 'Tab') {
            // Simple focus trap
            var focusable = [closeBtn, prevBtn, nextBtn];
            var idx = focusable.indexOf(document.activeElement);
            if (idx === -1) return;
            e.preventDefault();
            var dir = e.shiftKey ? -1 : 1;
            var next = (idx + dir + focusable.length) % focusable.length;
            focusable[next].focus();
        }
    });

    /* ---- Touch swipe ---- */
    var touchStartX = 0;
    var touchEndX = 0;
    lightbox.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    lightbox.addEventListener('touchend', function (e) {
        touchEndX = e.changedTouches[0].screenX;
        var diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) showNext();
            else showPrev();
        }
    }, { passive: true });
})();




/* ============================================================
   LATEST ANNOUNCEMENTS — underline reveal on scroll
   ============================================================ */
(function () {
    var section = document.getElementById('announcements');
    if (!section) return;

    if (!('IntersectionObserver' in window)) {
        section.classList.add('is-visible');
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                section.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    observer.observe(section);
})();
</script>
</body>
</html>
