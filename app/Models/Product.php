<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'name',
        'category_id',
        'unit_price',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
