<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'answer_id',

    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
