<?php

namespace App\Livewire\Index\UserRegister;

use Livewire\Component;

class StepOne extends Component
{
    public $name;
    public $job;
    public $education;
    public $year;
    public $month;
    public $day;
    public $listeners = ["dataSet"=>"SendData"];
    public function sendVariable($value)
    {
        $this->dispatch("variableSent",$value);
    }
    public function SendData()
    {

        $valueToSend = [$this->name ,$this->job,$this->education,$this->year,$this->month,$this->day,];
        $this->sendVariable($valueToSend);
    }
    public function render()
    {
        return view('livewire.index.user-register.step-one');
    }
}
