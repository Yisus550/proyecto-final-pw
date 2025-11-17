<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Details extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        "order_id",
        "product_id",
        "quantity",
        "unit_price",
        "total_price"
    ];
}
