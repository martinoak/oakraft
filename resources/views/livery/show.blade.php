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
                            <p id="livery-price" class="text-xl font-extrabold text-emerald-600"></p>
                        </div>

                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-medium text-gray-300">{{ $livery->airline }}</h1>
                        </div>
                    </div>

                    <!-- Image gallery -->
                    <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
                        <h2 class="sr-only">Images</h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 lg:grid-rows-3 lg:gap-8">
                            <img src="{{ asset($livery->path) }}" alt="{{ $livery->aircraft }}" class="rounded-lg lg:col-span-2 lg:row-span-2 min-w-full" />
                        </div>
                    </div>

                    <div class="mt-8 lg:col-span-5">
                        <form>
                            <!-- Size picker -->
                            <div class="mt-8 mb-4">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-gray-300">File type</h2>
                                </div>
                            </div>

                            <fieldset aria-label="Choose a memory option">
                                <div class="mt-2 grid grid-cols-1 gap-3">
                                    <label aria-label="4 GB" class="group relative flex items-center justify-center rounded-md border border-gray-300 bg-[#212121] px-3 py-2.5 has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-600 has-[:disabled]:opacity-25 has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-emerald-600">
                                        <input type="radio" name="file-type" value="jpg" class="absolute inset-0 appearance-none focus:outline-0 cursor-pointer disabled:cursor-not-allowed" />
                                        <span class="text-sm font-semibold uppercase text-white">JPG (White background)</span>
                                    </label>
                                    <label aria-label="8 GB" class="group relative flex items-center justify-center rounded-md border border-gray-300 bg-[#212121] px-3 py-2.5 has-[:checked]:border-emerald-600 has-[:checked]:bg-emerald-600 has-[:disabled]:opacity-25 has-[:focus-visible]:outline-2 has-[:focus-visible]:outline-offset-2 has-[:focus-visible]:outline-emerald-600">
                                        <input type="radio" name="file-type" value="png" class="absolute inset-0 appearance-none focus:outline-0 cursor-pointer disabled:cursor-not-allowed" />
                                        <span class="text-sm font-semibold uppercase text-white">PNG (Transparent background)</span>
                                    </label>
                                </div>
                            </fieldset>

                            <hr class="border-gray-300 my-6">

{{--                            <button type="submit" class="mt-8 flex w-full items-center justify-center rounded-md border border-transparent bg-emerald-600 px-8 py-3 text-base font-medium text-white hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">Add to cart</button>--}}

                            <button type="submit" class="mt-8 flex w-full items-center justify-center rounded-md border border-transparent bg-black/20 px-8 py-3 text-base font-medium text-white cursor-not-allowed" disabled>Add to cart</button>
                        </form>

                        <!-- Product details -->
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-300">Disclaimer</h2>

                            <div class="mt-4 space-y-4 text-sm/6 text-gray-300">
                                <p>The shop is a work in progress. If you want to buy any livery (can be more of them), please reach out to me at <a href="mailto:hello@oakraft.eu" class="text-emerald-600 hover:text-emerald-800 underline">hello@oakraft.eu</a>.</p>
                            </div>

                            <hr class="border-gray-300 my-6">

                            <h2 class="text-sm font-medium text-gray-300">Disclaimer 2</h2>

                            <div class="mt-4 space-y-4 text-sm/6 text-gray-300">
                                <p>All liveries are of a high quality. If you are not satisfied with the quality, please reach out to me and we can work something out. You can reach me at <a href="mailto:hello@oakraft.eu" class="text-emerald-600 hover:text-emerald-800 underline">hello@oakraft.eu</a>.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceJpg = {{ $livery->price_jpg }};
        const pricePng = {{ $livery->price_png }};
        const priceEl = document.getElementById('livery-price');
        const radios = document.querySelectorAll('input[name="file-type"]');

        function updatePrice() {
            const checked = document.querySelector('input[name="file-type"]:checked');
            if (!checked) {
                priceEl.textContent = 'from $' + Math.min(priceJpg, pricePng);
            } else if (checked.value === 'jpg') {
                priceEl.textContent = '$' + priceJpg;
            } else if (checked.value === 'png') {
                priceEl.textContent = '$' + pricePng;
            }
        }

        radios.forEach(radio => {
            radio.addEventListener('change', updatePrice);
        });

        updatePrice();
    });
</script>
@endsection
