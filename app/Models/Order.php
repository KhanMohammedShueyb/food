<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        "id",
        "Item_Image",
        "Quantity",
        "Address_Type",
        "Flat_no",
        "Street",
        "City",
        "Zipcode",
        "Phno"
    ];
    public function billing()
    {
        return $this->hasOne(billing::class,'id');
    }
}
