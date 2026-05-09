@extends('layouts.app')

@section('title', 'BatteryCo | Home')

@section('content')
    @include('pages.partials.home-hero', ['products' => $products])

    <section class="section-light py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal max-w-2xl">
                <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Why Choose Us</span>
                <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em] text-white sm:text-5xl">Power solutions designed with a premium hardware-first mindset.</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="reveal glass-card p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-sky-300 shadow-lg">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 16V8a2 2 0 0 0-1.106-1.789l-6-3a2 2 0 0 0-1.788 0l-6 3A2 2 0 0 0 5 8v8a2 2 0 0 0 1.106 1.789l6 3a2 2 0 0 0 1.788 0l6-3A2 2 0 0 0 21 16Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.3 7 6.7 3.35L18.7 7M12 21V10.35" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Wide Product Range</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Automotive, inverter, solar, and industrial batteries for every scale of requirement.
                    </p>
                </div>

                <div class="reveal glass-card p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-sky-300 shadow-lg">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7Z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">High Performance</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Efficient power delivery, quick charging support, and stable output across demanding usage.
                    </p>
                </div>

                <div class="reveal glass-card p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-sky-300 shadow-lg">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8.2 22h7.6c1.12 0 1.68 0 2.108-.218a2 2 0 0 0 .874-.874C19 20.48 19 19.92 19 18.8V8.2c0-1.12 0-1.68-.218-2.108a2 2 0 0 0-.874-.874C17.48 5 16.92 5 15.8 5H8.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C5 6.52 5 7.08 5 8.2v10.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874C6.52 22 7.08 22 8.2 22Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 2h6" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Maintenance Support</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Ongoing battery guidance and dependable support to keep your systems running confidently.
                    </p>
                </div>

                <div class="reveal glass-card p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-sky-300 shadow-lg">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 3v18" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10v10H7z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Quality Assured</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">
                        Every solution is selected for durability, safety, and long operational life.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20" id="featured-products">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Product Preview</span>
                    <h2 class="mt-4 text-3xl font-bold tracking-[-0.04em] text-white sm:text-5xl">Explore our featured battery categories.</h2>
                </div>
                <a href="{{ route('products.index') }}" class="text-sm font-semibold text-slate-200 transition hover:text-white">View all products</a>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" cta="Learn More" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
