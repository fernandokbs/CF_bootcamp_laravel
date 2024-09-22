<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientSearch extends Component
{
    public $search = '';

    public function render()
    {
        // Realizar la búsqueda en base al valor de $search
        $clients = Client::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.client-search', ['clients' => $clients]);
    }
}
