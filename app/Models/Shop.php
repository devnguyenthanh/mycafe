<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    const UPDATED_AT = null;
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'address', 'phone', 'is_public'];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'shop_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'shop_id', 'id');
    }
}
