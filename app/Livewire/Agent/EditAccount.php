<?php

namespace App\Livewire\Agent;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditAccount extends Component
{
    public $name;
    public $phone;
    public $password;
    public $status = false;
    public $user;
    public $passwordConfirmation;

    public function mount()
    {
        $this->name = Auth::getUser()->name;
        $this->phone = Auth::getUser()->phone;
    }

    public function updated()
    {
        if ($this->name != Auth::getUser()->name || $this->password != Auth::getUser()->password) {
            $this->status = true;

        } else {
            $this->status = false;
        }
    }

    public function updateData()
    {
        if ($this->password == null) {
            $this->user = User::find(Auth::getUser()->id);
            $this->user->update([
                "name" => $this->name,
                "phone" => $this->phone,

            ]);
            $this->status = false;
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "پروفایل با موفقیت ویرایش شد");
        } elseif ($this->password != null) {
            $this->user = User::find(Auth::getUser()->id);
            if ($this->password != $this->passwordConfirmation) {
                $this->dispatch('swal:modal', title: "ناموفق", type: "error", text: "رمز عبور و تکرار رمز عبور مطابقت ندارد");
            } else {
                $this->user->update([
                    "name" => $this->name,
                    "password" => Hash::make($this->password),
                ]);
                $this->status = false;
                $this->dispatch('swal:modal', title: "موفق", type: "success", text: "پروفایل با موفقیت ویرایش شد");
            }
        }
    }
    public function render()
    {
        return view('livewire.agent.edit-account');
    }
}
