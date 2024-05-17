<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSell extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
    public function sellAgent()
    {
        return $this->belongsTo(SellAgent::class, 'sell_id', 'agent_id');
    }
}
