@extends('layout')

@section('header')
    <x-header :allow="true" />
@endsection

@section('content')
    <!-- Hero Header -->
    <div class="relative isolate overflow-hidden px-6 pt-24 sm:pt-32 pb-12 lg:px-8" style="background-color: #212121;">
        <img src="{{ asset('images/hero.jpg') }}" alt=""
             class="absolute inset-0 -z-10 size-full object-cover grayscale"/>
        <div class="absolute inset-0 -z-10 bg-black/75"></div>
        <div
            class="absolute inset-x-0 bottom-0 -z-10 h-64 bg-gradient-to-b from-transparent via-black/20 to-[#212121]"></div>
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
             aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-emerald-600 opacity-10"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div
            class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-emerald-600 opacity-10"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Oakraft</h2>
            <p class="mt-8 text-pretty text-lg font-medium text-white sm:text-xl/8">Explore my collection of unique
                liveries and designs. Each piece is crafted with attention to detail and available for purchase.</p>
        </div>

        <!-- Stats Section -->
        <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-16 sm:mt-20 lg:mt-28">
            <dl class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 lg:grid-cols-4">
                <div class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                    <dt class="text-base/7 text-gray-300">Founded</dt>
                    <dd class="text-3xl font-semibold tracking-tight text-white">2025</dd>
                </div>
                <div class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                    <dt class="text-base/7 text-gray-300">Liveries</dt>
                    <dd class="text-3xl font-semibold tracking-tight text-white">{{ \App\Models\Livery::count() }}+</dd>
                </div>
                <div class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                    <dt class="text-base/7 text-gray-300">Airlines</dt>
                    <dd class="text-3xl font-semibold tracking-tight text-white">{{ \App\Models\Livery::distinct('airline')->count() }}+</dd>
                </div>
                <div class="flex flex-col-reverse gap-y-3 border-l border-white/20 pl-6">
                    <dt class="text-base/7 text-gray-300">Dedication</dt>
                    <dd class="text-3xl font-semibold tracking-tight text-white">101%</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Features Section -->
    <div class="overflow-hidden py-24 sm:py-32 bg-gradient-to-b from-transparent via-[#212121]/80 to-[#212121]"
         style="background-color: #212121;">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base/7 font-semibold text-emerald-400">What I do</h2>
                        <p class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                            State-of-the-art aircraft liveries</p>
                        <p class="mt-6 text-lg/8 text-gray-300">As an Avgeek, I was a little bit upset with the lack of
                            liveries for my favorite aircraft in flight tracking apps. So I made the decision to change
                            it.</p>
                        <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-300 lg:max-w-none">
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-white">
                                    <i class="fa-solid fa-brain absolute left-1 top-1 size-5 text-emerald-400"></i>
                                    Do a research.
                                </dt>
                                <dd class="inline">I am taking white templates from Norebbo, because his templates have
                                    become a standard in this industry. I find airlines which have missing liveries and
                                    I get to work.
                                </dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-white">
                                    <i class="fa-solid fa-paintbrush absolute left-1 top-1 size-5 text-emerald-400"></i>
                                    Create a design.
                                </dt>
                                <dd class="inline">I use Photoshop for placing vector elements I made before in
                                    Illustrator. Sometimes it can be very time consuming.
                                </dd>
                            </div>
                            <div class="relative pl-9">
                                <dt class="inline font-semibold text-white">
                                    <i class="fa-solid fa-truck-ramp-box absolute left-1 top-1 size-5 text-emerald-400"></i>
                                    Deliver the result.
                                </dt>
                                <dd class="inline">When I am satisfied with the result, I deliver the livery to this
                                    website, so you can have it for yourself.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="relative w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0 overflow-hidden"
                     style="background-image: url('{{ asset('liveries/delta-a319.png') }}'); background-size: cover; background-position: center; aspect-ratio: 2432 / 1442;">

                    <div class="absolute left-1 bottom-1 flex items-center gap-6 py-1 px-3 rounded-lg bg-emerald-600 shadow-lg"
                         style="min-width: 340px;">
                        <span class="text-white text-lg font-semibold">A gift from me to you. Enjoy it.</span>
                        <a href="/download"
                           class="ml-auto inline-block rounded-md bg-white px-3 py-1 my-1 text-emerald-600 font-bold shadow hover:bg-gray-100 transition">
                            Download
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="portfolio" class="bg-black/30">
        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">
            <div class="flex items-center justify-between space-x-4 mb-6">
                <h2 class="text-4xl font-bold text-white mb-4">Featured Liveries</h2>
                @if(request('search') || request('category'))
                    <a href="{{ route('home') }}"
                       class="whitespace-nowrap text-sm font-medium text-emerald-600 hover:text-emerald-500">
                        View all
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                @endif
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                @foreach($liveries as $livery)
                    <div class="group relative">
                        <div class="relative">
                            <img
                                src="{{ asset($livery->path) }}"
                                alt="{{ $livery->name }}"
                                class="aspect-[4/3] w-full rounded-lg bg-[#212121] object-contain"
                            >

                            <!-- Hover overlay with View Product button -->
                            <div
                                class="absolute inset-0 flex items-end py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                aria-hidden="true">
                                <div
                                    class="w-full rounded-md bg-black/60 px-4 py-2 text-center text-sm font-medium text-white backdrop-blur backdrop-filter">
                                    View livery
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between space-x-8 text-base font-medium text-white">
                            <h3>
                                <a href="{{ route('livery.show', ['livery' => $livery->id . '-' . strtolower(\Illuminate\Support\Str::slug($livery->airline) . '-' . $livery->aircraft)]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $livery->name }}
                                </a>
                            </h3>
                        </div>

                        <p class="mt-1 text-sm font-bold text-emerald-600">
                            {{ $livery->airline }} {{ $livery->aircraft }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div>
                <div class="mx-auto max-w-7xl px-6 pt-8 sm:pt-16 lg:flex lg:items-center lg:justify-between lg:px-8">
                    <h2 class="max-w-2xl text-4xl font-semibold tracking-tight text-gray-50 sm:text-5xl">Want to see
                        more? <br/>Lets head to the catalogue!</h2>
                    <div class="mt-10 flex items-center gap-x-6 lg:mt-0 lg:shrink-0">
                        <a href="{{ route('catalogue') }}"
                           class="rounded-md bg-emerald-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Show
                            me more</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <x-footer />
@endsection
