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
            <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">{{ $airline }}</h2>
        </div>
    </div>
    <div class="bg-[#212121]">
        <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:px-8">
            <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <h2 class="text-3xl font-semibold tracking-tight text-white">Liveries</h2>
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($liveries as $livery)
                        <div class="group relative">
                            <div class="relative h-72 w-full overflow-hidden rounded-lg bg-[#212121]">
                                <img src="{{ asset($livery->path) }}" alt="{{ $livery->aircraft }}" class="h-full w-full object-contain object-center group-hover:opacity-75" />
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-white">
                                        <a href="{{ route('livery.show', ['livery' => $livery->id . '-' . strtolower(\Illuminate\Support\Str::slug($livery->airline) . '-' . \Illuminate\Support\Str::slug($livery->aircraft))]) }}">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $livery->aircraft }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
