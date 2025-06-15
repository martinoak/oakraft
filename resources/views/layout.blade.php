<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Design Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    @if(! str_contains(url()->current(), 'admin'))
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex flex-1">
                    <div class="hidden lg:flex lg:gap-x-12">
                        <x-navitem :class="'text-sm/6 font-semibold text-white hover:text-emerald-600'" />
                    </div>
                    <div class="flex lg:hidden">
                        <button type="button" id="mobile-menu-button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                            <span class="sr-only">Open main menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-12 w-auto text-white!" src="{{ asset('images/logo.svg') }}" alt="" />
                </a>
                <div class="flex flex-1 justify-end">
                    <a href="#" class="text-sm/6 font-semibold text-white hover:text-emerald-600">
                        <i class="fa-regular fa-user fa-xl"></i>
                    </a>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden hidden" id="mobile-menu" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-10"></div>
                <div class="fixed inset-y-0 left-0 z-10 w-full overflow-y-auto bg-white px-6 py-6">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-1">
                            <button type="button" id="mobile-menu-close" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                                <span class="sr-only">Close menu</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-12 w-auto" src="{{ asset('images/logo.svg') }}" alt="" />
                        </a>
                        <div class="flex flex-1 justify-end">
                            <a href="#" class="text-sm/6 font-semibold text-emerald-600">Log in <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                    <div class="mt-6 space-y-2">
                        <x-navitem :class="'-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-emerald-600 hover:bg-gray-50'" />
                    </div>
                </div>
            </div>
        </header>
    @endif

    <main>
        @yield('content')
    </main>

    @if(! str_contains(url()->current(), 'admin'))
        <x-footer />
    @endif

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenuClose = document.getElementById('mobile-menu-close');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
            });

            mobileMenuClose.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
