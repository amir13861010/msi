<?php

namespace App\Models;

use Baloot\Models\City;
use Baloot\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'credit_id',
        'city_id',
        'province_id',
        'address',
        'comment',
        'user_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);

    }

    public function province()
    {
        return $this->belongsTo(Province::class,"province_id");

    }
    public function basket()
    {
        return $this->belongsTo(Basket::class,"credit_id");

    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
