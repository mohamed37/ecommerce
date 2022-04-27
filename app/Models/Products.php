<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table= 'products';

    protected $guard = 'id';

    protected $fillable = ['id','name', 'branch_id', 'photo', 'price', 'description','active'];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = ['id','branch_id'];

    public function scopeSelection($query)
    {
        return $query->select('id','name', 'branch_id', 'photo', 'price', 'description','active');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getActive()
    {
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function getPhotoAttribute($val)
    {
        return $val !== null ? asset('assets/' . $val) : "";
    }

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch','branch_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order-product', 'order_id', 'product_id');
    }
}
