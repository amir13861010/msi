<?php

namespace App\Livewire\Index\AgentRegister;

use App\Models\Agent;
use App\Models\Seller;
use App\Models\Technical;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class StepFourAgentRegister extends Component
{
    protected $listeners = ["variableSentOne" => "handleVariableOne","variableSentTwo"=>"handleVariableTwo","variableSentThree"=>"handleVariableThree"];
    public $StepOne;
    public $StepTwo;
    public $StepThree;
    public $license;
    public $statute;
    public $founded;
    public $type;
    public $Validate = false;
    use WithFileUploads;
    private $validator;

    public function handleVariableOne($value)
    {
        $this->StepOne = $value;
    }
    public function handleVariableTwo($value)
    {
        $this->StepTwo = $value;
    }
    public function handleVariableThree($value)
    {
        $this->StepThree = $value;
    }
    public function test()
    {
        dd($this->StepOne,$this->StepTwo);
    }
    public function DataSet()
    {
        $this->validator = Validator::make([
            'phone' => $this->StepOne['phone'],
        ], [
            'phone' => ['unique:users,phone'],
        ], [
            "phone.unique" => "شماره تلفن قبلا استفاده شده است",
        ]);

        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        }elseif ($this->type == null)
        {
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: "نوع حقیقی یا حقوقی انتخاب نشده است");
            return;
        }else{
            $phone = $this->StepOne['phone'];
            // اگر شماره تلفن با صفر شروع نشده باشد، یک صفر به ابتدای شماره اضافه می‌کنیم
            if (substr($phone, 0, 1) !== '0') {
                $phone = '0' . $phone;
            }

            $user = new User();

            // تنظیم مقادیر ویژگی‌ها
            $user->name = $this->StepOne['name'];
            $user->phone = $phone;
            $user->status = 2;
            $user->save();

            $agents = new Agent();
            $agents->user_id = $user->id;
            $agents->store = $this->StepOne['store'];
            if ($this->license != null)
            {
                $licence = $this->license->store('license', 'public');
                $agents->license = $licence;
            }
            if ($this->statute != null)
            {
                $statute = $this->statute->store('statute', 'public');
                $agents->statute = $statute;
            }
            if ($this->founded != null)
            {
                $founded = $this->founded->store('founded', 'public');
                $agents->founded = $founded;
            }
            if ($this->type == "hagigi")
            {
                $agents->type = 0;
            }else
            {
                $agents->type = 1;
            }
            $agents->save();
            foreach ($this->StepThree as $technical_responsible) {
                $seller = new Seller(); // ایجاد شیء جدید برای هر دوره از حلقه
                $seller->user_id = $user->id;
                $seller->name = $technical_responsible['name'];
                $seller->phone = $technical_responsible['phone'];
                $seller->save(); // ذخیره کردن شیء فعلی Seller
            }
            foreach ($this->StepTwo as $technical_responsible) {
                $technical = new Technical(); // ایجاد شیء جدید برای هر دوره از حلقه
                $technical->user_id = $user->id;
                $technical->name = $technical_responsible['name'];
                $technical->phone = $technical_responsible['phone'];
                $technical->save(); // ذخیره کردن شیء فعلی Seller
            }
            $user->update([
                "agent_id"=>$agents->id
            ]);
        }
        $this->dispatch('swal:modal', title: "موفق", type: "success", text: "ثبت نام با موفقیت انجام شد،پس از تایید ادمین میتوانید وارد حساب خود شوید");
        $this->redirect("/register-agent");
    }
    public function render()
    {
        return view('livewire.index.agent-register.step-four-agent-register');
    }
}
