@extends('users.dashboard')

@section('content')
    <div class="row shop_store">
        <div class="card col-md-6">
            <div class="card-header">
                <strong>Tạo Mới Cửa Hàng</strong>
            </div>
            <form action="{{asset('/shop/store')}}" method="post">
                @csrf
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="shop" class=" form-control-label">Tên Cửa Hàng</label>
                        <input type="text" id="shop" placeholder="Nhập Tên Cửa Hàng" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-control-label">Địa Chỉ</label>
                        <input type="text" id="address" placeholder="Nhập Địa Chỉ" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-control-label">Số Điện Thoại Cửa Hàng</label>
                        <input type="text" id="phone" placeholder="Enter street name" name="phone" class="form-control">
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
                            <i class="zmdi zmdi-plus"></i>Thêm Mới Cửa Hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection