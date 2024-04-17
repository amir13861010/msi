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
}
