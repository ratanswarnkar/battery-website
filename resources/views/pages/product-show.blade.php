@extends('layouts.app')

@section('title', $product['name'] . ' | BatteryCo')

@section('content')
    <section class="section-dark relative overflow-hidden py-16 sm:py-20">
        <div class="section-gradient absolute inset-0 opacity-80"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid items-center gap-10 lg:grid-cols-[1.02fr_0.98fr]">
                <div class="reveal relative order-2 lg:order-1">
                    <div class="absolute inset-x-10 bottom-8 h-16 rounded-full bg-sky-500/20 blur-3xl"></div>
                    <div class="glass-panel relative overflow-hidden rounded-[2rem] p-6 sm:p-8">
                        <img
                            src="{{ asset($product['image']) }}"
                            alt="{{ $product['alt'] }}"
                            loading="lazy"
                            decoding="async"
                            class="product-float mx-auto h-full max-h-[520px] w-full object-contain"
                        >
                    </div>
                </div>

                <div class="reveal order-1 text-white lg:order-2">
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-sky-100 backdrop-blur-md">
                        {{ $product['category'] }}
                    </span>
                    <h1 class="mt-6 max-w-2xl text-4xl font-extrabold leading-tight tracking-[-0.05em] sm:text-5xl lg:text-6xl">{{ $product['name'] }}</h1>
                    <p class="mt-6 text-sm font-semibold uppercase tracking-[0.35em] text-slate-400">{{ $product['price'] }}</p>
                    <p class="mt-4 max-w-2xl text-lg leading-8 text-slate-300">{{ $product['hero_copy'] }}</p>
                    <p class="mt-4 max-w-2xl text-base leading-8 text-slate-400">{{ $product['description'] }}</p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="glass-panel p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.3em] text-slate-400">Capacity</p>
                            <p class="mt-3 text-lg font-black text-white">{{ $product['capacity'] }}</p>
                        </div>
                        <div class="glass-panel p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.3em] text-slate-400">Output</p>
                            <p class="mt-3 text-lg font-black text-white">{{ $product['backup'] }}</p>
                        </div>
                        <div class="glass-panel p-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.3em] text-slate-400">Support</p>
                            <p class="mt-3 text-lg font-black text-white">{{ $product['warranty'] }}</p>
                        </div>
                    </div>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ url('/contact') }}" class="glass-button inline-flex items-center justify-center rounded-full px-6 py-3 text-sm font-semibold text-white">
                            Get Quote
                        </a>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/15">
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div class="reveal glass-card p-8">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Applications</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em] text-white">Ready for real-world deployment.</h2>
                    <div class="mt-8 flex flex-wrap gap-3">
                        @foreach ($product['applications'] as $application)
                            <span class="rounded-full border border-white/10 bg-white/8 px-4 py-2 text-sm font-semibold text-slate-200">{{ $application }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="reveal glass-card p-8 text-white">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Key Features</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em]">Performance details that matter.</h2>
                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        @foreach ($product['features'] as $feature)
                            <div class="rounded-3xl border border-white/10 bg-white/6 p-5">
                                <p class="text-base font-semibold leading-7 text-slate-200">{{ $feature }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">More Solutions</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em] text-white sm:text-4xl">Explore related battery systems.</h2>
                </div>
                <a href="{{ route('products.index') }}" class="text-sm font-semibold text-slate-200 transition hover:text-white">View full catalog</a>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($relatedProducts as $relatedProduct)
                    <x-product-card :product="$relatedProduct" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
