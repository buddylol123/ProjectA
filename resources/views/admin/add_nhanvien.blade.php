@extends('adminlayout')
@section('admincontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm nhân viên
                        </header>
                        <?php
							$message = Session::get('message');
							if($message){
								echo $message;
								Session::put('message',null);
							}
						?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-nhanvien')}}" method="post">
                                	{{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                    <input type="email" name="taikhoan" class="form-control" id="exampleInputEmail1" placeholder="Tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" name="matkhau" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên nhân viên</label>
                                    <input type="text" name="hoten" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="dienthoai" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                                </div>
                                <div class="form-group">
                                	<label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="trangthai" class="form-control input-sm m-bot15">
		                                <option value="0">Hiển thị</option>
		                                <option value="1">Ẩn</option>
		                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quyền</label>
                                    <select name="quyen" class="form-control input-sm m-bot15">
                                        <option value="0">Nhân viên</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_nhanvien" class="btn btn-info">Thêm nhân viên</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
