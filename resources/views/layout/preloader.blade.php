<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.S.D.L.V. Inter College</title>
            <link rel="icon" type="image/jpeg" href="image/logo.jpeg">


    <!-- Loader CSS -->
    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 999999;
            color: white;
            transition: opacity 0.5s ease;
            text-align: center;
        }

        #logoLoader {
            width: 200px;
            animation: blink 1.4s ease-in-out infinite;
            margin-bottom: 20px;
        }

        @keyframes blink {
            0% { opacity: 0.2; transform: scale(0.95); }
            50% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 0.2; transform: scale(0.95); }
        }
    </style>
</head>
<body style="overflow: hidden !important;">

    <!-- PRELOADER -->
    <div id="preloader">
        <img src="{{ asset('image/logo.jpeg') }}" id="logoLoader">
        <h1>B.S.D.L.V. Inter College</h1>
        <h3>Mohaddinpur Naibasti Madhoganj Hardoi</h3>
        <p>Loading...</p>
    </div>

    <!-- MAIN CONTENT -->
    @yield('content')

    <!-- Loader Hide Script -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const loader = document.getElementById("preloader");
        const MIN_TIME = 2000; // 3 seconds (आप बदल सकते हैं)

        const start = Date.now();

        window.onload = function () {
            const elapsed = Date.now() - start;
            const remaining = Math.max(0, MIN_TIME - elapsed);

            setTimeout(() => {
                loader.style.opacity = "0";
                document.body.style.overflow = "auto";
            }, remaining);

            setTimeout(() => {
                loader.style.display = "none";
            }, remaining + 700);
        };
    });
</script>


</body>
</html>
