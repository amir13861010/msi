<?php

namespace App\Livewire\Agent;

use App\Models\BuyAgent;
use App\Models\DataBuy;
use Livewire\Component;

class BuyList extends Component
{
    public $lists;
    public $selectedOrder;
    public $ModalOpen = false;
    public function mount()
    {
        $this->lists = BuyAgent::all();
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
