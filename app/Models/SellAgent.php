<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellAgent extends Model
{
    use HasFactory;

    public function month()
    {
        return $this->belongsTo(month::class,"month_id");
    }
    public function dataSell()
    {
        return $this->hasOne(DataSell::class, 'sell_id');
    }
    public function dataSells()
    {
        return $this->hasMany(DataSell::class, 'sell_id', 'agent_id');
    }
    public function user()
    {
        return $this->hasOne(user::class, 'agent_id');
    }

}
