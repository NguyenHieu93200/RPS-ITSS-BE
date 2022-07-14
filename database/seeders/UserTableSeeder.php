<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.vn',
                'name' => 'Admin',
                'password' => Hash::make('123456'),
                'role' => 1,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
            ],
             [
                'email' => 'giangnt@gmail.vn',
                'name' => 'Nguyễn Trường Giang',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'tuyentx@gmail.vn',
                'name' => 'Trần Xuân Tuyên',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'phuongtm@gmail.vn',
                'name' => 'Trần Minh Phương',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'hieunh@gmail.vn',
                'name' => 'Nguyễn Hữu Hiếu',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'hainv@gmail.vn',
                'name' => 'Ngô Văn Hải',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'vinhnt@gmail.vn',
                'name' => 'Nguyễn Thiện Vinh',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'trangtt@gmail.vn',
                'name' => 'Thái Thị Trang',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'dieppv@gmail.vn',
                'name' => 'Phùng Văn Điệp',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'namnv@gmail.vn',
                'name' => 'Nguyễn Văn Nam',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'vuht@gmail.vn',
                'name' => 'Hoàng Thái Vũ',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
               'email' => 'huylt@gmail.vn',
               'name' => 'Lê Thanh Huy',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'trangpt@gmail.vn',
               'name' => 'Phạm Thị Trang',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'datnn@gmail.vn',
               'name' => 'Nguyễn Ngọc Đạt',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'huylh@gmail.vn',
               'name' => 'Lê Hồng Huy',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
        ]);
    }
}
