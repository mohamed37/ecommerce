<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    protected $table = 'sub_categories';
      /***********************************************
    ***the user cannot inside it, so it is increment
    *************************************************
    */
    protected $guard = ['id'];

    /***********************************************
    ***The user must fill in these fields
    *************************************************
    */
    protected $fillable = ['name' ,'slug', 'photo', 'active','category_id'];
 
    protected $dates = ['created_at', 'updated_at'];

    protected $hidden=['category_id'];

    
    public function scopeSelection($query)
    {
      return $query->select('id' ,'category_id','name','photo' ,'slug', 'active');
    }

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }


    public function getActive()
    {
      return $this->active == 1 ? 'مفعل': 'غير مفعل'; 
    }

    
    public function getPhotoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";

    }

    public function maincategory()
    {
        return $this->belongsTo('App\Models\MainCategory', 'category_id');
    }

    /*  public function categories()
    {
        return $this->hasMany(self::class,'translation_of');
    } */
}
