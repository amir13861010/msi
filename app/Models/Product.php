<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'category_id',
        'name',
        'score',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
