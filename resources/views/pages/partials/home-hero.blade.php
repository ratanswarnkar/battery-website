@php
    $heroProducts = collect($products)->take(6)->values();
    $cubeFaces = ['front', 'right', 'back', 'left', 'top', 'bottom'];
    $centerImage = file_exists(public_path('images/battery.png'))
        ? asset('images/battery.png')
        : asset('images/banners/hero-battery-3d.png');
@endphp

<section class="premium-hero section-dark relative overflow-hidden pt-8 text-white" data-hero-cube>
    <div class="section-gradient absolute inset-0 opacity-90"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(56,189,248,0.2),transparent_22%),radial-gradient(circle_at_80%_18%,rgba(168,85,247,0.14),transparent_24%),radial-gradient(circle_at_50%_78%,rgba(59,130,246,0.16),transparent_26%)]"></div>
    <div class="hero-grid-glow absolute inset-0 opacity-80"></div>

    <div class="mx-auto grid max-w-7xl items-center gap-16 px-6 py-16 lg:grid-cols-[0.94fr_1.06fr] lg:px-8 lg:py-24">
        <div class="reveal relative z-10">
            <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.38em] text-sky-100 shadow-[0_12px_40px_rgba(56,189,248,0.18)] backdrop-blur-md">
                Next-Gen Energy
            </span>
            <h1 class="mt-6 max-w-3xl text-5xl font-extrabold tracking-[-0.06em] text-white sm:text-6xl lg:text-7xl xl:text-[4.5rem]">
                Premium power with a hero that keeps the product front and center.
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-slate-300 sm:text-xl">
                Discover high-end battery systems for automotive, solar, backup, and industrial environments through a continuously rotating glass cube built to frame the product without ever hiding it.
            </p>

            <div class="mt-10 flex">
                <a href="{{ route('products.index') }}" class="glass-button inline-flex items-center justify-center rounded-full px-7 py-3.5 text-sm font-semibold text-white">
                    Shop Now
                </a>
            </div>
        </div>

        <div class="reveal relative z-10">
            <div class="glass-panel hero-cube-panel relative overflow-hidden rounded-[2rem] p-6 sm:p-8">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.14),transparent_48%)]"></div>
                <div class="absolute right-6 top-6 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.32em] text-slate-200">
                    3D Showcase
                </div>

                <div class="hero-cube-stage relative mx-auto mt-8 flex min-h-[440px] items-center justify-center sm:min-h-[540px]" data-cube-scene>
                    <div class="hero-cube-aura" aria-hidden="true"></div>
                    <div class="hero-cube-floor" aria-hidden="true"></div>

                    <div class="hero-cube-rig">
                        <div class="hero-cube-shadow" aria-hidden="true"></div>

                        <div class="hero-cube-wrap" data-cube-wrap aria-label="Continuously rotating product showcase cube">
                            <div class="hero-cube-center-glow" aria-hidden="true"></div>
                            <div class="hero-cube-center-image">
                                <img src="{{ $centerImage }}" alt="Featured battery product centered inside the rotating hero cube" loading="eager" decoding="async">
                            </div>

                            <div class="hero-cube" data-cube-stage aria-hidden="true">
                                @foreach ($heroProducts as $product)
                                    <article class="hero-cube-face hero-cube-face--{{ $cubeFaces[$loop->index] }}">
                                        <div class="hero-cube-face__shine" aria-hidden="true"></div>
                                        <img src="{{ asset($product['image']) }}" alt="" loading="lazy" decoding="async">
                                    </article>
                                @endforeach
                            </div>

                            <div class="hero-cube-reflection" aria-hidden="true">
                                <div class="hero-cube hero-cube--reflection" data-cube-reflection>
                                    @foreach ($heroProducts as $product)
                                        <div class="hero-cube-face hero-cube-face--{{ $cubeFaces[$loop->index] }}">
                                            <img src="{{ asset($product['image']) }}" alt="" loading="lazy" decoding="async">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#featured-products" class="hero-scroll-indicator absolute bottom-6 left-1/2 z-10 hidden -translate-x-1/2 flex-col items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.34em] text-slate-300 sm:flex">
        <span class="hero-scroll-indicator__mouse" aria-hidden="true"></span>
        Scroll
    </a>
</section>
