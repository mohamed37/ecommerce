<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = 'id';

    protected $fillable = ['customer_id', 'total_price', 'address'];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = ['id','customer_id'];

    public function scopeSelection($query)
    {
        return $query->select('id','customer_id' , 'total_price','address','created_at');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Products','order-product', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function deliveries()
    {
        return $this->belongsToMany('App\Models\Delivery','select_deliveries', 'order_id', 'delivery_id')->withPivot('address','time');
    }

}
