<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Battery Website') }}</title>
        <meta
            name="description"
            content="Premium battery solutions with a modern 3D product showcase hero."
        >

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|plus-jakarta-sans:500,600,700,800" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --page-bg: #06131f;
                --panel: rgba(7, 19, 31, 0.55);
                --panel-strong: rgba(13, 27, 42, 0.82);
                --text-main: #eff7ff;
                --text-soft: rgba(223, 235, 248, 0.78);
                --line: rgba(255, 255, 255, 0.12);
                --accent: #7dd3fc;
                --accent-strong: #f59e0b;
                --cube-size: clamp(180px, 34vw, 320px);
                --cube-depth: calc(var(--cube-size) / 2);
                --cube-rotate-x: -18deg;
                --cube-rotate-y: -24deg;
                --mouse-x: 0px;
                --mouse-y: 0px;
                --light-x: 50%;
                --light-y: 30%;
                --face-glow: 0.95;
                --motion-blur: 0px;
            }

            * {
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: "Instrument Sans", sans-serif;
                color: var(--text-main);
                background:
                    radial-gradient(circle at top left, rgba(125, 211, 252, 0.2), transparent 30%),
                    radial-gradient(circle at 85% 20%, rgba(245, 158, 11, 0.18), transparent 24%),
                    radial-gradient(circle at 50% 100%, rgba(56, 189, 248, 0.16), transparent 26%),
                    linear-gradient(135deg, #02070d 0%, #081626 42%, #030c15 100%);
                overflow-x: hidden;
            }

            body::before,
            body::after {
                content: "";
                position: fixed;
                inset: auto;
                pointer-events: none;
                z-index: -1;
                filter: blur(70px);
                opacity: 0.85;
            }

            body::before {
                top: 8%;
                left: -10%;
                width: 32rem;
                height: 32rem;
                background: rgba(34, 211, 238, 0.18);
                animation: drift 16s ease-in-out infinite alternate;
            }

            body::after {
                right: -6%;
                bottom: -8%;
                width: 28rem;
                height: 28rem;
                background: rgba(245, 158, 11, 0.18);
                animation: drift 18s ease-in-out infinite alternate-reverse;
            }

            img {
                display: block;
                max-width: 100%;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .hero-shell {
                position: relative;
                min-height: 100vh;
                isolation: isolate;
            }

            .hero-shell::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    linear-gradient(120deg, rgba(255, 255, 255, 0.05), transparent 35%),
                    radial-gradient(circle at var(--light-x) var(--light-y), rgba(255, 255, 255, 0.12), transparent 20%);
                opacity: 0.7;
                pointer-events: none;
            }

            .hero-grid {
                width: min(1200px, calc(100% - 2rem));
                margin: 0 auto;
                min-height: 100vh;
                display: grid;
                grid-template-columns: minmax(0, 1.05fr) minmax(280px, 0.95fr);
                align-items: center;
                gap: clamp(2rem, 6vw, 5rem);
                padding: 2rem 0 4rem;
            }

            .content-panel {
                position: relative;
                padding: clamp(1.5rem, 3vw, 2.4rem);
                border: 1px solid var(--line);
                border-radius: 2rem;
                background: linear-gradient(160deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.02));
                box-shadow:
                    0 30px 80px rgba(0, 0, 0, 0.35),
                    inset 0 1px 0 rgba(255, 255, 255, 0.12);
                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 0.7rem;
                padding: 0.55rem 0.9rem;
                border-radius: 999px;
                border: 1px solid rgba(125, 211, 252, 0.24);
                background: rgba(125, 211, 252, 0.08);
                color: #c8f1ff;
                font-size: 0.82rem;
                font-weight: 600;
                letter-spacing: 0.14em;
                text-transform: uppercase;
            }

            .eyebrow::before {
                content: "";
                width: 0.55rem;
                height: 0.55rem;
                border-radius: 999px;
                background: linear-gradient(135deg, #7dd3fc, #fbbf24);
                box-shadow: 0 0 18px rgba(125, 211, 252, 0.8);
            }

            h1 {
                margin: 1.3rem 0 1rem;
                font-family: "Plus Jakarta Sans", sans-serif;
                font-size: clamp(2.9rem, 6vw, 5.4rem);
                line-height: 0.95;
                letter-spacing: -0.05em;
            }

            .title-shine {
                display: block;
                background: linear-gradient(120deg, #ffffff 15%, #bae6fd 45%, #fef3c7 95%);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .lead {
                max-width: 34rem;
                margin: 0 0 1.8rem;
                color: var(--text-soft);
                font-size: clamp(1rem, 1.4vw, 1.14rem);
                line-height: 1.75;
            }

            .hero-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 0.95rem;
                margin-bottom: 1.9rem;
            }

            .cta-button,
            .ghost-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 10.5rem;
                padding: 0.95rem 1.35rem;
                border-radius: 999px;
                font-weight: 700;
                transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease, background 180ms ease;
            }

            .cta-button {
                color: #04111d;
                background: linear-gradient(135deg, #e0f2fe, #fbbf24);
                box-shadow: 0 16px 28px rgba(251, 191, 36, 0.28);
            }

            .ghost-button {
                border: 1px solid rgba(255, 255, 255, 0.14);
                background: rgba(255, 255, 255, 0.04);
                color: var(--text-main);
            }

            .cta-button:hover,
            .ghost-button:hover {
                transform: translateY(-2px);
            }

            .stats-row {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1rem;
            }

            .stat-card {
                padding: 1rem 1rem 1.1rem;
                border-radius: 1.35rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                background: rgba(255, 255, 255, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
            }

            .stat-value {
                display: block;
                font-family: "Plus Jakarta Sans", sans-serif;
                font-size: clamp(1.2rem, 2vw, 1.75rem);
                font-weight: 800;
                letter-spacing: -0.04em;
            }

            .stat-label {
                display: block;
                margin-top: 0.3rem;
                color: rgba(223, 235, 248, 0.72);
                font-size: 0.9rem;
            }

            .cube-column {
                position: relative;
                display: grid;
                place-items: center;
                min-height: clamp(420px, 62vw, 720px);
                padding: 2rem 0;
            }

            .scene {
                position: relative;
                width: min(100%, 540px);
                aspect-ratio: 1 / 1;
                display: grid;
                place-items: center;
                transform-style: preserve-3d;
                perspective: 1400px;
                perspective-origin: 50% 44%;
            }

            .scene::before {
                content: "";
                position: absolute;
                inset: 8% 10%;
                border-radius: 2.5rem;
                background:
                    radial-gradient(circle at 50% 30%, rgba(255, 255, 255, 0.12), transparent 34%),
                    linear-gradient(160deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0));
                border: 1px solid rgba(255, 255, 255, 0.08);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
            }

            .cube-rig {
                position: relative;
                width: 100%;
                height: 100%;
                display: grid;
                place-items: center;
                transform-style: preserve-3d;
                transform:
                    translate3d(calc(var(--mouse-x) * 0.8), calc(var(--mouse-y) * 0.8), 0)
                    rotateX(calc(-4deg + var(--mouse-y) * -0.03))
                    rotateY(calc(var(--mouse-x) * 0.03));
                transition: transform 180ms ease-out;
            }

            .cube-wrap {
                position: relative;
                width: var(--cube-size);
                height: var(--cube-size);
                transform-style: preserve-3d;
                animation: floatCube 5.6s ease-in-out infinite;
                filter: drop-shadow(0 42px 55px rgba(0, 0, 0, 0.45));
            }

            .cube-glow {
                position: absolute;
                inset: 50% auto auto 50%;
                width: calc(var(--cube-size) * 1.6);
                height: calc(var(--cube-size) * 1.6);
                transform: translate3d(-50%, -50%, -120px);
                border-radius: 50%;
                background:
                    radial-gradient(circle, rgba(125, 211, 252, 0.28), rgba(245, 158, 11, 0.06) 45%, transparent 70%);
                filter: blur(12px);
                opacity: 0.88;
                pointer-events: none;
            }

            .cube-stage {
                position: relative;
                width: 100%;
                height: 100%;
                transform-style: preserve-3d;
                transform: rotateX(var(--cube-rotate-x)) rotateY(var(--cube-rotate-y));
                transition: transform 1350ms cubic-bezier(0.65, 0.05, 0.16, 1);
                will-change: transform, filter;
                filter: blur(var(--motion-blur));
            }

            .cube-stage.is-rotating {
                --motion-blur: 1.7px;
            }

            .cube-face {
                position: absolute;
                inset: 0;
                overflow: hidden;
                border-radius: 1.7rem;
                border: 1px solid rgba(255, 255, 255, 0.12);
                background:
                    linear-gradient(155deg, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0.03)),
                    rgba(8, 21, 35, 0.92);
                box-shadow:
                    inset 0 1px 0 rgba(255, 255, 255, 0.16),
                    0 16px 30px rgba(0, 0, 0, 0.22);
                backface-visibility: hidden;
                -webkit-backface-visibility: hidden;
            }

            .cube-face::before {
                content: "";
                position: absolute;
                inset: 0;
                background:
                    radial-gradient(circle at var(--light-x) var(--light-y), rgba(255, 255, 255, calc(0.26 * var(--face-glow))), transparent 35%),
                    linear-gradient(180deg, rgba(255, 255, 255, 0.14), transparent 38%);
                mix-blend-mode: screen;
                pointer-events: none;
                z-index: 2;
            }

            .cube-face::after {
                content: "";
                position: absolute;
                inset: auto 10% 5%;
                height: 14%;
                border-radius: 999px;
                background: radial-gradient(circle, rgba(125, 211, 252, 0.18), transparent 70%);
                filter: blur(18px);
                opacity: 0.7;
                pointer-events: none;
                z-index: 1;
            }

            .cube-face img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transform: scale(1.02);
                filter: saturate(1.08) contrast(1.05);
            }

            .face-overlay {
                position: absolute;
                inset: auto 0 0;
                padding: 1rem;
                display: flex;
                align-items: end;
                justify-content: space-between;
                gap: 1rem;
                background: linear-gradient(180deg, transparent, rgba(3, 12, 21, 0.86));
                z-index: 3;
            }

            .face-copy strong,
            .face-copy span {
                display: block;
            }

            .face-copy strong {
                font-size: 1rem;
                font-weight: 700;
            }

            .face-copy span {
                margin-top: 0.25rem;
                color: rgba(230, 241, 250, 0.74);
                font-size: 0.82rem;
            }

            .face-index {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 2.2rem;
                height: 2.2rem;
                border-radius: 999px;
                border: 1px solid rgba(255, 255, 255, 0.14);
                background: rgba(255, 255, 255, 0.08);
                font-weight: 700;
                font-size: 0.85rem;
            }

            .face-fallback {
                position: absolute;
                inset: 0;
                display: grid;
                place-items: center;
                padding: 1.5rem;
                text-align: center;
                font-family: "Plus Jakarta Sans", sans-serif;
                font-size: 1.25rem;
                font-weight: 800;
                letter-spacing: -0.03em;
                background:
                    radial-gradient(circle at 25% 20%, rgba(125, 211, 252, 0.28), transparent 34%),
                    linear-gradient(145deg, rgba(16, 32, 48, 0.96), rgba(4, 12, 22, 0.95));
                color: rgba(239, 247, 255, 0.92);
                z-index: 0;
            }

            .cube-face img.is-hidden {
                opacity: 0;
            }

            .face-front  { transform: translateZ(var(--cube-depth)); }
            .face-right  { transform: rotateY(90deg) translateZ(var(--cube-depth)); }
            .face-back   { transform: rotateY(180deg) translateZ(var(--cube-depth)); }
            .face-left   { transform: rotateY(-90deg) translateZ(var(--cube-depth)); }
            .face-top    { transform: rotateX(90deg) translateZ(var(--cube-depth)); }
            .face-bottom { transform: rotateX(-90deg) translateZ(var(--cube-depth)); }

            .cube-floor {
                position: absolute;
                left: 50%;
                bottom: 13%;
                width: calc(var(--cube-size) * 1.55);
                height: calc(var(--cube-size) * 0.52);
                transform: translateX(-50%) rotateX(76deg) translateZ(-100px);
                transform-style: preserve-3d;
                pointer-events: none;
            }

            .cube-floor::before,
            .cube-floor::after {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: 50%;
            }

            .cube-floor::before {
                background: radial-gradient(circle, rgba(125, 211, 252, 0.28), rgba(2, 8, 16, 0.02) 65%, transparent 78%);
                filter: blur(14px);
                opacity: 0.8;
            }

            .cube-floor::after {
                inset: 16% 14%;
                background:
                    linear-gradient(180deg, rgba(255, 255, 255, 0.18), transparent 58%),
                    radial-gradient(circle, rgba(255, 255, 255, 0.08), transparent 70%);
                transform: scaleY(0.65);
                filter: blur(10px);
                opacity: 0.46;
            }

            .reflection {
                position: absolute;
                top: calc(100% + 1.25rem);
                left: 50%;
                width: calc(var(--cube-size) * 1.02);
                height: calc(var(--cube-size) * 0.5);
                transform: translateX(-50%) rotateX(82deg) scaleY(-1);
                transform-origin: top;
                overflow: hidden;
                border-radius: 1.4rem;
                opacity: 0.26;
                filter: blur(2px);
                mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), transparent 88%);
                -webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), transparent 88%);
            }

            .reflection .cube-stage {
                transform: rotateX(var(--cube-rotate-x)) rotateY(var(--cube-rotate-y));
                transition: transform 1350ms cubic-bezier(0.65, 0.05, 0.16, 1);
                filter: none;
            }

            .cube-badge {
                position: absolute;
                right: clamp(0.5rem, 2vw, 1.2rem);
                top: clamp(0.5rem, 2vw, 1.2rem);
                padding: 0.8rem 1rem;
                border-radius: 1rem;
                border: 1px solid rgba(255, 255, 255, 0.12);
                background: rgba(6, 18, 30, 0.64);
                box-shadow: 0 16px 32px rgba(0, 0, 0, 0.22);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .cube-badge strong,
            .cube-badge span {
                display: block;
            }

            .cube-badge strong {
                font-family: "Plus Jakarta Sans", sans-serif;
                font-size: 0.92rem;
            }

            .cube-badge span {
                margin-top: 0.28rem;
                color: rgba(223, 235, 248, 0.7);
                font-size: 0.78rem;
            }

            .scroll-indicator {
                position: absolute;
                left: 50%;
                bottom: 1.25rem;
                transform: translateX(-50%);
                display: inline-flex;
                flex-direction: column;
                align-items: center;
                gap: 0.55rem;
                color: rgba(223, 235, 248, 0.72);
                font-size: 0.78rem;
                letter-spacing: 0.14em;
                text-transform: uppercase;
            }

            .scroll-indicator span {
                width: 1.55rem;
                height: 2.6rem;
                border-radius: 999px;
                border: 1px solid rgba(255, 255, 255, 0.18);
                position: relative;
            }

            .scroll-indicator span::before {
                content: "";
                position: absolute;
                top: 0.4rem;
                left: 50%;
                width: 0.34rem;
                height: 0.6rem;
                border-radius: 999px;
                background: linear-gradient(180deg, #ffffff, rgba(255, 255, 255, 0.2));
                transform: translateX(-50%);
                animation: scrollPulse 1.8s ease-in-out infinite;
            }

            .details-section {
                width: min(1200px, calc(100% - 2rem));
                margin: 0 auto 5rem;
                padding: clamp(1.6rem, 3vw, 2.2rem);
                border-radius: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.08);
                background: rgba(255, 255, 255, 0.04);
                box-shadow: 0 22px 50px rgba(0, 0, 0, 0.18);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .details-section h2 {
                margin: 0 0 0.75rem;
                font-family: "Plus Jakarta Sans", sans-serif;
                font-size: clamp(1.8rem, 4vw, 2.8rem);
                letter-spacing: -0.04em;
            }

            .details-section p {
                margin: 0;
                max-width: 44rem;
                color: var(--text-soft);
                line-height: 1.8;
            }

            @keyframes drift {
                from {
                    transform: translate3d(0, 0, 0) scale(1);
                }
                to {
                    transform: translate3d(2rem, -1.4rem, 0) scale(1.08);
                }
            }

            @keyframes floatCube {
                0%, 100% {
                    transform: translateY(-6px);
                }
                50% {
                    transform: translateY(14px);
                }
            }

            @keyframes scrollPulse {
                0% {
                    transform: translate(-50%, 0);
                    opacity: 0;
                }
                20% {
                    opacity: 1;
                }
                100% {
                    transform: translate(-50%, 1rem);
                    opacity: 0;
                }
            }

            @media (max-width: 980px) {
                .hero-grid {
                    grid-template-columns: 1fr;
                    padding-top: 1.25rem;
                    padding-bottom: 5rem;
                }

                .content-panel {
                    order: 2;
                }

                .cube-column {
                    order: 1;
                    min-height: clamp(330px, 84vw, 520px);
                    padding-bottom: 0.5rem;
                }

                .scene {
                    width: min(100%, 460px);
                    perspective: 1200px;
                }
            }

            @media (max-width: 720px) {
                :root {
                    --cube-size: clamp(170px, 54vw, 240px);
                }

                .hero-grid {
                    width: min(100% - 1.2rem, 1200px);
                    gap: 1.5rem;
                }

                .content-panel {
                    border-radius: 1.5rem;
                    padding: 1.2rem;
                }

                h1 {
                    font-size: clamp(2.6rem, 13vw, 4rem);
                }

                .stats-row {
                    grid-template-columns: 1fr;
                }

                .cube-badge {
                    position: static;
                    justify-self: center;
                    margin-top: 1rem;
                }

                .scroll-indicator {
                    bottom: 0.55rem;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                *,
                *::before,
                *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                    scroll-behavior: auto !important;
                }
            }
        </style>
    </head>
    <body>
        @php
            $products = [
                ['image' => '/images/product1.png', 'name' => 'VoltEdge Max', 'tagline' => 'High-density backup battery'],
                ['image' => '/images/product2.png', 'name' => 'ChargeCore Neo', 'tagline' => 'Fast-recovery smart power'],
                ['image' => '/images/product3.png', 'name' => 'GridFlow X', 'tagline' => 'Stable output for demanding loads'],
                ['image' => '/images/product4.png', 'name' => 'AmpVault Pro', 'tagline' => 'Heavy-duty cycle endurance'],
                ['image' => '/images/product5.png', 'name' => 'SolarStack Air', 'tagline' => 'Clean storage for hybrid systems'],
                ['image' => '/images/product6.png', 'name' => 'PulseReserve Elite', 'tagline' => 'Premium finish. Peak reliability.'],
            ];
        @endphp

        <main class="hero-shell">
            <section class="hero-grid">
                <div class="content-panel">
                    <span class="eyebrow">Power, Reimagined</span>

                    <h1>
                        Premium energy that
                        <span class="title-shine">looks as advanced as it performs.</span>
                    </h1>

                    <p class="lead">
                        Discover a refined battery collection designed for modern mobility, home backup, and industrial uptime.
                        The rotating 3D showcase highlights each product face with a smooth pause-and-reveal sequence for a high-end storefront experience.
                    </p>

                    <div class="hero-actions">
                        <a class="cta-button" href="#explore">Shop Collection</a>
                        <a class="ghost-button" href="#details">See Why It Stands Out</a>
                    </div>

                    <div class="stats-row" aria-label="Store highlights">
                        <div class="stat-card">
                            <span class="stat-value">6 Faces</span>
                            <span class="stat-label">Looped 3D product storytelling</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">3s Pause</span>
                            <span class="stat-label">Every face takes the spotlight</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-value">24/7 Ready</span>
                            <span class="stat-label">Built for premium commerce hero banners</span>
                        </div>
                    </div>
                </div>

                <div class="cube-column">
                    <div class="scene" id="cube-scene">
                        <div class="cube-rig">
                            <div class="cube-wrap">
                                <div class="cube-glow" aria-hidden="true"></div>

                                <div class="cube-stage" id="product-cube" aria-label="3D rotating product cube">
                                    @foreach ($products as $product)
                                        @php
                                            $classes = ['face-front', 'face-right', 'face-back', 'face-left', 'face-top', 'face-bottom'];
                                        @endphp
                                        <article class="cube-face {{ $classes[$loop->index] }}" data-face-index="{{ $loop->iteration }}">
                                            <div class="face-fallback">{{ $product['name'] }}</div>
                                            <img
                                                src="{{ asset(ltrim($product['image'], '/')) }}"
                                                alt="{{ $product['name'] }}"
                                                loading="lazy"
                                            >
                                            <div class="face-overlay">
                                                <div class="face-copy">
                                                    <strong>{{ $product['name'] }}</strong>
                                                    <span>{{ $product['tagline'] }}</span>
                                                </div>
                                                <span class="face-index">0{{ $loop->iteration }}</span>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>

                                <div class="reflection" aria-hidden="true">
                                    <div class="cube-stage" id="product-cube-reflection">
                                        @foreach ($products as $product)
                                            @php
                                                $classes = ['face-front', 'face-right', 'face-back', 'face-left', 'face-top', 'face-bottom'];
                                            @endphp
                                            <div class="cube-face {{ $classes[$loop->index] }}">
                                                <img src="{{ asset(ltrim($product['image'], '/')) }}" alt="" aria-hidden="true">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="cube-floor" aria-hidden="true"></div>
                        </div>

                        <aside class="cube-badge">
                            <strong>Autoplay Showcase</strong>
                            <span>Hover the cube to pause the loop</span>
                        </aside>
                    </div>
                </div>
            </section>

            <a class="scroll-indicator" href="#details" aria-label="Scroll to details">
                <span aria-hidden="true"></span>
                Scroll
            </a>
        </main>

        <section class="details-section" id="details">
            <h2 id="explore">Designed to Feel Premium on Every Screen</h2>
            <p>
                This hero is built with CSS 3D transforms, glassmorphism layering, responsive scaling, soft motion blur during transitions,
                dynamic lighting, a reflective floor, and pointer-based parallax. The animation rotates face-by-face in an infinite loop with
                a three-second pause, giving each product image a clear hero moment without overwhelming the layout.
            </p>
        </section>

        <script>
            (() => {
                const cube = document.getElementById("product-cube");
                const reflection = document.getElementById("product-cube-reflection");
                const scene = document.getElementById("cube-scene");
                const root = document.documentElement;
                const images = document.querySelectorAll(".cube-face img");

                const views = [
                    { x: -18, y: 0, lightX: "50%", lightY: "26%", glow: 1.0 },
                    { x: -18, y: -90, lightX: "76%", lightY: "36%", glow: 1.08 },
                    { x: -18, y: -180, lightX: "50%", lightY: "74%", glow: 0.9 },
                    { x: -18, y: -270, lightX: "24%", lightY: "34%", glow: 1.02 },
                    { x: -108, y: -270, lightX: "50%", lightY: "18%", glow: 1.12 },
                    { x: 72, y: -270, lightX: "50%", lightY: "82%", glow: 0.88 },
                ];

                const ROTATE_DURATION = 1350;
                const HOLD_DURATION = 3000;

                let currentIndex = 0;
                let timeoutId = null;
                let isPaused = false;

                const applyView = (view) => {
                    const transform = `rotateX(${view.x}deg) rotateY(${view.y}deg)`;
                    cube.style.transform = transform;
                    reflection.style.transform = transform;
                    root.style.setProperty("--cube-rotate-x", `${view.x}deg`);
                    root.style.setProperty("--cube-rotate-y", `${view.y}deg`);
                    root.style.setProperty("--light-x", view.lightX);
                    root.style.setProperty("--light-y", view.lightY);
                    root.style.setProperty("--face-glow", view.glow);
                };

                const scheduleNext = () => {
                    clearTimeout(timeoutId);
                    if (isPaused) {
                        return;
                    }

                    timeoutId = window.setTimeout(() => {
                        cube.classList.add("is-rotating");
                        reflection.classList.add("is-rotating");

                        currentIndex = (currentIndex + 1) % views.length;
                        applyView(views[currentIndex]);

                        window.setTimeout(() => {
                            cube.classList.remove("is-rotating");
                            reflection.classList.remove("is-rotating");
                            scheduleNext();
                        }, ROTATE_DURATION);
                    }, HOLD_DURATION);
                };

                const pauseAutoplay = () => {
                    isPaused = true;
                    clearTimeout(timeoutId);
                };

                const resumeAutoplay = () => {
                    if (!isPaused) {
                        return;
                    }

                    isPaused = false;
                    scheduleNext();
                };

                const handleParallax = (event) => {
                    const rect = scene.getBoundingClientRect();
                    const offsetX = event.clientX - rect.left;
                    const offsetY = event.clientY - rect.top;
                    const moveX = ((offsetX / rect.width) - 0.5) * 24;
                    const moveY = ((offsetY / rect.height) - 0.5) * 18;

                    root.style.setProperty("--mouse-x", `${moveX.toFixed(2)}px`);
                    root.style.setProperty("--mouse-y", `${moveY.toFixed(2)}px`);
                    root.style.setProperty("--light-x", `${(offsetX / rect.width) * 100}%`);
                    root.style.setProperty("--light-y", `${(offsetY / rect.height) * 100}%`);
                };

                const resetParallax = () => {
                    root.style.setProperty("--mouse-x", "0px");
                    root.style.setProperty("--mouse-y", "0px");
                    const activeView = views[currentIndex];
                    root.style.setProperty("--light-x", activeView.lightX);
                    root.style.setProperty("--light-y", activeView.lightY);
                };

                images.forEach((image) => {
                    image.addEventListener("error", () => {
                        image.classList.add("is-hidden");
                    }, { once: true });
                });

                scene.addEventListener("pointermove", handleParallax);
                scene.addEventListener("pointerleave", resetParallax);
                cube.addEventListener("mouseenter", pauseAutoplay);
                cube.addEventListener("mouseleave", resumeAutoplay);
                cube.addEventListener("focusin", pauseAutoplay);
                cube.addEventListener("focusout", resumeAutoplay);

                applyView(views[currentIndex]);
                scheduleNext();
            })();
        </script>
    </body>
</html>
