<?php

namespace App\Livewire\Components;

use App\Models\Basket;
use App\Models\Rating;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SideBar extends Component
{
    public $coins;
    public $rating;
    public $basket;
    public $showRed = false;

    public function mount()
    {
        if(Auth::getUser()->password == null)
        {
            $this->showRed = true;
        }
        if (Auth::getUser()->status == 1) {
            $coins = UserInfo::where("user_id", Auth::getUser()->id)->first();
            $this->basket = Basket::where("user_id", Auth::getUser()->id)->where("status", 0)->count();
            $this->coins = $coins->coins;
            $this->rating = Rating::where('from', '<=', $this->coins)
                ->where('to', '>=', $this->coins)
                ->first();
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect("/");
    }

    public function CehckProfile()
    {
        if (Auth::getUser()->status == 0) {
            return asset('images/software-engineer.png');
        } elseif (Auth::getUser()->status == 1) {
            // Fetch avatar based on coins range from Rating table


            if ($this->rating) {
                return url('storage/' . $this->rating->avatar);
            } else {
                // Return default avatar if no matching range found
                return asset('images/default_avatar.png');
            }
        }elseif (Auth::getUser()->status == 2)
        {
            return asset('images/businessman.png');

        }
    }

    public function SendToEdit()
    {
        if (Auth::getUser()->status == 0) {
            $this->redirect(route("AdminAccount"));
        }
    }

    public function render()
    {
        return view('livewire.components.side-bar');
    }
}
