<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $tables=['vendors'];

    protected $guard = ['id' , 'vendor'];

    protected $fillable=['name', 'logo', 'address', 'mobile', 'email', 'password', 'active', 'category_id'];

    protected $dates =['created_at', 'updated_at'];

    protected $hidden=['category_id', 'password'];

  public function scopeSelection($query)
  {
      return $query->select('id','name', 'logo', 'address', 'mobile', 'email', 'password','category_id', 'active');
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
   
    public function category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory', 'subcat_id');
    }

    public function branches()
   {
       return $this->hasMany('App\Models\Branch','id','branch_id');
   }



}
