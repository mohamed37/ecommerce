<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $tables = ['deliveries'];

    /*
        protected $table = 'deliveries' ;  = protected $tables = ['deliveries'];
        

    */
    protected $guarded = ['id'];

    protected $fillable = ['firstname', 'lastname', 'username', 'email', 'password', 'photo','phone' ,'address', 'age','card_number', 'expire'];

    protected $hidden = ['id', 'password'];

    protected $dates = ['created_at', 'updated_at'];

    public function scopeSelection($query)
    {
        return $query->select('id','firstname', 'lastname', 'username', 'email', 'password', 'photo', 'phone' , 'address', 'age', 'card_number', 'expire' );
    }

    public function scopeExpiretion($query)
    {
        return $query->select('id', 'username', 'photo', 'phone' , 'address', 'expire' )
                     ->where('expire', 0);
    }

    public function scopeExpire($query)
    {
        return $query->where('expire',0);
    }

    public function getExpire()
    {
      return  $this -> expire == 1 ? 'تم الاختيار': 'لم يتم الاختيار '; 
    }
    
    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            //attributes => this is a  table of columns $filable
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function getPhotoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";

    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'select_deliveries','order_id', 'delivery_id')->withPivot('address','time');   
    }
}
