<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Book Loader</title>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-clr: #3B82F6;
            --secondary-clr: #1E293B;
            --accent-gold: #FCD34D;
            --bg-clr: #F8FAFC;
            --pure-white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Page Loader Overlay */
        .page-loader {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.98) 0%, rgba(59, 130, 246, 0.95) 100%);
            backdrop-filter: blur(10px);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Animated background particles */
        .page-loader::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(252, 211, 77, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            animation: particleMove 20s ease-in-out infinite;
        }

        @keyframes particleMove {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-50px, 50px) rotate(120deg); }
            66% { transform: translate(50px, -50px) rotate(240deg); }
        }

        /* Enhanced 3D Book Loader */
        .book-loader-container {
            position: relative;
            z-index: 1;
            perspective: 1500px;
            perspective-origin: center;
        }

        .book-3d {
            position: relative;
            width: 120px;
            height: 160px;
            transform-style: preserve-3d;
            animation: bookRotate 3s ease-in-out infinite;
        }

        @keyframes bookRotate {
            0% {
                transform: rotateY(0deg) rotateX(0deg);
            }
            25% {
                transform: rotateY(90deg) rotateX(-10deg);
            }
            50% {
                transform: rotateY(180deg) rotateX(0deg);
            }
            75% {
                transform: rotateY(270deg) rotateX(10deg);
            }
            100% {
                transform: rotateY(360deg) rotateX(0deg);
            }
        }

        /* Book Cover - Front */
        .book-cover {
            position: absolute;
            width: 120px;
            height: 160px;
            background: linear-gradient(135deg, var(--primary-clr) 0%, #2563EB 100%);
            border-radius: 8px;
            box-shadow: 
                0 10px 40px rgba(59, 130, 246, 0.4),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
            transform: translateZ(15px);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(252, 211, 77, 0.3);
        }

        .book-cover::before {
            content: '📚';
            font-size: 3rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        /* Book Cover - Back */
        .book-back {
            position: absolute;
            width: 120px;
            height: 160px;
            background: linear-gradient(135deg, #1e40af 0%, var(--secondary-clr) 100%);
            border-radius: 8px;
            transform: translateZ(-15px) rotateY(180deg);
            border: 2px solid rgba(252, 211, 77, 0.2);
        }

        /* Book Spine */
        .book-spine {
            position: absolute;
            width: 30px;
            height: 160px;
            background: linear-gradient(to right, #1e3a8a, #2563EB);
            transform: rotateY(90deg) translateZ(45px);
            border-radius: 8px 0 0 8px;
            box-shadow: inset -2px 0 8px rgba(0, 0, 0, 0.3);
        }

        /* Book Pages */
        .book-pages {
            position: absolute;
            width: 114px;
            height: 154px;
            background: linear-gradient(to right, #f1f5f9 0%, #e2e8f0 50%, #f1f5f9 100%);
            transform: translateZ(12px);
            border-radius: 0 6px 6px 0;
            left: 3px;
            top: 3px;
            box-shadow: 
                inset 2px 0 4px rgba(0, 0, 0, 0.1),
                2px 0 8px rgba(0, 0, 0, 0.1);
        }

        /* Page lines effect */
        .book-pages::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                to bottom,
                transparent 0px,
                transparent 8px,
                rgba(59, 130, 246, 0.05) 8px,
                rgba(59, 130, 246, 0.05) 9px
            );
            border-radius: inherit;
        }

        /* Animated page flip effect */
        .page-flip {
            position: absolute;
            width: 57px;
            height: 154px;
            background: linear-gradient(to left, #fff 0%, #f1f5f9 100%);
            transform-origin: left center;
            transform: translateZ(13px) translateX(60px);
            border-radius: 0 6px 6px 0;
            animation: pageFlip 3s ease-in-out infinite;
            box-shadow: -2px 0 8px rgba(0, 0, 0, 0.15);
        }

        @keyframes pageFlip {
            0%, 100% {
                transform: translateZ(13px) translateX(60px) rotateY(0deg);
                opacity: 1;
            }
            45%, 55% {
                transform: translateZ(13px) translateX(60px) rotateY(-180deg);
                opacity: 0.8;
            }
        }

        /* Loader Text */
        .loader-text {
            margin-top: 3rem;
            color: var(--pure-white);
            font-weight: 600;
            font-size: 1.3rem;
            text-align: center;
            animation: textPulse 2s ease-in-out infinite;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        @keyframes textPulse {
            0%, 100% {
                opacity: 1;
                transform: translateY(0);
            }
            50% {
                opacity: 0.7;
                transform: translateY(-5px);
            }
        }

        /* Loading dots */
        .loading-dots {
            display: flex;
            gap: 8px;
            margin-top: 1rem;
            z-index: 1;
        }

        .dot {
            width: 10px;
            height: 10px;
            background: var(--accent-gold);
            border-radius: 50%;
            animation: dotBounce 1.4s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(252, 211, 77, 0.5);
        }

        .dot:nth-child(1) { animation-delay: 0s; }
        .dot:nth-child(2) { animation-delay: 0.2s; }
        .dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes dotBounce {
            0%, 60%, 100% {
                transform: translateY(0);
            }
            30% {
                transform: translateY(-15px);
            }
        }

        /* Progress bar */
        .loader-progress {
            position: absolute;
            bottom: 80px;
            width: 300px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            overflow: hidden;
            z-index: 1;
        }

        .loader-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent-gold), var(--primary-clr));
            border-radius: 2px;
            animation: progressLoad 2s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(252, 211, 77, 0.5);
        }

        @keyframes progressLoad {
            0% {
                width: 0%;
                opacity: 0.5;
            }
            50% {
                width: 70%;
                opacity: 1;
            }
            100% {
                width: 100%;
                opacity: 0.5;
            }
        }

        /* Fade out animation override */
        .page-loader.animate__fadeOut {
            animation: customFadeOut 0.8s ease-out forwards;
        }

        @keyframes customFadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(1.1);
            }
        }

        /* Demo content */
        .content {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .content h1 {
            font-size: 2.5rem;
            color: var(--secondary-clr);
            margin-bottom: 1rem;
        }

        .content p {
            font-size: 1.1rem;
            color: var(--secondary-clr);
            opacity: 0.7;
            line-height: 1.6;
        }

        @media (max-width: 576px) {
            .book-3d {
                width: 100px;
                height: 140px;
            }

            .book-cover, .book-back {
                width: 100px;
                height: 140px;
            }

            .book-pages {
                width: 94px;
                height: 134px;
            }

            .loader-text {
                font-size: 1.1rem;
                padding: 0 1rem;
            }

            .loader-progress {
                width: 250px;
            }
        }
    </style>
</head>
<body>
    
    <!-- Enhanced Page Loader -->
    <div class="page-loader animate__animated">
        <div class="book-loader-container">
            <div class="book-3d">
                <div class="book-cover"></div>
                <div class="book-back"></div>
                <div class="book-spine"></div>
                <div class="book-pages"></div>
                <div class="page-flip"></div>
            </div>
        </div>
        
        <h4 class="loader-text">Loading your library...</h4>
        
        <div class="loading-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <div class="loader-progress">
            <div class="loader-progress-bar"></div>
        </div>
    </div>

    <script>
        // Enhanced page loader with smooth transition
        window.addEventListener('load', function() {
            setTimeout(function() {
                const loader = document.querySelector('.page-loader');
                loader.classList.add('animate__fadeOut');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 800); // Match with fadeOut duration
            }, 1000); // Show loader for at least 1 second
        });
    </script>
</body>
</html>