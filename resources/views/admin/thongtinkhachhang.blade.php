@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Mục Khách Hàng
    </div>
 
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Mã KH</th>
            <th>Tài Khoản</th>
            <th>Mật Khẩu</th>
            <th>Họ Tên</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
      
        @foreach($Khachhang as $key =>$item)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$item->makh}}</td>
          
            <td><span class="text-ellipsis">{{$item->taikhoan}}</span></td>

            <td><span class="text-ellipsis"><input type="password" value="{{$item->matkhau}}"> </span></td>
            <td><span class="text-ellipsis">{{$item->hoten}}</span></td>
            <td><span class="text-ellipsis">{{$item->sodienthoai}}</span></td>
            <td><span class="text-ellipsis">{{$item->diachi}}</span></td>
          

            <td>
              <a href="#" class="active" ui-toggle-class="">
              <i class="fa fa-pencil-square text-success text-active"></i></a>
              <a onclick="return confirm('Ban co that su muon xoa?')" href="#" class="active" ui-toggle-class="">

              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
        
          @endforeach
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
            @endsection