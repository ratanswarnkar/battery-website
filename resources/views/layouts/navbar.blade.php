@php
    $links = [
        ['label' => 'Home', 'href' => url('/'), 'active' => request()->url() === url('/')],
        ['label' => 'About', 'href' => url('/about'), 'active' => request()->is('about')],
        ['label' => 'Products', 'href' => route('products.index'), 'active' => request()->is('products') || request()->is('products/*')],
        ['label' => 'Contact', 'href' => url('/contact'), 'active' => request()->is('contact')],
    ];
@endphp

<header class="sticky top-0 z-50 px-4 pt-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <div class="glass-nav flex items-center justify-between rounded-[1.75rem] px-5 py-4 sm:px-6">
            <a href="{{ url('/') }}" class="inline-flex items-center text-white">
                <img
                    src="{{ asset('images/icons/logo.png') }}"
                    alt="Lithium Battery Logo"
                    class="h-auto w-[120px] object-contain drop-shadow-[0_8px_22px_rgba(255,255,255,0.18)] sm:w-[160px]"
                    loading="eager"
                    decoding="async"
                >
            </a>

            <button
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/15 bg-white/10 text-white transition hover:bg-white/15 lg:hidden"
                data-nav-toggle
                aria-label="Toggle navigation"
                aria-expanded="false"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
                </svg>
            </button>

            <div class="hidden items-center gap-3 lg:flex">
                <nav class="flex items-center gap-2 text-sm font-semibold text-slate-200">
                    @foreach ($links as $link)
                        <a href="{{ $link['href'] }}" class="{{ $link['active'] ? 'bg-white/14 text-white shadow-[inset_0_1px_0_rgba(255,255,255,0.12)]' : 'text-slate-300 hover:bg-white/10 hover:text-white' }} rounded-full px-4 py-2 transition duration-300">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </nav>

                <a href="{{ url('/contact') }}" class="glass-button inline-flex items-center justify-center rounded-full px-5 py-2.5 text-sm font-semibold text-white">
                    Get Quote
                </a>
            </div>
        </div>

        <div class="glass-nav mt-3 hidden rounded-[1.75rem] px-5 py-5 lg:hidden" data-mobile-nav>
            <nav class="flex flex-col gap-2 text-sm font-semibold text-slate-200">
                @foreach ($links as $link)
                    <a href="{{ $link['href'] }}" class="{{ $link['active'] ? 'bg-white/14 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }} rounded-2xl px-4 py-3 transition duration-300">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <a href="{{ url('/contact') }}" class="glass-button mt-4 inline-flex items-center justify-center rounded-full px-5 py-3 text-sm font-semibold text-white">
                Get Quote
            </a>
        </div>
    </div>
</header>
