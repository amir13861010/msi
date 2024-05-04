<?php

namespace App\Livewire\Agent;

use App\Models\BuyAgent;
use App\Models\DataBuy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyList extends Component
{
    public $lists;
    public $selectedOrder;
    public $ModalOpen = false;
    public function mount()
    {
        $this->lists = BuyAgent::where("agent_id",Auth::getUser()->id)->get();
    }
    public function closeModal()
    {
        $this->ModalOpen = false;

    }
    public function ShowModal($id)
    {
        $this->selectedOrder = DataBuy::where("buy_id",$id)->get();
        $this->ModalOpen = true;
    }
    public function render()
    {
        return view('livewire.agent.buy-list');
    }
}
