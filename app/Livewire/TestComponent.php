<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $message = 'Hello, Livewire!';

    public function updatedMessage()
    {
        logger('Message updated: ' . $this->message);
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}
