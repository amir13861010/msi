<?php

namespace App\Livewire\Agent;

use App\Models\BuyAgent;
use App\Models\DataBuy;
use App\Models\month;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyOrders extends Component
{
    public $months;
    public $monthinput;
    public $categories;

    public $products = [];

    public function mount()
    {
        $this->months = month::all();
        $this->categories = \App\Models\Category::all();

    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products); // بازسازی اندیس‌ها
    }

    public function check()
    {
        foreach ($this->products as $index => $product) {
            if (empty($product['count']) && empty($product['price']) && empty($product['category_id'])) {
                unset($this->products[$index]);
            }

        }
        if ($this->monthinput == null) {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "ماه وارد نشده است");
            return;
        } elseif ($this->products == null) {


            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "حداقل یک سفارش باید وارد شود");
            return;
        }elseif (empty($product['count']) || empty($product['price']) || empty($product['category_id'])) {

            $indexNum = $index;
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: " رکورد شماره $indexNum ناقص میباشد ");
            return;
        } else
        {
            $buy = new BuyAgent();
            $buy->agent_id = Auth::getUser()->id;
            $buy->month_id = $this->monthinput;
            $buy->save();
            foreach ($this->products as $technical_responsible) {
                $data = new DataBuy(); // ایجاد شیء جدید برای هر دوره از حلقه
                $data->category_id = $technical_responsible['category_id'];
                $data->count = $technical_responsible['count'];
                $data->price = $technical_responsible['price'];
                $data->buy_id = $buy->id;
                $data->save(); // ذخیره کردن شیء فعلی Seller
            }
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: " با موفقیت افزوده شد");
            $this->products = [];
            $this->monthinput = null;
            return;
        }
    }

    public function addProduct()
    {

        $this->products[] = [
            'count' => '',
            'price' => '',
        ];
    }

    public function render()
    {
        return view('livewire.agent.buy-orders');
    }
}
