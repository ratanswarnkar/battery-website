<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BatteryCo')</title>
<link rel="stylesheet" href="/build/assets/app-DpkQ59ay.css">
<script type="module" src="/build/assets/app-5FogMBa5.js"></script>
</head>
<body class="site-shell bg-[#050816] text-slate-100 antialiased">
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute left-[-10%] top-[-12%] h-96 w-96 rounded-full bg-fuchsia-500/18 blur-3xl"></div>
        <div class="absolute right-[-8%] top-[18%] h-[28rem] w-[28rem] rounded-full bg-sky-500/18 blur-3xl"></div>
        <div class="absolute bottom-[-10%] left-[30%] h-[24rem] w-[24rem] rounded-full bg-violet-500/12 blur-3xl"></div>
    </div>

    @include('layouts.navbar')

    <main class="relative z-10">
        @yield('content')
    </main>

    <footer class="relative z-10 border-t border-white/10 bg-black/30 backdrop-blur-xl">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <div class="glass-panel grid gap-10 rounded-[2rem] px-8 py-10 md:grid-cols-3">
                <div class="space-y-4">
                    <a href="{{ url('/') }}" class="inline-flex items-center text-white">
                        <img
                            src="{{ asset('images/icons/logo.png') }}"
                            alt="Lithium Battery Logo"
                            class="h-auto w-[120px] object-contain drop-shadow-[0_8px_22px_rgba(255,255,255,0.18)] sm:w-[160px]"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>
                    <p class="max-w-sm text-sm leading-7 text-slate-300">
                        High-end power systems for homes, industries, electric infrastructure, and mission-critical backup environments.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Quick Links</h3>
                    <div class="mt-4 space-y-3 text-sm text-slate-300">
                        <a href="{{ url('/') }}" class="block transition duration-300 hover:translate-x-1 hover:text-white">Home</a>
                        <a href="{{ url('/about') }}" class="block transition duration-300 hover:translate-x-1 hover:text-white">About</a>
                        <a href="{{ url('/products') }}" class="block transition duration-300 hover:translate-x-1 hover:text-white">Products</a>
                        <a href="{{ url('/contact') }}" class="block transition duration-300 hover:translate-x-1 hover:text-white">Contact</a>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Contact</h3>
                    <div class="mt-4 space-y-3 text-sm text-slate-300">
                        <p>+91 9555872224</p>
                        <p>support@batteryco.in</p>
                        <p>T-3, A802, NX One, Tech Zone-IV, Greater Noida West, U.P. - 201306</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-white/10 pt-6 text-sm text-slate-400">
                <p>&copy; {{ date('Y') }} BatteryCo. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
