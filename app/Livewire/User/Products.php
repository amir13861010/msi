<?php

namespace App\Livewire\User;

use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Products extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Credit::where("user_id",Auth::getUser()->id)->get();
    }
    public function render()
    {
        return view('livewire.user.products');
    }
}
