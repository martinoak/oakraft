<?php

namespace App\Livewire;

use App\Models\Livery;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;

class AdminLiveryFilter extends Component
{
    protected const ASC = 'asc';
    protected const DESC = 'desc';
    protected const PER_PAGE = 12;

    public array $filter = [];
    public string $sortBy = 'updated_at';
    public string $sortDirection = self::DESC;

    public array $updateBooleans = [];

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

        if (! empty($this->updateBooleans)) {
            foreach ($this->updateBooleans as $boolean) {
                $query->where($boolean, true);
            }
        }

        return $query->orderBy($this->sortBy, $this->sortDirection)->paginate(self::PER_PAGE, ['*'], 'page', $this->page);
    }

    public function render(): View
    {
        return view('livewire.admin-livery-filter', [
            'liveries' => $this->getLiveries(),
        ]);
    }
}
