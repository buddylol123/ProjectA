<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;  
use Session;
session_start();
class Admincontroller extends Controller
{
    public function index()
    {
       return view('adminlogin');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dash_board(Request $request){
        $taikhoan = $request['taikhoan'];
        $matkhau = $request['matkhau'];
        
        // $result = DB::table('admin')->where('taikhoan',$taikhoan)->where('matkhau',$matkhau)->first();//lay gioi han 1 user
        // if($result)
        // {
        //         Session()->put('admin',$result->taikhoan);
        //         Session()->put('taikhoan',$result->taikhoan);
        //         Session()->put('hoten',$result->hoten);
        //         Session()->put('dienthoai',$result->dienthoai);
        // }
        // else{
        //     Session()->put('message','mat khau or tai khoan sai ');
        //     return Redirect::to('/admin');
        // }

        if(Auth::attempt(['taikhoan' => $taikhoan, 'password' => $matkhau]))
       
        {
                  return Redirect::to('/dash');

        }
        else{
            echo 'ko thanh cong';
        }
           
       
        
    }
    public function prof($id)
    {
        $user=Auth::user($id);
        if($user)
        {
            return view('admin.thongtinadmin');
        }
    }
    public function logout()
    {
        Session()->put('taikhoan',null);
        Session()->put('hoten',null);
        return Redirect::to('/logout');
    }

    public function all_nhanvien(){

        $all_nhanvien = DB::table('admin')->get();
        $manager_nhanvien = view('admin.all_nhanvien')->with('all_nhanvien',$all_nhanvien);
        return view('adminlayout')->with('admin.all_nhanvien',$manager_nhanvien);  
    }
    //Thêm mới nhân viên
    public function add_nhanvien(){
        return view('admin.add_nhanvien');
    }
    public function save_nhanvien(Request $request){
        $data = array();
        $data['id'] = $request->id;
        $data['taikhoan'] = $request->taikhoan;
        $data['matkhau'] = $request->matkhau;
        $data['hoten'] = $request->hoten;
        $data['dienthoai'] = $request->dienthoai;
        $data['email'] = $request->email;
        $data['trangthai'] = $request->trangthai;
        $data['quyen'] = $request->quyen;

        DB::table('admin')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('/add-nhanvien');
    }
    //Thay đổi trang thái
    public function active_nhanvien($id){
        DB::table('admin')->where('id',$id)->update(['trangthai'=>1]);
        Session::put('message','Hiển thị thành công');
        return Redirect::to('all-nhanvien');
    }
    public function unactive_nhanvien($id){
        DB::table('admin')->where('id',$id)->update(['trangthai'=>0]);
        Session::put('message','Ẩn thành công');
        return Redirect::to('all-nhanvien');
    }
    //Cập nhật thông tin nhân viên
    public function edit_nhanvien($id){
        $edit_nhanvien = DB::table('admin')->where('id',$id)->get();
        $manager_nhanvien = view('admin.edit_nhanvien')->with('edit_nhanvien',$edit_nhanvien);
        return view('adminlayout')->with('admin.edit_nhanvien',$manager_nhanvien);
    }
    public function update_nhanvien(Request $request,$id){
        $data = array();
        $data['matkhau'] = md5($request->matkhau);
        $data['hoten'] = $request->hoten;
        $data['dienthoai'] = $request->dienthoai;
        $data['email'] = $request->email;
        DB::table('admin')->where('id',$id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-nhanvien');
    }
    //Xóa nhân viên
    public function delete_nhanvien($id){
        DB::table('admin')->where('id',$id)->delete($data);
        Session::put('message','Xóa thành công');
        return Redirect::to('all-nhanvien');
    }
}
