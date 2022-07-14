<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
          DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Xem danh sach user, xoa user',
                'created_at' =>  $now ,
                'updated_at' =>  $now ,
            ],
           [

                'name' => 'Player',
                'description' => 'Chơi game, xem ranking, cmt',
                'created_at' =>  $now ,
                'updated_at' =>  $now ,
            ],
          ]);
    }
}
