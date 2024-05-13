<?php

namespace App\Livewire\Admin;

use App\Models\DataBuy;
use App\Models\DataSell;
use App\Models\Gift;
use App\Models\User;
use Livewire\Component;

class Panel extends Component
{
    public $users;
    public $agents;
    public $buyers;
    public $gifts;
    public $AgentsSells;
    public $AgentsBuys;
    public $AgentsSellsPrice;
    public $AgentsBuysPrice;
    public function mount()
    {
        $this->users = User::all()->count();
        $this->agents = User::where("status",2)->count();
        $this->buyers = User::where("status",1)->count();
        $this->gifts = Gift::all()->count();
        $this->AgentsSells = DataSell::all()->sum("count");
        $this->AgentsBuys = DataBuy::all()->sum("count");
        $this->AgentsSellsPrice = DataSell::all()->sum("price");
        $this->AgentsBuysPrice = DataBuy::all()->sum("price");
    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
