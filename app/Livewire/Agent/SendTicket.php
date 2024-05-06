<?php

namespace App\Livewire\Agent;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendTicket extends Component
{
    use WithFileUploads;

    public $title;
    public $file;
    public $description;
    private $validator;

    public function submit()
    {
        $this->validator = Validator::make([
            'title' => $this->title,
            'file' => $this->file,
            'description' => $this->description,

        ], [
            'title' => ['required'],
            'file' => ['required'],
            'description' => ['required'],
        ], [
            "title.required" => "تیتر تیکت وارد نشده است",
            "file.required" => "فایل تیکت وارد نشده است",
            "description.required" => "توضیحات تیکت وارد نشده است",

        ]);
        if ($this->validator->fails()) {
            $errorMessages = $this->validator->errors()->all();
            $this->dispatch('swal:modal', title: "خطا", type: "error", text: $errorMessages);
            return;
        }else{
            $ticket = new Ticket();
            $ticket->user_id = Auth::getUser()->id;
            $ticket->title = $this->title;
            $file = $this->file->store('tickets', 'public'); // Store the uploaded file in 'public/avatars' directory
            $ticket->file = $file;
            $ticket->description = $this->description;
            $ticket->save();
            $this->dispatch('swal:modal', title: "موفق", type: "success", text: "با موفقیت ثبت شد");
            $this->redirect(route("UserAddTicket"));

        }

    }
    public function render()
    {
        return view('livewire.agent.send-ticket');
    }
}
