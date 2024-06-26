<?php

namespace App\Livewire\Admin;

use App\Models\Agent;
use App\Models\Seller;
use App\Models\Technical;
use App\Models\User;
use Livewire\Component;

class Agents extends Component
{
    public $users;
    public $modalOpen = false;
    public $detail;
    public $technical;
    public $sellers;
    public function mount()
    {
        $this->users = User::where("status",2)->get();

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
        $this->redirect(route("AdminAgents"));
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
        $agent = User::find($id);
        $api = new \Kavenegar\KavenegarApi("7A714345456C49535A5A5A48503157314D5644464775394930357A5433316C7356647956557967464C65303D");
        $receptor =  $agent->phone;
        $token2 = "";
        $token3 = "";
        $template = "verify-agent";
        $type = "sms";//sms | call
        $result = $api->VerifyLookup($receptor, "فارسی", $token2, $token3, $template, $type);
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
        return view('livewire.admin.agents');
    }
}
