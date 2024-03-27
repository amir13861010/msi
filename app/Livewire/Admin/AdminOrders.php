<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AdminOrders extends Component
{
    public $orders;
    public $ModalOpen = false;
    public $selectedOrder;

    public function mount()
    {
        $this->orders = Order::all();
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
        return view('livewire.admin.admin-orders');
    }
}
