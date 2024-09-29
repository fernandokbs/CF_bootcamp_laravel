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
        $cachePrefix = Cache::get('products_cache_prefix', 'default_prefix');
        $key = $cachePrefix . '_page_' . $this->search . '_' . request()->input('page', 1);

        $products = Cache::remember($key, 60 * 60, function () {
            return Product::with('categories')
                ->where('name', 'like', '%' . $this->search . '%')
                ->where('visible', 1)
                ->orderBy('id', 'desc')
                ->paginate(10);
        });

        return view('livewire.home-product-search', ['products' => $products]);
    }
}
