<?php

namespace App\Livewire\Admin;

use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Dompdf\Dompdf;
use Dompdf\Options;
class SelledProducts extends Component
{
    public $products;


    public function mount()
    {
        $this->products = Credit::all();
    }
    public function render()
    {
        return view('livewire.admin.selled-products');
    }
}
