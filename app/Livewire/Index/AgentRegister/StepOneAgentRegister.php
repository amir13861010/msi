<?php

namespace App\Livewire\Index\AgentRegister;

use Livewire\Component;

class StepOneAgentRegister extends Component
{
    public $name;
    public $phone;
    public $store;

    public function sendVariable($value)
    {
        $this->dispatch("variableSentOne",$value);
    }
    public function sendData()
    {

        $valueToSend = ['name'=>$this->name,'phone'=>$this->phone,'store'=>$this->store];
        $this->sendVariable($valueToSend);
    }
    public function render()
    {
        return view('livewire.index.agent-register.step-one-agent-register');
    }
}
