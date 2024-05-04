<?php

namespace App\Livewire\Admin;

use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Tickets extends Component
{
    public $tickets;
    public $ModalOpened = false;
    public $ModalAnswer= false;
    public $SelectedTicket;
    public $SelectedId;
    public $answer;
    private $validator;

    public function mount()
    {
        $this->tickets = Ticket::all();
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
    public function closeModalAnswer()
    {
        $this->ModalAnswer = false;
        $this->SelectedId = null;
    }
    public function ShowAnswer($id)
    {
        $this->ModalAnswer = true;
        $this->SelectedTicket = $id;

    }
    public function Send($id)
    {
        $this->validator = Validator::make([
            'answer' => $this->answer,


        ], [
            'answer' => ['required'],

        ], [
            "answer.required" => "پاسخ وارد نشده است",


        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        }else{
            $answer = new Answer();
            $answer->ticket_id = $id;
            $answer->answer_text = $this->answer;
            $answer->save();
            $ticket = Ticket::findOrFail($id);
            $ticket->update([
                "answer_id"=>$answer->id,
            ]);
            $this->redirect(route("AdminTickets"));
        }
    }
    public function render()
    {
        return view('livewire.admin.tickets');
    }
}
