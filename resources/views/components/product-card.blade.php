@props([
    'product',
    'cta' => 'View Details',
])

<article class="reveal group glass-card overflow-hidden rounded-[2rem] transition duration-300 hover:-translate-y-2 hover:scale-[1.02] hover:shadow-[0_30px_90px_rgba(56,189,248,0.16)]">
    <div class="relative overflow-hidden rounded-b-[2rem] bg-[radial-gradient(circle_at_top,_rgba(168,85,247,0.24),_transparent_52%),radial-gradient(circle_at_bottom_right,_rgba(56,189,248,0.18),_transparent_38%),linear-gradient(180deg,#050816_0%,#111827_100%)]">
        <div class="absolute inset-0 bg-[linear-gradient(145deg,rgba(255,255,255,0.14),rgba(255,255,255,0.02))]"></div>
        <span class="absolute left-5 top-5 z-10 inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.25em] text-sky-100 backdrop-blur-md">
            {{ $product['badge'] }}
        </span>
        <img
            src="{{ asset($product['image']) }}"
            alt="{{ $product['alt'] }}"
            loading="lazy"
            decoding="async"
            class="relative h-72 w-full object-contain p-8 transition duration-500 group-hover:scale-110"
        >
    </div>

    <div class="space-y-5 p-8">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-sky-300">{{ $product['category'] }}</p>
            <h3 class="mt-3 text-2xl font-extrabold tracking-[-0.03em] text-white">{{ $product['name'] }}</h3>
            <p class="mt-3 text-sm leading-7 text-slate-300">{{ $product['excerpt'] }}</p>
        </div>

        <div class="flex items-end justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-400">Price</p>
                <p class="mt-2 text-2xl font-extrabold tracking-[-0.04em] text-white">{{ $product['price'] }}</p>
            </div>
            <span class="rounded-full border border-white/10 bg-white/6 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-slate-300">
                {{ $product['capacity'] }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-3 text-left">
            <div class="rounded-2xl border border-white/8 bg-white/6 px-4 py-3">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Output</p>
                <p class="mt-2 text-sm font-bold text-white">{{ $product['backup'] }}</p>
            </div>
            <div class="rounded-2xl border border-white/8 bg-white/6 px-4 py-3">
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Support</p>
                <p class="mt-2 text-sm font-bold text-white">{{ $product['warranty'] }}</p>
            </div>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('products.show', $product['slug']) }}" class="glass-button inline-flex flex-1 items-center justify-center rounded-full px-5 py-3 text-sm font-semibold text-white">
                {{ $cta }}
            </a>
            <a href="{{ url('/contact') }}" class="inline-flex flex-1 items-center justify-center rounded-full border border-white/12 bg-white/6 px-5 py-3 text-sm font-semibold text-slate-100 transition duration-300 hover:bg-white/12">
                Buy Now
            </a>
        </div>
    </div>
</article>
