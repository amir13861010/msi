<?php

namespace App\Livewire\Admin;

use App\Models\Credit;
use App\Models\Product;
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
    public function Delete($id)
    {
        $product = Credit::find($id);
        $data = Product::find($product->product_id);
        $data->update([
            "status"=>0,
        ]);
        $product->delete();
        $this->redirect("/selled-products");
    }
    public function render()
    {
        return view('livewire.admin.selled-products');
    }
}
