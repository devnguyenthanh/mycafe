@extends('users.dashboard')

@section('content')
    <div class="row shop_store">
        <div class="card col-md-6">
            <div class="card-header">
                <strong>Tạo Mới Sản Phẩm</strong>
            </div>
            <form action="{{asset('/product/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body card-block">
                    <div class="form-group">
                        <div class="custom-select">
                            <select name="shop_id">
                                @foreach ($shops as $shop)
                                    <option value="{{$shop->id}}">{{$shop->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop" class=" form-control-label">Tên Sản Phẩm</label>
                        <input type="text" id="shop" placeholder="Nhập Tên Sản Phẩm" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-control-label">Giá</label>
                        <input type="number" id="address" placeholder="Nhập Giá" name="price" class="form-control">
                    </div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group">
                                Còn Hàng
                                <label class="au-checkbox">
                                    <input type="checkbox" checked="checked" name="is_public">
                                    <span class="au-checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-control-label">Thêm ảnh</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group button_add">
                        <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="fas fa-check"></i>Thêm Mới Sản Phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection