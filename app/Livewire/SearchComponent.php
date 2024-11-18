<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    #[Url(as: 'search',history: true)]
    public $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        $products = Product::search($this->search)
            ->with(['category', 'media'])
            ->latest()
            ->paginate(12);

        return view('livewire.search-component', compact('products'));
    }
}
