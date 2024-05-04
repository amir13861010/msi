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

}
