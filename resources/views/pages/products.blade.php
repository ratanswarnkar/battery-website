@extends('layouts.app')

@section('title', 'BatteryCo | Products')

@section('content')
    <section class="section-dark relative overflow-hidden py-20">
        <div class="section-gradient absolute inset-0 opacity-75"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal max-w-3xl">
                <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Our Products</span>
                <h1 class="mt-4 text-4xl font-extrabold tracking-[-0.05em] text-white sm:text-6xl">Battery systems built for performance, safety, and longevity.</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300">
                    Explore a premium catalog of locally-served battery products optimized for automotive, backup, solar, industrial, and critical-load environments.
                </p>
            </div>

            <div class="mt-14 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($products as $product)
                    <x-product-card :product="$product" cta="View Details" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
