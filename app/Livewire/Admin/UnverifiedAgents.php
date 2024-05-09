<?php

namespace App\Livewire\Admin;

use App\Models\Agent;
use App\Models\Seller;
use App\Models\Technical;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UnverifiedAgents extends Component
{
    use WithFileUploads;

    public $users;
    public $modalOpen = false;
    public $modalEdit = false;
    public $detail;
    public $technical;
    public $sellers;
    public $EditId;
    public $license;
    public $statute;
    public $founded;
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
    public function EditAgent($id)
    {
        $this->modalEdit = true;
        $this->EditId = $id;
    }
    public function closeModalEdit()
    {
        $this->modalEdit = false;
        $this->EditId = null;
    }
    public function setData()
    {
        // Find the existing agent record
        $agent = Agent::where("user_id", $this->EditId)->first();

        // Update the attributes if the corresponding file inputs are not empty
        if ($this->license) {
            $licence = $this->license->store('license', 'public');
            $agent->license = $licence;
        }

        if ($this->statute) {
            $statute = $this->statute->store('statute', 'public');
            $agent->statute = $statute;
        }

        if ($this->founded) {
            $founded = $this->founded->store('founded', 'public');
            $agent->founded = $founded;        }

        // Save the changes to the existing agent record
        $agent->save();

        // Close the modal after updating data
        $this->modalEdit = false;
        $this->EditId = null;
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
        return view('livewire.admin.unverified-agents');
    }
}
