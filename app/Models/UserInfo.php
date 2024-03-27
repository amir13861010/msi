<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'education',
        'job',
        'year',
        'month',
        'day',
        'coins',
    ];
    use HasFactory;
}
