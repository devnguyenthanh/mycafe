<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Services\ShopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $shops = Shop::where('user_id', '=', Auth::id())->get(); //first

        $chunks = $shops->chunk(3);

        return view('users.orders.shop1')->with('shops', $chunks);
    }

    public function show(Shop $shop)
    {
        $orders = $shop->order->where('is_paid', '!=', 1);
        $shopProducts = $shop->product;
        
        $totalAmount = Order::where('is_paid', 1)
        ->where('date', date('Y-m-d'))
        ->where('shop_id', $shop->id)
        ->sum('amount');

        // dd($orders);
        $product = [];
        foreach ($orders as $order) {
            $product[] = [
                'order' => $order->toArray(),
                'product' => $order->product->toArray(),
            ];
        }
        
        $chunks = collect($product)->chunk(3);
        // dd($chunks);
        $data = [
            'shop' => $shop,
            'orders' =>  $chunks,
            'shopOrder' => $orders,
            'shopProducts' => $shopProducts,
            'totalAmount' => $totalAmount,
        ];

        return view('users.orders.order_list')->with('data', $data);
    }

    public function store(Request $request, Shop $shop)
    {
        $this->validate($request, 
            [
                'name' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
            ],
            [
                'name' => 'Tên Cửa Hàng',
            ]
        );

        $inputs = [
            'name' => $request->name,
            'shop_id' => $shop->id,
            'time_in' => date('H:i:m'),
            'time_out' => date('H:i:m'),
            'date'  => date('Y-m-d'),
        ];
        
        Order::create($inputs);

        return redirect()->back()->with('message', 'Đã thêm order thành công!');
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

    public function addProduct()
    {
        $inputs = [
            'product_id' => request()->input('product_id'),
            'order_id'  => request()->input('order_id')
        ];

        $productOrder = ProductOrder::create($inputs);
        
        $product = Product::find($productOrder->product_id);
        $order = Order::find($productOrder->order_id);
        $order->amount = $order->amount + $product->price;
        $order->save();

        return redirect()->back()->with('message', 'Đã thêm product thành công!');
    }

    public function paid(Order $order)
    {
        try {
            $order->time_out = date('H:m:i');
            $order->is_paid = 1;
            $order->save();
            return response()->json(['success' => 'Đã Thanh Toán']);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Thanh Toán không thành công']);
        }
    }
}
