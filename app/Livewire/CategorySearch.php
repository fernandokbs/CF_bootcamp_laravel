<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategorySearch extends Component
{
    public $search = '';

    public function render()
    {
        // Realizar la búsqueda en base al valor de $search
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.category-search', ['categories' => $categories]);
    }
}
