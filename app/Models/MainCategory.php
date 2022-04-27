<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\MainCategoryObserver;
use App\Models\SubCategory;

class MainCategory extends Model
{
    protected $table = 'main_categories';
      /***********************************************
    ***the user cannot inside it, so it is increment
    *************************************************
    */
    protected $guard = ['id'];

    /***********************************************
    ***The user must fill in these fields
    *************************************************
    */
    protected $fillable = ['name' ,'slug', 'photo', 'active'];
 
    protected $dates = ['created_at', 'updated_at'];

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    public function scopeSelection($query)
    {
      return $query->select('id','name','photo' ,'slug', 'active');
    }

    public function getActive()
    {
      return $this->active == 1 ? 'مفعل': 'غير مفعل'; 
    }

    
    public function getPhotoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";

    }


    public function subcategories()
    {
        return $this->hasMany('App\Models\SubCategory','category_id');
    }


    public function vendors()
    {
        return $this->hasMany('App\Models\Vendor', 'category_id');
    }
   
    protected static function boot()
    {
      parent::boot();
      MainCategory::observe(MainCategoryObserver::class);
    }
 
}
