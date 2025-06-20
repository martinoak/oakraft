<?php

namespace App\Livewire;

use App\Models\Livery;
use App\Models\Wishlist;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class CatalogueFilter extends Component
{
    protected const ASC = 'asc';
    protected const DESC = 'desc';
    protected const PER_PAGE = 12;

    public array $filter = [];
    public string $sortBy = 'airline';
    public string $sortDirection = self::ASC;
    public bool $showWishlistForm = false;
    public string $wishlistText = '';
    public string $formMessage = '';

    public int $page = 1;

    public function sort(string $column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === self::ASC ? self::DESC : self::ASC;
        } else {
            $this->sortBy = $column;
            $this->sortDirection = self::ASC;
        }
    }

    public function setFilter(string $field, mixed $value): void
    {
        $this->filter[$field] = $value;
        $this->page = 1;
    }

    public function toggleWishlistForm(): void
    {
        $this->showWishlistForm = ! $this->showWishlistForm;
    }

    public function wishlist(): void
    {
        Wishlist::create([
            'ip' => request()->ip(),
            'text' => $this->wishlistText,
        ]);

        $this->formMessage = 'We have accepted your request, please check back later!';
    }

    public function paginate(int $page): void
    {
        $this->page = $page;
    }

    public function getLiveries(): LengthAwarePaginator
    {
        $query = Livery::query();

        foreach ($this->filter as $field => $value) {
            if (empty($value)) {
                continue;
            }
            $query->where($field, 'like', '%'.$value.'%');
        }

        return $query->orderBy($this->sortBy, $this->sortDirection)->paginate(self::PER_PAGE, ['*'], 'page', $this->page);
    }

    public function render(): View
    {
        return view('livewire.catalogue-filter', [
            'liveries' => $this->getLiveries(),
        ]);
    }
}
