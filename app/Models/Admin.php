<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";
    /***********************************************
    ***the user cannot inside it, so it is increment
    *************************************************
    */
    protected $guard = ['id','admin'];

    /***********************************************
    ***The user must fill in these fields
    *************************************************
    */
    protected $fillable = [ 'name', 'email', 'photo' ,'password' ];
   
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
