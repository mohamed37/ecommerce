<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $guard = 'id';

    protected $fillable = ['name','location', 'phone', 'photo', 'vendor_id', 'active'];

    protected $hidden = ['id', 'vendor_id'];
   
    protected $dates = ['created_at', 'updated_at'];

    //protected $cates =['location' => 'array'];

   
    public function scopeSelection($query)
    {
        return $query->select('id','name','location', 'phone', 'photo', 'vendor_id', 'active');
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor',  'vendor_id');
    }


    public function products()
    {
        return $this->hasMany('App\Models\Products','branch_id');
    }

    public function getPhotoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";

    } 
}
