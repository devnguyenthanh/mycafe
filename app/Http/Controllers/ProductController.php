<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Validator;


class ProductController extends Controller
{
    public function index()
    {
        $shops = Shop::where('user_id', '=', Auth::id())->get(); //first

        $chunks = $shops->chunk(3);

        return view('users.products.shop')->with('shops', $chunks);
    }

    public function show(Shop $shop)
    {
        $products = $shop->product;
        $chunks = $products->chunk(3);
        $data = [
            'shop' => $shop,
            'products' =>  $chunks
        ];

        return view('users.products.product_list')->with('data', $data);
    }

    public function store(Request $request)
    {
        if (request()->method() === 'GET') {
            $shops = Shop::where('user_id', '=', Auth::id())->get();

            return view('users.products.product_store')->with('shops', $shops);
        }
        
        $this->validate($request, 
            [
                'name' => 'required',
                'price' => 'required',
                'shop_id' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên Sản Phẩm',
                'price' => 'Giá Tiền',
                'shop_id' => 'Shop',
            ]
        );

        $inputs = ProductService::getInputProduct();

        if (request()->has('image')) {
            //lấy ra file người dùng gửi lên 
            $file = $request->file('image');

            //đường dẫn
            $path = public_path() . '/uploads/images/';
            $name = date('Y-m-d') . '_' .  Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fullPath =  '/uploads/images/' . $name . '.' . $extension;
            $file->move($path, $name . '.' . $extension);

            $inputs['image'] = $fullPath;
        }
        
        Product::create($inputs);

        return redirect()->back()->with('message', 'Đã thêm product thành công!');
    }

    

    
}

