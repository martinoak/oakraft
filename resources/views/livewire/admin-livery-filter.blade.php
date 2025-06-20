<div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="flex flex-col py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                            <span wire:click="sort('airline')">Aerolinka
                                @if ($sortBy === 'airline')
                                    <span>@if($sortDirection === 'asc') ↑ @else ↓ @endif</span>
                                @endif
                            <input class="mt-2" type="text" wire:input="setFilter('airline', $event.target.value)">
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                            <span wire:click="sort('aircraft')">Letadlo
                                @if ($sortBy === 'aircraft')
                                    <span>@if($sortDirection === 'asc') ↑ @else ↓ @endif</span>
                                @endif
                            </span>
                            <input class="mt-2" type="text" wire:input="setFilter('aircraft', $event.target.value)">
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                            <span>Kategorie</span>
                            <fieldset>
                                <div class="mt-2 grid grid-cols-3 gap-3 sm:grid-cols-2">
                                    <label class="group relative flex items-center justify-center rounded-md border border-gray-300 bg-[#212121] px-3 py-2.5 has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-600 has-[:disabled]:opacity-25 has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-emerald-600">
                                        <input type="checkbox" wire:model.live="updateBooleans" value="on_sale" class="absolute inset-0 appearance-none focus:outline-none disabled:cursor-not-allowed" />
                                        <span class="text-sm font-medium group-has-checked:text-white">Sleva</span>
                                    </label>
                                    <label class="group relative flex items-center justify-center rounded-md border border-gray-300 bg-[#212121] px-3 py-2.5 has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-600 has-[:disabled]:opacity-25 has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-emerald-600">
                                        <input type="checkbox" wire:model.live="updateBooleans" value="featured" class="absolute inset-0 appearance-none focus:outline-none disabled:cursor-not-allowed" />
                                        <span class="text-sm font-medium group-has-checked:text-white">Featured</span>
                                    </label>
                                </div>
                            </fieldset>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">
                            <span wire:click="sort('price')">Cena
                                @if ($sortBy === 'price')
                                    <span>@if($sortDirection === 'asc') ↑ @else ↓ @endif</span>
                                @endif
                            </span>
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">Akce</span>
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
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 space-x-2">
                                    @if($livery->on_sale)
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Sleva</span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20">Bez slevy</span>
                                    @endif
                                    @if($livery->featured)
                                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20">Featured</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500 space-x-2">
                                    <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20">JPG ${{ $livery->price_jpg }}</span>
                                    <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20">PNG ${{ $livery->price_png }}</span>
                                </td>
                                <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <a href="{{ route('admin.liveries.show', ['livery' => $livery->id]) }}" class="text-emerald-600 hover:text-emerald-900">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
