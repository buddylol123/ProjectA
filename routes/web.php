<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// $permissionNames = $user->getPermissionNames('edit'); 
Route::get('/a', function () {
    // $role = Role::create(['name' => 'admin']);
    
//     $role=Role::find(2);
//     $permission = Permission::find(2);
//     $role->givePermissionTo($permission);
// $permission->assignRole($role);
// collection of name strings
$user =Auth::user();
// $user->givePermissionTo('edit articles');

// // Adding permissions via a role
// $user->assignRole('writer');

// dd($user); // Returns only users with the role 'writer'
$user->givePermissionTo('view ');

// // Adding permissions via a role
// $user->assignRole('writer');

// dd($user); 

});

Route::get('admin', function () {
    echo"thanh cong";
})->middleware('Permission');
Route::get('writer', function () {
    echo"thanh cong";
});
// Route::get('/', function () {
//     return view('welcome');
// });
//admin
Route::get('/admin','App\Http\Controllers\Admincontroller@index');
Route::get('/dash','App\Http\Controllers\Admincontroller@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\Admincontroller@dash_board');
Route::get('/thongtinadmin/{id}','App\Http\Controllers\Admincontroller@prof');

//quanlyKhachhang
Route::get('/thongtinkhachhang','App\Http\Controllers\Khachhangcontroller@Xemthongtin');

//quanlynhanvien
Route::get('/add-nhanvien','App\Http\Controllers\Admincontroller@add_nhanvien');
Route::post('/save-nhanvien','App\Http\Controllers\Admincontroller@save_nhanvien');

Route::get('/delete-nhanvien/{id}','App\Http\Controllers\Admincontroller@delete_nhanvien');

Route::get('/all-nhanvien','App\Http\Controllers\Admincontroller@all_nhanvien');

Route::get('/edit-nhanvien/{id}','App\Http\Controllers\Admincontroller@edit_nhanvien');
Route::post('/update-nhanvien/{id}','App\Http\Controllers\Admincontroller@update_nhanvien');

Route::get('/active-nhanvien/{id}','App\Http\Controllers\Admincontroller@active_nhanvien');
Route::get('/unactive-nhanvien/{id}','App\Http\Controllers\Admincontroller@unactive_nhanvien');