<?php

namespace App\Models;
use App\Models\user_group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_group_permission extends Model
{
    use HasFactory;
    protected $fillable = [
        "users",
        "user_group",
        "category",
        "user_group_id"
    ];

    public function usergroup(){
        return $this->belongsTo(user_group::class);
    }
}
