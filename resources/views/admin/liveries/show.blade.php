@extends('layout')

@section('header')
    <x-header :allow="true" />
@endsection

@section('content')
    <div class="relative isolate overflow-hidden bg-[#212121] px-6 pt-24 sm:pt-32 pb-12 lg:px-8">
        <div class="pb-2 pt-6 sm:pb-6">
            <div class="mx-auto mt-8 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
                    <div class="lg:col-span-5 lg:col-start-8">
                        <div class="flex justify-between items-center">
                            <h1 class="text-3xl font-medium text-white">{{ $livery->aircraft }}</h1>
                        </div>

                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-medium text-gray-300">{{ $livery->airline }}</h1>
                        </div>
                    </div>

                    <!-- Image gallery -->
                    <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
                        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-8">
                            <img src="{{ asset($livery->path) }}" alt="{{ $livery->aircraft }}" class="rounded-lg lg:col-span-2 lg:row-span-2 min-w-full" />
                        </div>
                    </div>

                    <div class="mt-8 lg:col-span-5">

                        <fieldset>
                            <legend class="text-base font-semibold text-gray-900">Ceník</legend>
                            <div class="mt-4 divide-y divide-gray-200 border-t border-b border-gray-200">
                                <div class="relative flex gap-3 py-4">
                                    <div class="min-w-0 flex-1 text-sm/6">
                                        <div class="font-medium text-white select-none">Cena za JPG</div>
                                    </div>
                                    <div class="flex h-6 shrink-0 items-center text-emerald-600 font-bold text-xl">
                                        $ {{ $livery->price_jpg }}
                                    </div>
                                </div>

                                <div class="relative flex gap-3 py-4">
                                    <div class="min-w-0 flex-1 text-sm/6">
                                        <div class="font-medium text-white select-none">Cena za PNG</div>
                                    </div>
                                    <div class="flex h-6 shrink-0 items-center text-emerald-600 font-bold text-xl">
                                        $ {{ $livery->price_png }}
                                    </div>
                                </div>

                                <div class="relative flex gap-3 py-4">
                                    <div class="min-w-0 flex-1 text-sm/6">
                                        <div class="font-medium text-white select-none">Zlevněná cena za JPG</div>
                                    </div>
                                    <div class="flex h-6 shrink-0 items-center text-emerald-600 font-bold text-xl">
                                        @if($livery->discount_jpg) $ {{ $livery->discount_jpg  }} @else - @endif
                                    </div>
                                </div>

                                <div class="relative flex gap-3 py-4">
                                    <div class="min-w-0 flex-1 text-sm/6">
                                        <div class="font-medium text-white select-none">Zlevněná cena za PNG</div>
                                    </div>
                                    <div class="flex h-6 shrink-0 items-center text-emerald-600 font-bold text-xl">
                                        @if($livery->discount_jpg) $ {{ $livery->discount_jpg  }} @else - @endif
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="mt-6 space-y-4">
                            <a href="{{ route('admin.liveries.edit', ['livery' => $livery->id]) }}" class="button-large">Upravit livery</a>
                            <form action="{{ route('admin.liveries.destroy', ['livery' => $livery->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button-red-large" onclick="return confirm('Opravdu chcete smazat tuto livery?')">Smazat livery</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
