<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealOrder extends Model
{
    use HasFactory;

    protected $table = 'deal_order';

    protected $fillable = [
        'order_id',
        'deal_id',
    ];
}
