<?php

namespace App\Models;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupPermisison extends Model
{
    protected $table = 'user_group_permissions';
    use HasFactory;
    protected $fillable = [
        "users",
        "user_group",
        "category",
        "user_group_id"
    ];

    public function UserGroup(){
        return $this->belongsTo(UserGroup::class);
    }
}
