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
                'user_id' => 'admin',
                'password' => Hash::make('123456'),
                'role' => 1,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
            ],
             [
                'email' => 'giangnt@gmail.vn',
                'name' => 'Nguyễn Trường Giang',
                'user_id' => 'giangnt',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'tuyentx@gmail.vn',
                'name' => 'Trần Xuân Tuyên',
                'user_id' => 'tuyentx',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'phuongtm@gmail.vn',
                'name' => 'Trần Minh Phương',
                'user_id' => 'phuongtm',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'hieunh@gmail.vn',
                'name' => 'Nguyễn Hữu Hiếu',
                'user_id' => 'hieunh',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'hainv@gmail.vn',
                'name' => 'Ngô Văn Hải',
                'user_id' => 'hainv',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'vinhnt@gmail.vn',
                'name' => 'Nguyễn Thiện Vinh',
                'user_id' => 'vinhnt',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'trangtt@gmail.vn',
                'name' => 'Thái Thị Trang',
                'user_id' => 'trangtt',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'dieppv@gmail.vn',
                'name' => 'Phùng Văn Điệp',
                'user_id' => 'dieppv',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'namnv@gmail.vn',
                'name' => 'Nguyễn Văn Nam',
                'user_id' => 'namnv',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
                'email' => 'vuht@gmail.vn',
                'name' => 'Hoàng Thái Vũ',
                'user_id' => 'vuht',
                'password' => Hash::make('123456'),
                'role' => 2,
                'avatar' => null,
                'created_at' => $now,
                'updated_at' =>  $now,
             ],
             [
               'email' => 'huylt@gmail.vn',
               'name' => 'Lê Thanh Huy',
               'user_id' => 'huylt',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'trangpt@gmail.vn',
               'name' => 'Phạm Thị Trang',
               'user_id' => 'trangpt',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'datnn@gmail.vn',
               'name' => 'Nguyễn Ngọc Đạt',
               'user_id' => 'datnn',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
            [
               'email' => 'huylh@gmail.vn',
               'name' => 'Lê Hồng Huy',
               'user_id' => 'huylh',
               'password' => Hash::make('123456'),
               'role' => 2,
               'avatar' => null,
               'created_at' => $now,
               'updated_at' =>  $now,
            ],
        ]);
    }
}
