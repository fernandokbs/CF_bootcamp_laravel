<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Product;

use Illuminate\Support\Facades\Cache;

class HomeProductSearch extends Component
{
    public $search = '';

    public function render()
    {
        $products = Cache::remember('products_page_' . $this->search . '_' . request()->input('page', 1), 60 * 60, function () {
            return Product::with('categories')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
        });

        return view('livewire.home-product-search', ['products' => $products]);
    }
}
