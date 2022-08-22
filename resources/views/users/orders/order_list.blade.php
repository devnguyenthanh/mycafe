@extends('users.dashboard')

@section('content')

<div class="popup-background">

</div>
<div class="card col-md-6 popup-add-order">
    <div class="card-header">
        <strong>Tạo Mới Order</strong>
        <button type="reset" class="btn btn-danger btn-sm custom-btn">
            <i class="fa fa-ban"></i> Hủy
        </button>
    </div>

    <form action="{{asset('/order/store/')}}/{{$data['shop']->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body card-block">
            <div class="form-group">
                <label for="shop" class=" form-control-label">Tên Bàn</label>
                <input type="text" id="shop" placeholder="Nhập Tên Bàn" name="name" class="form-control">
            </div>
            <div class="form-group button_add">
                <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small transition-off">
                    <i class="fas fa-check"></i>Thêm Bàn</button>
            </div>
        </div>
    </form>
</div>
                        
{{-- form add product in order --}}
<div class="card col-md-6 popup-add-product">
    <div class="card-header">
        <strong>Thêm Product</strong>
        <button type="reset" class="btn btn-danger btn-sm custom-btn">
            <i class="fa fa-ban"></i> Hủy
        </button>
    </div>
    <div class="card-body card-block">
        <form action="{{asset('/order/add-product')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="shop" class=" form-control-label">Tên Product</label>
                        <div class="custom-select">
                            <select name="product_id">
                                @foreach ($data['shopProducts'] as $shopProduct)
                                    <option value="{{$shopProduct->id}}">{{$shopProduct->name}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label for="shop" class=" form-control-label">Tên Bàn</label>
                        <div class="custom-select">
                            <select name="order_id">
                                @foreach ($data['shopOrder'] as $order)
                                    <option value="{{$order->id}}">{{$order->name}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group button_add">
                    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small transition-off">
                        <i class="fas fa-check"></i>Thêm Product</button>
                </div>
        </form>
    </div>
    
</div>
    <div class="custom-name-shop">
        <div>
            <h3>Quản Lí Order Sản Phẩm Của: {{$data['shop']->name}}</h3>
            <h4>Tổng Doanh Thu Của Ngày Hôm Nay : &nbsp;{{number_format($data['totalAmount'])}} VND</h4>
        </div>
    </div>
    <div class="form-group button_add create-product">
        {{-- onclick="openPopUp()" --}}
        <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small transition-off">
            <i class="fas fa-check"></i>Thêm Mới Order</button>
    </div>
    <div class="row shop_store">
        <div class="shop-list-parent col-md-9">
            @foreach($data['orders'] as $order)
                <div class="col-md-3">
                    @foreach($order as $or)
                        <div class="product-border-custom">
                            <div class="card-header card-header-shop-list-custom">
                                <strong>{{$or['order']['name']}}</strong>
                                <span> {{number_format($or['order']['amount'])}}VND</span>
                            </div>
                            <div class="card-body card-block">
                                @foreach($or['product'] as $product)
                                    <div class="form-group product-custom-item">
                                        <input readonly type="text" id="company" placeholder="{{$product['name']}}" class="form-control">
                                        <div class="product-price-custom"><span> {{number_format($product['price'])}}</span></div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small create-product-in-order">
                                    <i class="fas fa-check"></i>Thêm Product</button>
                                </div>
                                <div class="form-group" onclick="thanhToanOrder({{$or['order']['id']}})">
                                    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="fas fa-check"></i>Thanh Toán </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection