<?php

namespace App\Livewire\Agent;

use App\Models\DataSell;
use App\Models\SellAgent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SellList extends Component
{
    public $lists;
    public $selectedOrder;
    public $ModalOpen = false;
    public function mount()
    {
        $this->lists = SellAgent::where("agent_id",Auth::getUser()->id)->get();
    }
    public function closeModal()
    {
        $this->ModalOpen = false;

    }
    public function ShowModal($id)
    {
        $this->selectedOrder = DataSell::where("sell_id",$id)->get();
        $this->ModalOpen = true;
    }
    public function render()
    {
        return view('livewire.agent.sell-list');
    }
}
