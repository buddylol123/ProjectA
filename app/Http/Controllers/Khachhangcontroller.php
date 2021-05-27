<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class Khachhangcontroller extends Controller
{
    public function Xemthongtin()
    {
        $Khachhang=DB::table('khachhang')->orderby('makh','desc')->get();
        $quanlykhachhang=view('admin.thongtinkhachhang')->with('Khachhang',$Khachhang);
        return view('adminlayout')->with('admin.thongtinkhachhang',$quanlykhachhang);
    }
}
