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
            <p class="mt-8 text-pretty text-lg font-medium text-white sm:text-xl/8">List of airlines with at least one livery. More coming soon.</p>
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


    <div class="bg-[#212121]">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

            <div class="mt-6 grid grid-cols-3 gap-x-4 gap-y-10 sm:gap-x-6 sm:grid-cols-4 md:grid-cols-6 xl:grid-cols-8 md:gap-y-0 lg:gap-x-8">
                @foreach($airlines as $airline)
                <div class="group relative text-center">
                    <div class="w-full overflow-hidden rounded-md group-hover:opacity-75">
                        @if(file_exists(public_path('images/tails/'.strtoupper($airline->IATA).'.png')))
                            <img src="{{ asset('images/tails/'.strtoupper($airline->IATA).'.png') }}" alt="{{ $airline->airline }}" class="aspect-square w-full p-6 rounded-md object-contain  border border-white/20 grayscale group-hover:grayscale-0" />
                        @else
                            <div class="aspect-square w-full p-6 rounded-md object-contain border border-white/20 bg-[#212121] flex items-center justify-center">
                                <i class="fa-solid fa-plane-up text-5xl text-gray-300 group-hover:text-white"></i>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-1 font-semibold text-white">
                        <a href="{{ route('airlines.show', ['airline' => $airline->IATA]) }}">
                            <span class="absolute inset-0"></span>
                            {{ $airline->airline }}
                        </a>
                    </h3>
                    @php($count = \App\Models\Livery::where('airline', $airline->airline)->count())
                    <p class="mt-1 text-gray-300">{{ $count }} @if($count > 1) liveries @else  livery @endif</p>
                </div>
                @endforeach
            </div>

            <div class="mt-8 text-sm md:hidden">
                <a href="{{ route('catalogue') }}" class="font-medium text-emerald-600 hover:text-emerald-500">
                    To the catalogue
                    <span aria-hidden="true"> &rarr;</span>
                </a>
            </div>
        </div>
    </div>

@endsection
