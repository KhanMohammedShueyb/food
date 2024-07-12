<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordersss extends Model
{
    use HasFactory;

    protected $table = 'ordersss';
    protected $fillable =[
        "shipping_address",
        "office_type",
        "flat_no",
        "street",
        "city",
        "zipcode",
        "phno",
        "totalprice",
        "user_id"
    ];
    public function OrderDetail()
    {
        return $this->belongsToMany(orderDetails::class,'id','order_id');
    }
}
