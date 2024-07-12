<?php

namespace App\Models;

// use HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Helpers\ModelEventBase;

class User extends Authenticatable 
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'user_group_id',
    //     'email',
    //     'status',
    //     'password',
    //     'user_type',
    //     'is_valid',
    //     'age',
    //     'user_role',
    //     'contact',
    //     'hospital',
    //     'department',
    //     'country_code',
    //     'dob',
    //     'country_code',
    //     'gender'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }
}
