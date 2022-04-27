<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class selectDelivery extends Model
{
    protected $tables = ['select_deliveries'];

    protected $guarded = ['id'];

    protected $fillable = ['order_id', 'delivery_id', 'time', 'address'];

    protected $hidden = ['id','order_id', 'delivery_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function scopeSelection($query)
    {
        return $query->select('id','order_id', 'delivery_id', 'time', 'address' );
    }
}
