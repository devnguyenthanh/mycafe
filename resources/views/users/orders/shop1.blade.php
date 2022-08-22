@extends('users.dashboard')

@section('content')
    <div class="row shop_store">
        <div class="shop-list-parent col-md-9">
            @foreach($shops as $shop)
                <div class="col-md-3">
                    @foreach($shop as $child)
                        <div class="card list-shop-custom-in-product" onclick="openOrder({{$child->id}})">
                            <div class="card-header card-header-shop-list-custom">
                                <strong>{{$child->name}}</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Địa Chỉ</label>
                                    <input readonly type="text" id="company" placeholder="{{$child->address}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">SĐT</label>
                                    <input readonly type="text" id="vat" placeholder="{{$child->phone}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Mở Cửa</label>
                                    <input readonly type="text" id="street" placeholder="@if($child->is_public == 1) {!!'Mở cửa'!!} @else {!!'Không mở cửa'!!} @endif" class="form-control">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection