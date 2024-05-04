<?php

namespace App\Livewire\User;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyTicket extends Component
{
    public $tickets;
    public $ModalOpened = false;
    public $ModalAnswer = false;

    public $SelectedTicket;
    public $AnswerTicket;
    public function mount()
    {
        $this->tickets = Ticket::where("user_id", Auth::getUser()->id)->get();
    }

    public function showTicket($id)
    {
        $this->ModalOpened = true;
        $this->SelectedTicket = Ticket::find($id);
    }
    public function closeModal()
    {
        $this->ModalOpened = false;
    }
    public function answers($id)
    {
        $this->ModalAnswer = true;
        $this->AnswerTicket = Ticket::find($id);
    }
    public function closeAnswerModal()
    {
        $this->ModalAnswer = false;
    }
    public function render()
    {
        return view('livewire.user.my-ticket');
    }
}
