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
                        <h1 class="text-2xl font-bold text-white">Nová livery</h1>
                    </div>
                </div>
            </div>

            <main class="py-10 px-6">

                <x-form-errors />

                <form action="{{ route('admin.liveries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12 sm:space-y-16">
                        <div>
                            <h2 class="text-base/7 font-semibold text-white">Základní informace</h2>

                            <div class="mt-10 space-y-8 border-b border-white/5 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="aircraft" class="block text-sm/6 font-medium text-white sm:pt-1.5">Letadlo</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="aircraft" id="aircraft" value="{{ old('aircraft') }}" autocomplete="off" class="sm:max-w-xs" required />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="airline" class="block text-sm/6 font-medium text-white sm:pt-1.5">Aerolinka</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="airline" id="airline" value="{{ old('airline') }}" autocomplete="off" class="sm:max-w-2xl" required />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="IATA" class="block text-sm/6 font-medium text-white sm:pt-1.5">Kód IATA</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="text" name="IATA" id="IATA" value="{{ old('IATA') }}" autocomplete="off" class="sm:max-w-xs" readonly />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="type" class="block text-sm/6 font-medium text-white sm:pt-1.5">Typ livery</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <div class="grid grid-cols-1 sm:max-w-xs">
                                            <select id="type" name="type" autocomplete="off" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pl-3 pr-8 text-base text-white outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-emerald-600 sm:text-sm/6">
                                                @foreach(\App\Enums\LiveryType::cases() as $option)
                                                    <option value="{{ $option->value }}" @selected(old('type') === $option->value)>{{ $option->value }}</option>
                                                @endforeach
                                            </select>
                                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="cover-photo" class="block text-sm/6 font-medium text-white sm:pt-1.5">Ilustrace</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-2xl justify-center rounded-lg border border-dashed border-white/30 px-6 py-10">
                                            <div id="preview" class="text-center">
                                                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                                </svg>
                                                <div class="mt-4 flex text-sm/6 text-gray-300">
                                                    <label for="file" class="relative cursor-pointer rounded-md font-semibold text-emerald-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-emerald-600 focus-within:ring-offset-2 hover:text-emerald-500">
                                                        <span>Nahrát soubor</span>
                                                        <input id="file" name="file" type="file" class="sr-only" />
                                                    </label>
                                                    <p class="pl-1">nebo drag and drop</p>
                                                </div>
                                                <p class="text-xs/5 text-gray-300">pouze .jpg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-base/7 font-semibold text-white">Cena</h2>
                            <p class="mt-1 max-w-2xl text-sm/6 text-gray-300">JPG by měl být nejlevnější, PNG dražší.</p>

                            <div class="mt-10 space-y-8 border-b border-white/5 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="price_jpg" class="block text-sm/6 font-medium text-white sm:pt-1.5">Cena za JPG</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="number" name="price_jpg" id="price_jpg" autocomplete="off" value="{{ old('price_jpg', '6.99') }}" step="0.01" class="sm:max-w-md" required />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="price_png" class="block text-sm/6 font-medium text-white sm:pt-1.5">Cena za PNG</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <input type="number" name="price_png" id="price_png" autocomplete="off" value="{{ old('price_jpg', '9.99') }}" step="0.01" class="sm:max-w-md" required />
                                    </div>
                                </div>

                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="discount-toggle" class="block text-sm/6 font-medium text-white sm:pt-1.5">Sleva</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="discount" id="discount-toggle" class="sr-only peer" @checked(old('discount'))>
                                            <div class="toggler peer peer-focus:outline-none peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                                        </label>
                                    </div>
                                </div>
                                <div id="discount-fields" style="display:none">
                                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                        <label for="discount_jpg" class="block text-sm/6 font-medium text-white sm:pt-1.5">Nová cena za JPG</label>
                                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                                            <input type="number" name="discount_jpg" id="discount_jpg" value="{{ old('discount_jpg') }}" step="0.01" autocomplete="off" class="sm:max-w-md" />
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                        <label for="discount_png" class="block text-sm/6 font-medium text-white sm:pt-1.5">Nová cena za PNG</label>
                                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                                            <input type="number" name="discount_png" id="discount_png" value="{{ old('discount_png') }}" step="0.01" autocomplete="off" class="sm:max-w-md" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h2 class="text-base/7 font-semibold text-white">Nastavení</h2>
                            <p class="mt-1 max-w-2xl text-sm/6 text-gray-300">Dodatečné nastavení livery</p>

                            <div class="mt-10 space-y-10 border-b border-white/5 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                    <label for="featured-toggle" class="block text-sm/6 font-medium text-white sm:pt-1.5">Zobrazit v nabídce</label>
                                    <div class="mt-2 sm:col-span-2 sm:mt-0">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="featured" id="featured-toggle" class="sr-only peer">
                                            <div class="toggler peer peer-focus:outline-none peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="reset" class="text-sm/6 font-semibold text-white">Zrušit</button>
                        <button type="submit" class="button px-6!">Uložit</button>
                    </div>
                </form>


            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // --- Aerolinky a IATA kódy ---
        window.airlines = @json(\App\Services\AirlineIATA::$airlines);
        window.aircraftTypes = @json(array_map(fn($c) => $c->value, \App\Enums\AircraftType::cases()));
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- File upload preview (původní kód) ---
            const fileInput = document.querySelector('input[type="file"]');
            const previewDiv = document.getElementById('preview');
            if (fileInput && previewDiv) {
                let previewContainer = document.createElement('div');
                previewContainer.style.display = 'none';
                previewContainer.style.cursor = 'pointer';
                previewContainer.id = 'file-preview-container';
                previewDiv.parentNode.insertBefore(previewContainer, previewDiv.nextSibling);
                function formatSize(bytes) {
                    if (bytes < 1024) return bytes + ' B';
                    if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
                    return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
                }
                fileInput.addEventListener('change', function () {
                    const file = fileInput.files[0];
                    if (!file) return;
                    previewDiv.style.display = 'none';
                    previewContainer.innerHTML = '';
                    if (file.type.startsWith('image/')) {
                        const img = document.createElement('img');
                        img.src = URL.createObjectURL(file);
                        img.style.maxWidth = '200px';
                        img.style.maxHeight = '200px';
                        img.style.display = 'block';
                        img.style.marginBottom = '8px';
                        previewContainer.appendChild(img);
                    }
                    const info = document.createElement('div');
                    info.textContent = `${file.name} (${formatSize(file.size)})`;
                    info.style.color = '#fff';
                    info.style.fontSize = '0.95em';
                    previewContainer.appendChild(info);
                    previewContainer.style.display = 'block';
                });
                previewContainer.addEventListener('click', function () {
                    fileInput.click();
                });
            }

            // --- Aerolinka/IATA autocomplete ---
            const airlineInput = document.getElementById('airline');
            const iataInput = document.getElementById('IATA');
            const airlines = window.airlines || {};
            if (airlineInput && iataInput) {
                // Dropdown
                const dropdown = document.createElement('ul');
                dropdown.style.position = 'absolute';
                dropdown.style.background = '#222';
                dropdown.style.color = '#fff';
                dropdown.style.border = '1px solid #444';
                dropdown.style.zIndex = 1000;
                dropdown.style.listStyle = 'none';
                dropdown.style.padding = '0';
                dropdown.style.margin = '0';
                dropdown.style.maxHeight = '180px';
                dropdown.style.overflowY = 'auto';
                dropdown.style.display = 'none';
                dropdown.className = 'airline-dropdown';
                // Umístění dropdownu relativně k inputu
                airlineInput.parentNode.style.position = 'relative';
                airlineInput.parentNode.appendChild(dropdown);

                airlineInput.addEventListener('input', function () {
                    const value = airlineInput.value.toLowerCase();
                    dropdown.innerHTML = '';
                    if (!value) {
                        dropdown.style.display = 'none';
                        return;
                    }
                    let found = false;
                    Object.keys(airlines).forEach(function (name) {
                        if (name.toLowerCase().includes(value)) {
                            const li = document.createElement('li');
                            li.textContent = name + ' (' + airlines[name] + ')';
                            li.style.padding = '4px 8px';
                            li.style.cursor = 'pointer';
                            li.addEventListener('mousedown', function (e) {
                                e.preventDefault();
                                airlineInput.value = name;
                                iataInput.value = airlines[name];
                                dropdown.style.display = 'none';
                            });
                            dropdown.appendChild(li);
                            found = true;
                        }
                    });
                    dropdown.style.display = found ? 'block' : 'none';
                });
                // Skrytí dropdownu při kliknutí mimo
                document.addEventListener('mousedown', function (e) {
                    if (!dropdown.contains(e.target) && e.target !== airlineInput) {
                        dropdown.style.display = 'none';
                    }
                });
                // Po změně airline vyplnit IATA, pokud přesně sedí
                airlineInput.addEventListener('change', function () {
                    if (airlines[airlineInput.value]) {
                        iataInput.value = airlines[airlineInput.value];
                    }
                });
            }

            // --- Letadlo autocomplete ---
            const aircraftInput = document.getElementById('aircraft');
            const aircraftTypes = window.aircraftTypes || [];
            if (aircraftInput) {
                const dropdown = document.createElement('ul');
                dropdown.style.position = 'absolute';
                dropdown.style.background = '#222';
                dropdown.style.color = '#fff';
                dropdown.style.border = '1px solid #444';
                dropdown.style.zIndex = 1000;
                dropdown.style.listStyle = 'none';
                dropdown.style.padding = '0';
                dropdown.style.margin = '0';
                dropdown.style.maxHeight = '180px';
                dropdown.style.overflowY = 'auto';
                dropdown.style.display = 'none';
                dropdown.className = 'aircraft-dropdown';
                aircraftInput.parentNode.style.position = 'relative';
                aircraftInput.parentNode.appendChild(dropdown);

                aircraftInput.addEventListener('input', function () {
                    const value = aircraftInput.value.toLowerCase();
                    dropdown.innerHTML = '';
                    if (!value) {
                        dropdown.style.display = 'none';
                        return;
                    }
                    let found = false;
                    aircraftTypes.forEach(function (type) {
                        if (type.toLowerCase().includes(value)) {
                            const li = document.createElement('li');
                            li.textContent = type;
                            li.style.padding = '4px 8px';
                            li.style.cursor = 'pointer';
                            li.addEventListener('mousedown', function (e) {
                                e.preventDefault();
                                aircraftInput.value = type;
                                dropdown.style.display = 'none';
                            });
                            dropdown.appendChild(li);
                            found = true;
                        }
                    });
                    dropdown.style.display = found ? 'block' : 'none';
                });
                document.addEventListener('mousedown', function (e) {
                    if (!dropdown.contains(e.target) && e.target !== aircraftInput) {
                        dropdown.style.display = 'none';
                    }
                });
            }

            // Sleva toggle show/hide discount fields
            var discountToggle = document.getElementById('discount-toggle');
            var discountFields = document.getElementById('discount-fields');
            function updateDiscountFields() {
                discountFields.style.display = discountToggle.checked ? '' : 'none';
            }
            discountToggle.addEventListener('change', updateDiscountFields);
            updateDiscountFields();
        });
    </script>
@endsection
