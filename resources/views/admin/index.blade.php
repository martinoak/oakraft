@extends('layout')

@section('content')
<div>
    <x-admin-sidebar />

    <div class="lg:pl-72">
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-800 bg-black/30 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
            <button type="button" class="-m-2.5 p-2.5 text-white lg:hidden">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Separator -->
            <div class="h-6 w-px bg-white/10 lg:hidden" aria-hidden="true"></div>

            <div class="flex flex-1 items-center gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1">
                    <h1 class="text-2xl font-bold text-white">Mazej do práce</h1>
                </div>
            </div>
        </div>

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <dl class="mb-10 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Liveries</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{ \App\Models\Livery::count() }}+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Aerolinek</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{ \App\Models\Livery::distinct('airline')->count() }}+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Počet objednávek</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">4</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Vyděláno</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">0 Kč</dd>
                    </div>
                </dl>
            </div>

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-2xl font-semibold text-white">Livery</h1>
                        <p class="mt-2 text-sm text-gray-300">Tabulka čtyř hlavních livery na homepage</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <button type="button" class="block rounded-md bg-emerald-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-600">Přidat livery</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                    @foreach(\App\Models\Livery::where('featured', true)->limit(4)->get() as $livery)
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
            </div>

        </main>
    </div>
</div>
@endsection
