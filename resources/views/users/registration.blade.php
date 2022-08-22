@include('head')
<body>
    <div class="row notify">
        <div class="col-md-6">
            @if($errors->any())
                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    </div>
    <form action="/registration" method="POST">
        @csrf
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="shop" class=" form-control-label">Tên</label>
                    <input type="text" id="shop" placeholder="Nhập Tên" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label">email</label>
                    <input type="text" id="address" placeholder="Nhập email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-control-label">password</label>
                    <input type="text" id="phone" placeholder="Enter password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-control-label">nhập lại password</label>
                    <input type="text" id="phone" placeholder="Enter password" name="password_confirm" class="form-control">
                </div>
                <div class="form-group button_add">
                    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Tạo TK</button>
                </div>
            </div>
    </form>
</body>
</html>