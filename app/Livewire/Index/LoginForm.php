<?php

namespace App\Livewire\Index;

use App\Models\Agent;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $InputType;
    public $phone;
    public $CodeInput;
    public $show = false;
    public $token;
    public $password;
    public $listeners = ["resetToken" => "DeleteToken"];

    public function DeleteToken()
    {
        $this->token = null;
    }

    public function sendSms()
    {
        if ($this->phone != null) {
            $user = User::where('phone', '=', $this->phone)->first();

            $this->token = rand(1000, 9999);
            $api = new \Kavenegar\KavenegarApi("7A714345456C49535A5A5A48503157314D5644464775394930357A5433316C7356647956557967464C65303D");
            $receptor =  $user->phone;
            $token2 = "";
            $token3 = "";
            $template = "verify";
            $type = "sms";//sms | call
            $result = $api->VerifyLookup($receptor, $this->token, $token2, $token3, $template, $type);
            $this->dispatch('timer',);
            return;
        }


    }


    public function ShowPassword()
    {
        $this->show = !$this->show;
    }

    public function updated()
    {
        if ($this->InputType != null && $this->phone == null) {
            $this->InputType = null;
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "شماره ای جهت ورود وارد نشده است");

        }

        if ($this->InputType == "ShowCode") {
            $this->dispatch('show:timer');

        }
    }

    public function register()
    {
        $user = User::where('phone', '=', $this->phone)->first();
        if ($this->CodeInput != null) {
            if ($this->CodeInput == $this->token) {
                if ($user != null) {
                    Auth::login($user);
                    $user = Auth::user();
                    if ($user->status == 0 && Gate::allows('admin-panel', $user)) {
                       redirect()->route("AdminPanel");
                    } elseif($user->status == 1 && Gate::allows('user-panel', $user)){
                        redirect()->route("UserPanel");
                    }elseif($user->status == 2 && Gate::allows('agent-panel', $user)){
                        $agent = Agent::where("user_id",$user->id)->first();
                        if ($agent->status == 0) {
                            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "حساب کاربری شما درحال بررسی توسط ادمین میباشد");
                            Auth::logout($user);
                            return;
                        }else{
                            redirect()->route("AgentPanel");

                        }

                        //                        redirect()->route("accountantOrderOnline");
                    }
                }else {
                    $this->dispatch('swal:modal', title: "خطا", type: "error", text: "هیچ حساب کاربری یافت نشد! لطفا ثبت نام کنید");
                }
            } else {
                $this->dispatch('swal:modal', title: "خطا", type: "error", text: "کد وارد شده صحیح نمی‌باشد");
            }
        } elseif ($this->password != null) {
            if ($user != null) {
                if ($user->password == null)
                {
                    $this->dispatch('swal:modal', title: "خطا", type: "error", text: "رمز عبوری برای حساب کاربری شما تنظیم شده. لطفا از روش کد یکبار مصرف استفاده کنید");


                }else {
                    if (Hash::check($this->password, $user->password)) {
                        Auth::login($user);
                        $user = Auth::user();

                        if ($user->status == 0 && Gate::allows('admin-panel', $user)) {
                        redirect()->route("AdminPanel");
                        } elseif ($user->status == 1 && Gate::allows('user-panel', $user)) {
                            redirect()->route("UserPanel");
                        } elseif ($user->status == 2 && Gate::allows('accountant-panel', $user)) {
                            $agent = Agent::where("user_id",$user->id)->first();
                            if ($agent->status == 0) {
                                $this->dispatch('swal:modal', title: "خطا", type: "error", text: "حساب کاربری شما درحال بررسی توسط ادمین میباشد");
                                Auth::logout($user);
                                return;
                            }else{
                                redirect()->route("AgentPanel");

                            }
//                        redirect()->route("accountantOrderOnline");
                        }
                    } else {
                        $this->dispatch('swal:modal', title: "خطا", type: "error", text: "رمز عبور وارد شده صحیح نمی‌باشد");
                    }
                }

            }else{
                $this->dispatch('swal:modal', title: "خطا", type: "error", text: "هیچ حساب کاربری یافت نشد! لطفا ثبت نام کنید");

            }
        } elseif ($this->InputType == null) {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "  لطفا یکی از روش های ورود را انتخاب کنید .
                ");
        }

    }
    public function Getlogin()
    {
        $user = Auth::user();

        if ($user->status == 0 && Gate::allows('admin-panel', $user)) {
            redirect()->route("AdminPanel");
        } elseif ($user->status == 1 && Gate::allows('user-panel', $user)) {
            redirect()->route("UserPanel");
        } elseif ($user->status == 2 && Gate::allows('accountant-panel', $user)) {
//                        redirect()->route("accountantOrderOnline");
        }
    }
    public function render()
    {
        return view('livewire.index.login-form');
    }
}
