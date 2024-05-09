<?php

namespace App\Livewire\Index\UserRegister;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StepTwo extends Component
{
    public $phone;
    public $token;
    public $CodeInput;
    public $data;
public $listeners = ['timerExpired'=>'onTimerExpired',"variableSent"=>"GetData"];

public function GetData($value)
{
   $this->data = $value;
}
    public function SendCode()
    {

        if ($this->phone != null)
        {
       $api = new \Kavenegar\KavenegarApi("7A714345456C49535A5A5A48503157314D5644464775394930357A5433316C7356647956557967464C65303D");
       $receptor =  $this->phone;
            $this->token = rand(1000, 9999);
       $token2 = "";
       $token3 = "";
       $template = "verify";
        $type = "sms";//sms | call
       $result = $api->VerifyLookup($receptor, $this->token, $token2, $token3, $template, $type);
        }
    }

    public function onTimerExpired()
    {
        // کد مورد نظر شما برای زمانی که تایمر به پایان می‌رسد
       $this->token = null;
    }

    public function register()
    {
        if ($this->CodeInput == $this->token && $this->token != null)
        {
            $user = User::create([
                "phone"=>$this->phone,
                "name"=>$this->data[0],
                "status"=>1,
                "password"=>null
            ]);
            UserInfo::create([
                "user_id"=>$user->id,
                "job"=>$this->data[1],
                "education"=>$this->data[2],
                "year"=>$this->data[3],
                "month"=>$this->data[4],
                "day"=>$this->data[5],
            ]);
            Auth::login($user);

                $this->redirect(route("UserPanel"));
            $api = new \Kavenegar\KavenegarApi("7A714345456C49535A5A5A48503157314D5644464775394930357A5433316C7356647956557967464C65303D");
            $receptor =  $this->phone;
            $this->token = rand(1000, 9999);
            $token2 = "";
            $token3 = "";
            $template = "user-register";
            $type = "sms";//sms | call
            $result = $api->VerifyLookup($receptor, "فارسی", $token2, $token3, $template, $type);
        }elseif ($this->CodeInput == null)
        {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "کد تایید وارد نشده است");
        }elseif($this->CodeInput != $this->token && $this->token != null)
        {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "کد تایید وارد شده صحیح نمیباشد");
        }
    }
    public function render()
    {
        return view('livewire.index.user-register.step-two');
    }
}
