<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable; 
  protected $fillable = [
    'name',
    'gender',
    'email',
    'phno',
    'password',
    'type',
    'isLogin',
    'otp',
    'user_group_id'
  ];


  // /**
  //  * The attributes that should be hidden for arrays.
  //  *
  //  * @var array
  //  */
  // protected $hidden = [
  //   'password', 'remember_token',
  // ];
  
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  
  public function userGroup(){
    return $this->belongsTo(UserGroup::class,'user_group_id', 'id');
  }

}
