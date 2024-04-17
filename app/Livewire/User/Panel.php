<?php

namespace App\Livewire\User;

use App\Models\Credit;
use App\Models\Gift;
use App\Models\Rating;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Panel extends Component
{
    public $coins;
    public $rating;
    public $credits;
    public $gifts;
    public $quantity;


    public function mount()
    {

        $coins = UserInfo::where("user_id", Auth::getUser()->id)->first();
            $this->coins = $coins->coins;
        $this->rating = Rating::where('from', '<=', $this->coins)
            ->where('to', '>=', $this->coins)
            ->first();
        $this->credits = Credit::where("user_id",Auth::getUser()->id)->count();


        $this->gifts = Gift::where('score', '<', $this->coins)
            ->get();

    }
    public function render()
    {
        return view('livewire.user.panel');
    }
}
