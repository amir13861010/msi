<?php

namespace App\Livewire\Index;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Home extends Component
{
    public function Getlogin()
    {
        $user = Auth::user();

        if ($user->status == 0 && Gate::allows('admin-panel', $user)) {
            redirect()->route("AdminPanel");
        } elseif ($user->status == 1 && Gate::allows('user-panel', $user)) {
            redirect()->route("UserPanel");
        } elseif ($user->status == 2 && Gate::allows('agent-panel', $user)) {
            redirect()->route("AgentPanel");
        }
    }
    public function render()
    {
        return view('livewire.index.home')->layout("components.layouts.app2");
    }
}
