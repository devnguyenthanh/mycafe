@extends('users.dashboard')

@section('content')
    <div class="custom-name-shop">
        <h3>Quản Lí Sản Phẩm Của: {{$data['shop']->name}}</h3>
    </div>
    <div class="row shop_store">
        <div class="shop-list-parent col-md-9">
            @foreach($data['products'] as $product)
                <div class="col-md-3">
                    @foreach($product as $child)
                        <div class="card list-shop-custom">
                            <div class="card-header card-header-shop-list-custom">
                                <strong>{{$child->name}}</strong>
                                <div class="icon-shop-custom">
                                    <a href="{{asset('shop')}}/{{$child->id}}" target="_blank">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="delete-shop" onclick="deleteShop({{$child->id}})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group image-custom">
                                    <img src="{{asset($child->image)}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Giá Tiền</label>
                                    <input readonly type="text" id="company" placeholder="{{$child->price}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Còn Hàng</label>
                                    <input readonly type="text" id="street" placeholder="@if($child->is_public == 1) {!!'Còn'!!} @else {!!'Hết'!!} @endif" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection