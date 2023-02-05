<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total',
        'delivery'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pizzas() {
        return $this->belongsToMany(Pizza::class)->withPivot('quantity');
    }
}
