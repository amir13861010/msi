<?php

namespace App\Livewire\User;

use App\Models\Order;
use App\Models\UserInfo;
use Baloot\Models\City;
use Baloot\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Basket extends Component
{
    public $baskets;
    public $showButton;
    public $basketQuantities = [];
    public $initialQuantities = [];
    public $userCoins;
    public $Modal = false;
    public $provinces;
    public $city;
    public $state;
    public $selectedCity;
    public $address;
    public $comment;
    private $validator;

    public function mount()
    {
        $this->baskets = \App\Models\Basket::where("user_id", Auth::getUser()->id)->where("status", 0)->get();
        $this->refreshTotalQuantities();

        foreach ($this->baskets as $index => $basket) {
            $this->basketQuantities[$index] = $basket->quantity;
            // Store the initial quantity of each basket item
            $this->initialQuantities[$index] = $basket->quantity;
        }
        $userInfo = UserInfo::where("user_id", Auth::getUser()->id)->first();
        $this->userCoins = $userInfo->coins;

        $this->provinces = Province::all();
    }

    public function updated()
    {
        $this->city = City::where("province_id", $this->state)->get();
    }

    public function removeItemFromBasket($basketId)
    {
        $basket = \App\Models\Basket::find($basketId);

        if ($basket) {
            // بازگرداندن تعداد سکه‌های مصرفی به حساب کاربر
            // بازگرداندن تعداد سکه‌های مصرفی به حساب کاربر
            $user = $basket->user;
            $userInfo = UserInfo::where("user_id", $user->id)->first();

            if ($userInfo) {
                $userInfo->update([
                    "coins" => $userInfo->coins + $basket->total_coins,
                ]);
            }


            // حذف محصول از سبد خرید
            $basket->delete();


            // رفرش مجموع تعداد محصولات و تعداد سکه‌ها
            $this->refreshTotalQuantities();
            $this->redirect(route("UserBasket"));
        }
    }

    public function refreshTotalQuantities()
    {
        $this->totalQuantity = 0;
        $this->totalcoins = 0;

        foreach ($this->baskets as $basket) {
            $this->totalQuantity += $basket->quantity;
            $this->totalcoins += $basket->total_coins;
        }
    }

    public function test()
    {
        // Update the quantities of each item in the basket based on user input
        foreach ($this->baskets as $index => $basket) {
            // Update the quantity of the basket item
            $newQuantity = $this->basketQuantities[$index];
            $initialQuantity = $this->initialQuantities[$index];

            // Calculate the difference in quantity
            $quantityDifference = $newQuantity - $initialQuantity;

            // Update the quantity and total coins of the basket item
            $basket->quantity = $newQuantity;
            $basket->total_coins = $newQuantity * $basket->gift->score;
            $basket->save();

            // Fetch the user info
            $user = $basket->user;
            $userInfo = UserInfo::where("user_id", $user->id)->first();

            if ($userInfo) {
                // Add or deduct coins based on quantity difference
                if ($quantityDifference > 0) {
                    // Deduct coins from the user's account
                    $userInfo->update([
                        "coins" => $userInfo->coins - ($quantityDifference * $basket->gift->score),
                    ]);
                } elseif ($quantityDifference < 0) {
                    // Add coins to the user's account
                    $userInfo->update([
                        "coins" => $userInfo->coins + (-$quantityDifference * $basket->gift->score),
                    ]);
                }
            }
        }

        // Redirect back to the user basket page
        $this->redirect(route("UserBasket"));
    }

    public function ShowModal()
    {
        $this->Modal = true;

    }

    public function closeModal()
    {
        $this->Modal = false;
    }

    public function SubmitData()
    {
        $this->validator = Validator::make([
            'province' => $this->state,
            'city' => $this->selectedCity,
            'address' => $this->address,

        ], [
            'province' => ['required'],
            'city' => ['required', 'numeric'],
            'address' => ['required'],
        ], [
            'province.required' => 'استان وارد نشده است',
            'city.required' => 'شهر وارد نشده است',
            'address.required' => ' آدرس وارد نشده است',

        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            foreach ($this->baskets as $basket) {

                Order::create([
                    "credit_id"=>$basket->id,
                    "city_id"=>$this->selectedCity,
                    "province_id"=>$this->state,
                    "address"=>$this->address,
                    "user_id"=>Auth::getUser()->id,
                    "comment"=>$this->comment != null ? $this->comment : null,
                ]);

                    $basket->update(['status' => 1]);
                $this->dispatch('swal:modal', title: "موفق", type: "success", text: "خرید با موفقیت ثبت شد");
                $this->closeModal();
                $this->redirect(route("UserBasket"));
            }
        }
    }

    public function render()
    {
        return view('livewire.user.basket');
    }
}
