@extends('layout')

@section('content')
    <div>
        <x-admin-sidebar />

        <div class="lg:pl-72">
            <x-admin-header :title="'Přehled liveries'" />

            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-2xl font-semibold text-white">Livery</h1>
                            <p class="mt-2 text-sm text-gray-300">Seznam všech aktuálně hotových livery</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('admin.liveries.create') }}" class="button">Přidat livery</a>
                        </div>
                    </div>

                    <livewire:admin-livery-filter />
                </div>

            </main>
        </div>
    </div>
@endsection
