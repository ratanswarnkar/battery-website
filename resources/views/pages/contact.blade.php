@extends('layouts.app')

@section('title', 'BatteryCo | Contact')

@section('content')
    <section class="section-dark relative overflow-hidden py-20">
        <div class="section-gradient absolute inset-0 opacity-75"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="reveal max-w-3xl">
                <span class="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Contact Us</span>
                <h1 class="mt-4 text-4xl font-extrabold tracking-[-0.05em] text-white sm:text-6xl">Let's help you find the right battery solution.</h1>
                <p class="mt-6 text-lg leading-8 text-slate-300">
                    Reach out for product enquiries, support, or tailored power recommendations for your home or business.
                </p>
            </div>

            <div class="mt-14 grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="reveal glass-card p-8 sm:p-10">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-slate-200">Name</label>
                            <input id="name" type="text" placeholder="Enter your name" class="w-full rounded-2xl border border-white/10 bg-white/6 px-4 py-3 text-sm text-white outline-none transition duration-300 placeholder:text-slate-400 focus:border-sky-400 focus:bg-white/10">
                        </div>
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Email</label>
                            <input id="email" type="email" placeholder="Enter your email" class="w-full rounded-2xl border border-white/10 bg-white/6 px-4 py-3 text-sm text-white outline-none transition duration-300 placeholder:text-slate-400 focus:border-sky-400 focus:bg-white/10">
                        </div>
                        <div>
                            <label for="message" class="mb-2 block text-sm font-semibold text-slate-200">Message</label>
                            <textarea id="message" rows="6" placeholder="Write your message" class="w-full rounded-2xl border border-white/10 bg-white/6 px-4 py-3 text-sm text-white outline-none transition duration-300 placeholder:text-slate-400 focus:border-sky-400 focus:bg-white/10"></textarea>
                        </div>
                        <button type="submit" class="glass-button inline-flex rounded-full px-6 py-3 text-sm font-semibold text-white">
                            Send Message
                        </button>
                    </form>
                </div>

                <div class="reveal glass-card p-8 text-slate-200 sm:p-10">
                    <h2 class="text-2xl font-bold tracking-[-0.04em] text-white">Contact Details</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-300">
                        Our team is available to assist with product selection, service queries, and bulk orders.
                    </p>

                    <div class="mt-8 space-y-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-300">Phone</p>
                            <p class="mt-2 text-base text-white">+91 9555872224</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-300">Email</p>
                            <p class="mt-2 text-base text-white">support@batteryco.in</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-300">Address</p>
                            <p class="mt-2 text-base leading-7 text-white">T-3, A802, NX One, Tech Zone-IV, Greater Noida West, U.P. - 201306</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
