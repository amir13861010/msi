<?php

namespace App\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyOrders extends Component
{
    public $ModalOpen = false;
    public $orders;
    public $selectedOrder;
    public function mount()
    {
        $this->orders = Order::where("user_id",Auth::getUser()->id)->get();
    }
    public function closeModal()
    {
        $this->ModalOpen = false;

    }
    public function ShowModal($id)
    {
        $this->selectedOrder = Order::find($id);
        $this->ModalOpen = true;
    }
    public function render()
    {
        return view('livewire.user.my-orders');
    }
}
