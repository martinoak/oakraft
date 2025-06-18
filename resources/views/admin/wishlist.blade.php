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

            <div class="h-6 w-px bg-white/10 lg:hidden" aria-hidden="true"></div>

            <div class="flex flex-1 items-center gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1">
                    <h1 class="text-2xl font-bold text-white">Seznam přání</h1>
                </div>
            </div>
        </div>

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                    @foreach($wishes as $wish)
                        <div class="relative flex items-center space-x-3 rounded-lg border border-gray-800 bg-white/20 px-6 py-5 shadow-xs">
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white">{{ $wish->text }}</p>
                                <p class="truncate text-sm text-gray-300">{{ $wish->ip }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
