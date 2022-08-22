<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public static function getInputProduct()
    {
        $inputs = [
            'shop_id' => request()->input('shop_id'),
            'name' => request()->input('name'),
            'price' => request()->input('price'),
        ];

        if (request()->input('is_public') == 'on') {
            $inputs['is_public'] = 1;
        }

        return $inputs;
    }

    public static function updateImageProduct($image)
    {
        var_dump($image);
        die();
    }
}
