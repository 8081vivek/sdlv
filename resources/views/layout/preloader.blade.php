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