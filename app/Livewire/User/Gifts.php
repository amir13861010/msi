<?php

namespace App\Livewire\User;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Gift;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Gifts extends Component
{
    public $gifts;
    public $beast;
    public $categories;
    public $category;
    public $quantity;

    public $searchText;
    public $coins;
    public function mount()
    {
        $this->gifts = Gift::all();
        $this->categories = Category::all();
        $user = UserInfo::where("user_id",Auth::getUser()->id)->first();
        $this->coins = $user->coins;
        $this->quantity = array_fill(0, count($this->gifts), 1);

    }
    public function clearFilters()
    {
        $this->reset(['searchText', 'beast', 'category']);
        $this->showPurchasableProducts(); // Fetch default list of products
    }
    public function showPurchasableProducts()
    {


        $this->gifts = Gift::where('score', '<', $this->coins)
            ->get();

    }

    public function selectGift($giftId, $quantity, $giftName,$selectedGift)
    {
        // اینجا می‌توانید با استفاده از متغیرهای دریافتی اطلاعات مورد نیاز را پردازش کنید
        // مثلا می‌توانید آن‌ها را در آرایه‌ای ذخیره کنید یا به روش دیگری استفاده کنید
        // در این مثال، از روش دیگر استفاده می‌کنیم و این اطلاعات را به وسیله session فرستاده و در صفحه دیگری ذخیره می‌کنیم
        $index = $this->gifts->search(function ($item) use ($giftId) {
            return $item->id == $giftId;
        });

        $quantity = intval($this->quantity[$index]);
        $totalCost = $selectedGift * $quantity;

        // Check if the user has enough coins to make the purchase
        if ($totalCost <= $this->coins) {
            // Subtract the total cost from the user's coins
            $user = UserInfo::where("user_id", Auth::user()->id)->first();

            // Subtract the total cost from the user's coins
            $user->coins -= $totalCost;

            // Save the updated user information
            $user->save();
            Basket::create([
                "user_id"=>Auth::getUser()->id,
                "product_id"=>$giftId,
                "quantity"=>$quantity,
                "total_coins"=>$totalCost,
            ]);
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "محصول مورد نظر با موفقیت به سبد خرید افزوده شد");

            $this->redirect("/gift-shop");
            // Optionally, you can update the user's coins in the database here

            // Redirect or perform any other actions
        }


        // Redirect یا انجام هر عملیاتی که نیاز دارید
    }
    public function search()
    {
        if (!empty($this->searchText)) {
            $this->gifts = Gift::where('name', 'like', '%' . $this->searchText . '%')->get();
        } else {
            $this->gifts = Gift::all();
        }
    }
    public function applyFilter()
    {
        if (!empty($this->category)) {
            if ($this->beast == 1) {
                $this->gifts = Gift::where('category_id', $this->category)->orderBy('score', 'desc')->get();
            } elseif ($this->beast == 2) {
                $this->gifts = Gift::where('category_id', $this->category)->orderBy('score', 'asc')->get();
            } else {
                $this->gifts = Gift::where('category_id', $this->category)->get();
            }
        } else {
            if ($this->beast == 1) {
                $this->gifts = Gift::orderBy('score', 'desc')->get();
            } elseif ($this->beast == 2) {
                $this->gifts = Gift::orderBy('score', 'asc')->get();
            }
        }
    }


    public function render()
    {

        return view('livewire.user.gifts');
    }
}
