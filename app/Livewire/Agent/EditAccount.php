<?php

namespace App\Livewire\Agent;

use App\Models\SellAgent;
use App\Models\Seller;
use App\Models\Technical;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditAccount extends Component
{
    public $name;
    public $phone;
    public $password;
    public $status = false;
    public $user;
    public $sellers;
    public $technicals;
    public $passwordConfirmation;
    public $technicalModal = false;
    public $SellerModal = false;
    public $nameTechnical;
    public $phoneTechnical;
    public $nameSeller;
    public $phoneSeller;
    private $validator;

    public function mount()
    {
        $this->name = Auth::getUser()->name;
        $this->phone = Auth::getUser()->phone;
        $this->sellers = Seller::where("user_id",Auth::getUser()->id)->get();
        $this->technicals = Technical::where("user_id",Auth::getUser()->id)->get();
    }
    public function ShowTechnical()
    {
        $this->technicalModal = true;
    }
    public function addTechnical()
    {
        $this->validator = Validator::make([
            'nameTechnical' => $this->nameTechnical,
            'phoneTechnical' => $this->phoneTechnical,


        ], [
            'nameTechnical' => ['required'],
            'phoneTechnical' => ['required'],
        ], [
            'nameTechnical.required' => 'نام مسئول وارد نشده است',
            'phoneTechnical.required' => 'شماره مسئول وارد نشده است',


        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $technical = new Technical();
            $technical->user_id = Auth::getUser()->id;
            $technical->name = $this->nameTechnical;
            $technical->phone = $this->phoneTechnical;
            $technical->save();
            $this->redirect(route("AgentAccount"));

        }
    }
    public function ShowSeller()
    {
        $this->SellerModal = true;
    }
    public function addSeller()
    {
        $this->validator = Validator::make([
            'nameSeller' => $this->nameSeller,
            'phoneSeller' => $this->phoneSeller,


        ], [
            'nameSeller' => ['required'],
            'phoneSeller' => ['required'],
        ], [
            'nameSeller.required' => 'نام مسئول وارد نشده است',
            'phoneSeller.required' => 'شماره مسئول وارد نشده است',


        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        } else {
            $technical = new Seller();
            $technical->user_id = Auth::getUser()->id;
            $technical->name = $this->nameSeller;
            $technical->phone = $this->phoneSeller;
            $technical->save();
            $this->redirect(route("AgentAccount"));

        }
    }
    public function CloseShowTechnical()
    {
        $this->nameTechnical = null;
        $this->phoneTechnical = null;
        $this->technicalModal = false;
    }
    public function CloseShowSeller()
    {
        $this->nameSeller = null;
        $this->phoneSeller = null;
        $this->technicalModal = false;
    }
    public function DeleteSeller($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        $this->redirect(route("AgentAccount"));
    }
    public function Deletetechnical($id)
    {
        $seller = Technical::findOrFail($id);
        $seller->delete();
        $this->redirect(route("AgentAccount"));
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
