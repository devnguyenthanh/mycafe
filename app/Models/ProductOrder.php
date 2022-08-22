<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//product_order
class ProductOrder extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;
    use HasFactory;

    protected $table = 'product_order';

    protected $fillable = ['product_id', 'order_id'];
}
