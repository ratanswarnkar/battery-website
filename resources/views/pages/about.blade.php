@extends('layouts.app')

@section('title', 'BatteryCo | About')

@section('content')
    <section class="section-dark relative overflow-hidden py-20 lg:py-24">
        <div class="section-gradient absolute inset-0 opacity-75"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal max-w-3xl">
                <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">About BatteryCo</span>
                <h1 class="mt-4 text-4xl font-extrabold tracking-[-0.05em] text-white sm:text-6xl">Powering progress with trusted battery expertise.</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300">
                    BatteryCo is focused on delivering dependable battery solutions for residential, automotive, commercial, and industrial energy needs. We combine product quality, technical guidance, and responsive service to help customers choose the right power source with confidence.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2 lg:px-8">
            <div class="reveal relative">
                <div class="absolute -inset-4 rounded-[2rem] bg-sky-200/60 blur-3xl"></div>
                <img
                    src="{{ asset('images/banners/about-power-facility.jpg') }}"
                    alt="Premium battery product render symbolizing BatteryCo operations and modern power technology"
                    loading="lazy"
                    decoding="async"
                    class="relative h-full w-full rounded-[2rem] object-cover shadow-2xl"
                >
            </div>
            <div class="reveal glass-card p-8 sm:p-10">
                <h2 class="text-3xl font-bold tracking-[-0.04em] text-white sm:text-4xl">A modern approach to battery supply and service.</h2>
                <p class="mt-6 text-base leading-8 text-slate-300">
                    From selecting the right battery type to ensuring dependable after-sales assistance, our team is committed to making power solutions simple and effective. We serve customers who expect reliability, long product life, and knowledgeable support.
                </p>
                <p class="mt-4 text-base leading-8 text-slate-300">
                    Our focus is on building long-term trust through quality products, timely delivery, and professional guidance tailored to each application.
                </p>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2">
                <div class="reveal glass-card p-8">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Mission</span>
                    <h3 class="mt-4 text-2xl font-bold tracking-[-0.04em] text-white">Deliver dependable energy solutions with service that lasts.</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-300">
                        We aim to provide high-quality battery systems backed by expert support, fair guidance, and consistent customer care.
                    </p>
                </div>
                <div class="reveal glass-card p-8">
                    <span class="text-sm font-semibold uppercase tracking-[0.3em] text-violet-300">Vision</span>
                    <h3 class="mt-4 text-2xl font-bold tracking-[-0.04em] text-white">Become a trusted leader in reliable, efficient power storage.</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-300">
                        Our vision is to help homes and businesses stay powered through innovative battery solutions designed for modern energy demands.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
