<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    use HasFactory;

    protected $table = 'order_pizza';

    protected $fillable = [
        'order_id',
        'pizza_id',
        'quantity'
    ];
}
