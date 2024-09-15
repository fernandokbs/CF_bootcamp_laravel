<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserSearch extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        // Log para verificar si se actualiza la búsqueda
        logger('Search updated: ' . $this->search);
    }

    public function render()
    {
        // Realizar la búsqueda en base al valor de $search
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.user-search', ['users' => $users]);
    }
}
