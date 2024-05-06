<?php

namespace App\Livewire\Admin;

use App\Models\Agent;
use App\Models\Seller;
use App\Models\Technical;
use App\Models\User;
use Livewire\Component;

class UnverifiedAgents extends Component
{
    public $users;
    public $modalOpen = false;
    public $detail;
    public $technical;
    public $sellers;
    public function mount()
    {
        $this->users = User::where("status", 2)
            ->whereHas('agent', function($query) {
                $query->where('status', 0);
            })->get();
    }

    public function daleteAgent($id)
    {
        $user = User::findOrFail($id);

        // Find and delete the associated agent
        $agent = Agent::where("user_id", $id)->first();
        if ($agent) {
            $agent->delete();
        }
        Seller::where("user_id", $id)->delete();
        Technical::where("user_id", $id)->delete();
        // Then delete the user
        $user->delete();
        $this->redirect(route("AdminUnverifiedAgents"));
    }
    public function ShowDetail($id)
    {
        $this->modalOpen = true;
        $this->detail = User::find($id);
        $this->sellers = Seller::where("user_id",$id)->get();
        $this->technical = Technical::where("user_id",$id)->get();
    }
    public function acceptAgent($id)
    {
        $affectedRows = Agent::where("user_id", $id)->update(["status" => 1]);

        if ($affectedRows > 0) {
            return true; // یعنی حداقل یک رکورد بروزرسانی شده است
        } else {
            return false; // یعنی هیچ رکوردی برای بروزرسانی یافت نشده است
        }
    }

    public function downloadLicense($licenseUrl)
    {
        return response()->download($licenseUrl);
    }
    public function closeModal()
    {
        $this->modalOpen = false;
    }
    public function render()
    {
        return view('livewire.admin.unverified-agents');
    }
}
