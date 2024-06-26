<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBuy extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
    public function buyAgent()
    {
        return $this->belongsTo(BuyAgent::class, 'buy_id', 'agent_id');
    }
}
