<nav class="max-w-7xl mx-auto flex items-center justify-between rounded-lg bg-white/5 shadow px-4 py-3 sm:px-6" aria-label="Pagination">
    <div class="hidden sm:block">
        <p class="text-sm text-white">
            Shown
            <span class="font-medium">{{ $paginable->firstItem() }}</span>
            -
            <span class="font-medium">{{ $paginable->lastItem() }}</span>
            of
            <span class="font-medium">{{ $paginable->total() }}</span>
            total results
        </p>
    </div>
    <div class="flex flex-1 justify-between sm:justify-end space-x-2">
        @if($paginable->onFirstPage())
            <button class="button-gray cursor-not-allowed">Předchozí</button>
        @else
            <button wire:click="paginate({{ $paginable->currentPage() - 1 }})" class="button-gray">Předchozí</button>
        @endif

        @if($paginable->hasMorePages())
            <button wire:click="paginate({{ $paginable->currentPage() + 1 }})" class="button">Další</button>
        @else
            <button class="button cursor-not-allowed">Další</button>
        @endif
    </div>
</nav>
