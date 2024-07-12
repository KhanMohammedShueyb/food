<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'billings';
    use HasFactory;
    protected $fillable = [
        'payment_address',
        'total_amount_paid',
        'order_id',
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}