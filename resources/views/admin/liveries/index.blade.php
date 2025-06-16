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
                        <h1 class="text-2xl font-bold text-white">Přehled liveries</h1>
                    </div>
                </div>
            </div>

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
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="flex flex-col py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                            <span wire:click="sort('airline')">Aerolinka <i class="fa-solid fa-sort"></i></span>
                                            <input class="mt-2" type="text" wire:input="setFilter('airline', $event.target.value)">
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                            <span wire:click="sort('name')">Letadlo <i class="fa-solid fa-sort"></i></span>
                                            <input class="mt-2" type="text" wire:input="setFilter('name', $event.target.value)">
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                            <span wire:click="sort('name')">Kategorie <i class="fa-solid fa-sort"></i></span>
                                            <input class="mt-2" type="text" wire:input="setFilter('name', $event.target.value)">
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                                            <span wire:click="sort('name')">Cena <i class="fa-solid fa-sort"></i></span>
                                            <input class="mt-2" type="text" wire:input="setFilter('name', $event.target.value)">
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Detail</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($liveries ?? [] as $livery)
                                            <tr>
                                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                                    <div class="flex items-center">
                                                        <div class="size-11 shrink-0">
                                                            <img class="size-11 object-contain" src="{{ asset('images/tails/'.$livery->IATA.'.png') }}" alt="{{ $livery->IATA }}" />
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="font-medium text-white">{{ $livery->airline }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <div class="text-white">{{ explode(' ', $livery->aircraft)[0] }}</div>
                                                    <div class="mt-1 text-gray-500">{{ explode(' ', $livery->aircraft)[1] }}</div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                                <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <a href="#" class="text-emerald-600 hover:text-emerald-900">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
@endsection
