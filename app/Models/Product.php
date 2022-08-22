<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const UPDATED_AT = null;
    use HasFactory;

    protected $fillable = ['shop_id', 'name', 'image', 'price', 'is_public'];
}
