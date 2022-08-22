<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Services\ShopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::where('user_id', '=', Auth::id())->get(); //first

        $chunks = $shops->chunk(3); 

        return view('users.shop')->with('shops', $chunks);
    }

    public function show(Shop $shop)
    {
        if ($shop->user_id != Auth::id()) {
            return redirect()->back();
        }

        return view('users.shop_detail')->with('shop', $shop);
    }
//
    public function store(Request $request)
    {
        if (request()->method() === 'GET') return view('users.shop_store');  //vì có 2 route có cùng url nhưng khác nhau phương thức
            // validate form
        $this->validate($request, 
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên Cửa Hàng',
                'address' => 'Địa Chỉ',
                'phone' => 'Số Điện Thoại',
            ]
        );

        $inputs = ShopService::getInputStore();
        
        Shop::create($inputs);  // thêm dữ liệu vào DB

        return redirect()->back()->with('message', 'Đã thêm cửa hàng thành công!');
    }

    public function update(Request $request, Shop $shop)
    {
        if ($shop->user_id != Auth::id()) {
            return redirect()->back();
        }

        $this->validate($request, 
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên Cửa Hàng',
                'address' => 'Địa Chỉ',
                'phone' => 'Số Điện Thoại',
            ]
        );

        $inputs = ShopService::getInputStore();

        $shop->name = $inputs['name'];
        $shop->address = $inputs['address'];
        $shop->phone = $inputs['phone'];
        $shop->is_public = $inputs['is_public'];
        $shop->save();
        
        return redirect()->back()->with('message', 'Đã sửa cửa hàng thành công!');
    }

    public function destroy($id)
    {
        try {
            $shop = Shop::find($id);
            $shop->delete();

            return response()->json(['success' => 'Đã xóa']);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Xóa không thành công']);
        }
    }
}
