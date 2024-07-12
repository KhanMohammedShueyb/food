<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'message',
        'created_at',
        'updated_at'
    ];
}
