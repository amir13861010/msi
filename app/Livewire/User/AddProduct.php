<?php

namespace App\Livewire\User;

use App\Models\Credit;
use App\Models\Product;
use App\Models\UserInfo;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Sodium\increment;

class AddProduct extends Component
{
    public $products = []; // آرایه‌ای برای ذخیره محصولات
    public $categories;

    public $category_id;
    public $serial;

    public function mount()
    {
        $this->categories = \App\Models\Category::all();
    }

    public function addProduct()
    {
        $this->reset('category_id', 'serial');

        $this->products[] = [
            'name' => '',
            'price' => '',
            'isSubmitted' => false,
        ];
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->products = array_values($this->products); // بازسازی اندیس‌ها
    }

    public function fetchProductData($index)
    {
        $product = $this->products[$index];
        if (!isset($product['category_id']) || !isset($product['serial'])) {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "دسته بندی یا سریال وارد نشده است");

            return;
        }
        $productModel = Product::where('category_id', $product['category_id'])
            ->where('serial', $product['serial'])
            ->first();

        if ($productModel) {
            if ($productModel->status == 0) {
                $this->products[$index]['name'] = $productModel->name;
                $this->products[$index]['price'] = $productModel->score;
                $productModel->update([
                    "status"=>1
                ]);
                Credit::create([
                    "user_id"=>Auth::getUser()->id,
                    "product_id"=>$productModel->id,
                ]);
                $user = UserInfo::where("user_id",Auth::getUser()->id);
                $user->increment('coins', $productModel->score);

                $this->products[$index]['isSubmitted'] = true;
                $productModel = null;
            } else {
                $this->dispatch('swal:modal', title: "خطا", type: "error", text: "این محصول قبلا ثبت شده است");

                return;
            }
        } else {
            $this->products[$index]['name'] = null;
            $this->products[$index]['price'] = null;

            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "محصولی یافت نشد");

            return;
        }
    }
    public function render()
    {
        return view('livewire.user.add-product');
    }
}
