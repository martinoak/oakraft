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
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">8,000+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Aerolinek</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">25+</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Počet objednávek</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">4</dd>
                    </div>
                    <div class="flex flex-col bg-white/5 p-8">
                        <dt class="text-sm/6 font-semibold text-gray-300">Vyděláno</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-white">6500 Kč</dd>
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
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Aerolinka</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Letadlo</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Kategorie</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Cena</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Detail</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="size-11 shrink-0">
                                                <img class="size-11 object-contain" src="{{ asset('images/tails/EY.png') }}" alt="" />
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-white">Etihad Airways</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-white">Boeing</div>
                                        <div class="mt-1 text-gray-500">787-9 Dreamliner</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">Member</td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="#" class="text-emerald-600 hover:text-emerald-900">Detail</a>
                                    </td>
                                </tr>

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
