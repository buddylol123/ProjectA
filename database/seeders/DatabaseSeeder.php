<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data=[
            'taikhoan'=>'thanhloi',
            'password'=>bcrypt('123'),
            'hoten'=>'loi',
            'dienthoai'=>'1111',
            'email'=>'loi@gmail.com',
            'trangthai'=>1,
            'quyen'=>1,

        ];
        DB::table('admin')->insert($data);
    }
}
