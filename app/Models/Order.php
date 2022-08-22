<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const UPDATED_AT = null;
    use HasFactory;

    protected $fillable = ['shop_id', 'name', 'time_in', 'time_out', 'date', 'amount'];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'product_order', 'order_id', 'product_id');
    }
}
