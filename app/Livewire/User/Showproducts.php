<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Gift;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Showproducts extends Component
{

    public function render()
    {
        return view('livewire.user.showproducts');
    }
}
