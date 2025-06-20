<div id="admin-mobile-menu" class="relative z-50 lg:hidden hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black/80" aria-hidden="true"></div>
    <div class="fixed inset-0 flex">
        <div class="relative mr-16 flex w-full max-w-xs flex-1">
            <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                <button id="admin-mobile-menu-close" type="button" class="-m-2.5 p-2.5">
                    <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-emerald-600 px-6 pb-4">
                <div class="flex h-16 shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo-white.svg') }}" alt="Your Company" />
                </div>

                <x-admin-sidebar-items />
            </div>
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-emerald-600 px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
            <img class="h-16 py-3 w-auto" src="{{ asset('images/logo-white.svg') }}" alt="Your Company" />
        </div>

        <x-admin-sidebar-items />
    </div>
</div>
