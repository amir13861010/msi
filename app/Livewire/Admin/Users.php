<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();

    }
    public function changeRole($id, $role)
    {
        $user = User::find($id);
        $user->status = $role;
        $user->save();
        $this->redirect("/admin-users");
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->redirect("/admin-users");
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "کاربر با موفقیت حذف شد");

        } else {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "کاربر موردنظر یافت نشد");

        }
    }
    public function render()
    {
        return view('livewire.admin.users');
    }
}
