<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "product_id",
        "quantity",
        "total_coins",
        "status",
    ];
    public function gift()
    {
        return $this->belongsTo(Gift::class,"product_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
