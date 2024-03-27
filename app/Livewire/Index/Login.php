<?php

namespace App\Livewire\Index;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.index.login')->layout("components.layouts.app2");
    }
}
