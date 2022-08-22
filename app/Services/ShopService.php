<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;

class ShopService
{
    public static function getInputStore()
    {
        $inputs = [
            'user_id' => Auth::id(),
            'name' => request()->input('name'),
            'address' => request()->input('address'),
            'phone' => request()->input('phone'),
        ];

        if (request()->input('is_public') == 'on') {
            $inputs['is_public'] = 1;
        }

        return $inputs;
    }
}
