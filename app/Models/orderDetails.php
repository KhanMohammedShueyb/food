<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = "order_details";
    // protected $table = 'ordersss';
    protected $fillable = [
        'name',
        'image',
        'item_group',
        'price',
        'quantity',
        'description',
        'order_id',
    ];
   
}
