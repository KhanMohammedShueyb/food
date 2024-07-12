<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    use HasFactory;
    protected $fillable = [
        'ship_address',
        'ship_method',
        'tracking_number',
        'order_id',
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
