@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhân viên
            </header>
            <?php
                $message = Session::get('message');
                if($message) {
                echo $message;
                Session::put('message',null);
                }
            ?>
            <div class="panel-body">
                @foreach($edit_nhanvien as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-nhanvien/'.$edit_value->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" name="matkhau" value="{{$edit_value->matkhau}}" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ tên</label>
                            <input type="text" name="hoten" value="{{$edit_value->hoten}}" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="dienthoai" value="{{$edit_value->dienthoai}}" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" value="{{$edit_value->email}}" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                        </div>
                        <button type="submit" name="update_category" class="btn btn-info">Cập nhật nhân viên</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection