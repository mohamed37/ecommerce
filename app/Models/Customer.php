<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table='customers';

    protected $guard  = 'customer';

    protected $fillable=['name', 'logo', 'address', 'mobile','phone', 'email', 'password', 'active'];

    protected $dates =['created_at', 'updated_at'];
    
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
  public function scopeSelection($query)
  {
      return $query->select('id','name', 'logo', 'address', 'mobile','phone', 'email', 'password', 'active');
  }

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function getActive()
    {
      return  $this -> active == 1 ? 'مفعل': 'غير مفعل'; 
    }

    public function getLogoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";

    }
    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            //attributes => this is a  table of columns $filable
            $this->attributes['password'] = bcrypt($password);
        }
    }
    
    public function orders()
    {
       return $this->hasMany(Order::class, 'customer_id');
    }
}
