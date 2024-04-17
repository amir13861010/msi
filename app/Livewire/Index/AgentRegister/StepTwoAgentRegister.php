<?php

namespace App\Livewire\Index\AgentRegister;

use Livewire\Component;

class StepTwoAgentRegister extends Component
{

    public $technical_responsibles = [];
    public $DisableButton = false;

    public function addMoreTechnicalResponsible()
    {
        $this->technical_responsibles[] = ['name' => '', 'phone' => ''];
    }
    public function removeTechnicalResponsible($index)
    {
        unset($this->technical_responsibles[$index]);
    }
    public function test()
    {
        foreach ($this->technical_responsibles as $index => $technical_responsible) {
            if (empty($technical_responsible['name']) && empty($technical_responsible['phone'])) {
                unset($this->technical_responsibles[$index]);
            }

        }
        if (empty($technical_responsible['name']) || empty($technical_responsible['phone']))
        {

            $this->DisableButton = true;
            $indexNum = $index + 1;
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: " رکورد شماره $indexNum ناقص میباشد ");
            return;
        }
        $valueToSend = $this->technical_responsibles;
        $this->sendVariable($valueToSend);

    }
    public function sendVariable($value)
    {
        $this->dispatch("variableSentTwo",$value);
    }
    public function render()
    {

        return view('livewire.index.agent-register.step-two-agent-register');
    }
}
