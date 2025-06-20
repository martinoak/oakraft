<div>
    <div class="max-w-7xl mx-auto mt-4 overflow-hidden rounded-lg bg-white/5 shadow">
        <div class="px-4 py-5 sm:p-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="aircraft" class="block text-sm/6 font-medium text-white">Aircraft</label>
                <div class="mt-2">
                    <input type="text" id="aircraft" autocomplete="off" placeholder="Airbus A350-900" wire:input="setFilter('aircraft', $event.target.value)" />
                </div>
            </div>

            <div>
                <label for="airline" class="block text-sm/6 font-medium text-white">Airline</label>
                <div class="mt-2">
                    <input type="text" id="airline" autocomplete="off" placeholder="Delta Airlines" wire:input="setFilter('airline', $event.target.value)" />
                </div>
            </div>
        </div>
    </div>


    <div class="bg-[#212121]">
        <div class="mx-auto max-w-7xl overflow-hidden sm:px-6 lg:px-8">
            <h2 class="sr-only">Products</h2>

            @forelse($liveries as $livery)
                @once
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @endonce
                <div class="group relative border-b border-r border-white/5 p-4 sm:p-6">
                    <img src="{{ $livery->path }}" alt="{{ $livery->aircraft }}" class="aspect-[4/3] w-full rounded-lg bg-[#212121] object-contain" />
                    <div class="pb-4 pt-10 text-center">
                        <h3 class="text-sm font-medium text-white">
                            <a href="{{ route('livery.show', ['livery' => $livery->id . '-' . strtolower(\Illuminate\Support\Str::slug($livery->airline) . '-' . \Illuminate\Support\Str::slug($livery->aircraft))]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $livery->airline }} {{ $livery->aircraft }}
                            </a>
                        </h3>
                        <p class="mt-4 text-base font-medium text-emerald-600">from ${{ min($livery->price_jpg, $livery->price_png) }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center mt-6">
                    <svg class="mx-auto size-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-white">No liveries found</h3>
                    <p class="mt-1 text-sm text-gray-500">Hey! You can wishlist a livery!</p>
                    <div class="flex flex-col justify-center gap-4 mt-6">
                        <button type="button" wire:click="toggleWishlistForm()" class="button mx-auto max-w-sm">
                            @if($showWishlistForm) <i class="fa-solid fa-minus fa-xl mr-2"></i> @else <i class="fa-solid fa-plus fa-xl mr-2"></i> @endif
                            @if($showWishlistForm) Hide request form @else Request a livery @endif
                        </button>

                        @if($showWishlistForm)
                            <form method="post" wire:submit="wishlist" class="flex max-w-7xl mx-auto space-x-2">
                                @csrf
                                <input type="text" wire:model="wishlistText" class="w-64">
                                <button type="submit" class="button">Send</button>
                            </form>
                            @if(! empty($formMessage))
                                <span class="text-emerald-600 font-bold">{{ $formMessage }}</span>
                            @endif
                        @endif
                    </div>
                </div>
            @once
                </div>
            @endonce
            @endforelse
        </div>
    </div>

    <x-pagination :paginable="$liveries" />

</div>
