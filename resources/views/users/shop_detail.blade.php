@extends('users.dashboard')

@section('content')
    <div class="row shop_store">
        <div class="card col-md-6">
            <div class="card-header">
                <strong>Chỉnh Sửa Cửa Hàng</strong>
            </div>
            <form action="{{asset('/shop')}}/edit/{{$shop->id}}" method="post">
                @csrf
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="shop" class=" form-control-label">Tên Cửa Hàng</label>
                        <input type="text" id="shop" placeholder="{{$shop->name}}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-control-label">Địa Chỉ</label>
                        <input type="text" id="address" placeholder="{{$shop->address}}" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-control-label">Số Điện Thoại Cửa Hàng</label>
                        <input type="text" id="phone" placeholder="{{$shop->phone}}" name="phone" class="form-control">
                    </div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                Mở Cửa 
                                <label class="au-checkbox">
                                    <input type="checkbox" checked="checked" name="is_public">
                                    <span class="au-checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group button_add">
                        <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="fas fa-check"></i>Chỉnh Sửa Cửa Hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection