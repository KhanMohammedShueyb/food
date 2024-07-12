<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_group_permission;
class user_group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function permission(){
        return $this->hasOne(user_group_permission::class);
    }
}
