<?php

namespace App\Livewire\Agent;

use App\Models\BuyAgent;
use App\Models\SellAgent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $buys;
    public $sells;

    public function mount()
    {
        $this->buys = BuyAgent::where("agent_id",Auth::getUser()->id)->latest()->take(3)->get();
        $this->sells = SellAgent::where("agent_id",Auth::getUser()->id)->latest()->take(3)->get();
    }
    public function render()
    {
        return view('livewire.agent.dashboard');
    }
}
