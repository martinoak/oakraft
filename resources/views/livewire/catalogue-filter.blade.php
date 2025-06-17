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

            <div class="-mx-px grid grid-cols-2 border-l border-white/5 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
                @foreach($liveries as $livery)
                    <div class="group relative border-b border-r border-white/5 p-4 sm:p-6">
                        <img src="{{ $livery->path }}" alt="{{ $livery->aircraft }}" class="aspect-square rounded-lg bg-gray-200 object-cover group-hover:opacity-75" />
                        <div class="pb-4 pt-10 text-center">
                            <h3 class="text-sm font-medium text-white">
                                <a href="{{ route('livery.show', ['livery' => $livery->id . '-' . strtolower(\Illuminate\Support\Str::slug($livery->airline) . '-' . $livery->aircraft)]) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $livery->airline }} {{ $livery->aircraft }}
                                </a>
                            </h3>
                            <p class="mt-4 text-base font-medium text-emerald-600">from ${{ min($livery->price_jpg, $livery->price_png) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <nav class="max-w-7xl mx-auto flex items-center justify-between rounded-lg bg-white/5 shadow px-4 py-3 sm:px-6" aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-white">
                Shown
                <span class="font-medium">{{ $liveries->firstItem() }}</span>
                -
                <span class="font-medium">{{ $liveries->lastItem() }}</span>
                of
                <span class="font-medium">{{ $liveries->total() }}</span>
                total results
            </p>
        </div>
        <div class="flex flex-1 justify-between sm:justify-end">
            @if($liveries->onFirstPage())
                <span class="relative inline-flex items-center rounded-md bg-[#212121] px-3 py-2 text-sm font-semibold text-white ring-1 ring-gray-300 ring-inset opacity-50 cursor-not-allowed">Předchozí</span>
            @else
                <a href="{{ $liveries->previousPageUrl() }}" class="relative inline-flex items-center rounded-md bg-[#212121] px-3 py-2 text-sm font-semibold text-white ring-1 ring-gray-300 ring-inset hover:bg-black/40 focus-visible:outline-offset-0">Předchozí</a>
            @endif

            @if($liveries->hasMorePages())
                <a href="{{ $liveries->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-emerald-500 focus-visible:outline-offset-0">Další</a>
            @else
                <span class="relative ml-3 inline-flex items-center rounded-md bg-emerald-600 px-3 py-2 text-sm font-semibold text-gray-900 opacity-50 cursor-not-allowed">Další</span>
            @endif
        </div>
    </nav>

</div>
