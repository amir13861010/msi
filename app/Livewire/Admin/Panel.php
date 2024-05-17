<?php

namespace App\Livewire\Admin;

use App\Models\BuyAgent;
use App\Models\DataBuy;
use App\Models\DataSell;
use App\Models\Gift;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Panel extends Component
{
    public $users;
    public $agents;
    public $buyers;
    public $gifts;
    public $topAgents;
    public $topAgentsSell;
    public $AgentsSells;
    public $AgentsBuys;
    public $AgentsSellsPrice;
    public $AgentsBuysPrice;
    public function mount()
    {
        $this->users = User::all()->count();
        $this->agents = User::where("status",2)->count();
        $this->buyers = User::where("status",1)->count();
        $this->gifts = Gift::all()->count();
        $this->AgentsSells = DataSell::all()->sum("count");
        $this->AgentsBuys = DataBuy::all()->sum("count");
        $this->AgentsSellsPrice = DataSell::all()->sum("price");
        $this->AgentsBuysPrice = DataBuy::all()->sum("price");
        $this->topAgents = DB::table('buy_agents')
            ->join('data_buys', 'buy_agents.id', '=', 'data_buys.buy_id')
            ->join('users', 'buy_agents.agent_id', '=', 'users.id')
            ->join('agents', 'buy_agents.agent_id', '=', 'agents.user_id')
            ->select('buy_agents.agent_id', 'users.name', 'agents.store', DB::raw('SUM(data_buys.price) as total_count'))
            ->groupBy('buy_agents.agent_id', 'users.name', 'agents.store')
            ->orderBy('total_count', 'desc')
            ->take(3)
            ->get();

        $this->topAgentsSell = DB::table('sell_agents')
            ->join('data_sells', 'sell_agents.id', '=', 'data_sells.sell_id')
            ->join('users', 'sell_agents.agent_id', '=', 'users.id')
            ->join('agents', 'sell_agents.agent_id', '=', 'agents.user_id')
            ->select('sell_agents.agent_id', 'users.name', 'agents.store', DB::raw('SUM(data_sells.price) as total_count'))
            ->groupBy('sell_agents.agent_id', 'users.name', 'agents.store')
            ->orderBy('total_count', 'desc')
            ->take(3)
            ->get();

    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
