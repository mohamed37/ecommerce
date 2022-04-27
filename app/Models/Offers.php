<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table = 'offers';

    protected $guard = 'id';

    protected $fillable = ['name', 'discount','active'];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = 'id';

    public function scopeSelection($query)
    {
        return $query->select('id','name','discount','active');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    
    public function getActive()
    {
      return $this->active == 1 ? 'مفعل': 'غير مفعل'; 
    }

}
