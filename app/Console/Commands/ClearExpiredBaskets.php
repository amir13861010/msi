<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Basket;
use Carbon\Carbon;

class ClearExpiredBaskets extends Command
{
    protected $signature = 'baskets:clear';

    protected $description = 'Clear expired baskets';

    public function handle()
    {
        // پیدا کردن و حذف کردن رکوردهای منقضی شده
        Basket::where('created_at', '<', Carbon::now()->subHours(24))->delete();
        $this->info('Expired baskets cleared successfully.');
    }
}
