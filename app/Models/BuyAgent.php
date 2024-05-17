<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyAgent extends Model
{
    use HasFactory;

    public function month()
    {
        return $this->belongsTo(month::class,"month_id");
    }
    public function dataBuy()
    {
        return $this->hasOne(DataBuy::class, 'buy_id');
    }
    public function dataBuys()
    {
        return $this->hasMany(DataBuy::class, 'buy_id', 'agent_id');
    }
    public function user()
    {
        return $this->hasOne(user::class, 'agent_id');
    }
}
