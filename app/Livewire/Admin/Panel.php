<?php

namespace App\Livewire\Admin;

use App\Models\Gift;
use App\Models\User;
use Livewire\Component;

class Panel extends Component
{
    public $users;
    public $agents;
    public $buyers;
    public $gifts;
    public function mount()
    {
        $this->users = User::all()->count();
        $this->agents = User::where("status",2)->count();
        $this->buyers = User::where("status",1)->count();
        $this->gifts = Gift::all()->count();
    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
