<?php

use Illuminate\Database\Seeder;

class them_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Nguyễn van trường',
            'email' => 'a@gmail.com',
            'password' => bcrypt('1234'),
            'phone_number'=>'01235485624',
            'username'=>'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đức Anh',
            'email' => 'b@gmail.com',
            'password' => bcrypt('1234'),
            'phone_number'=>'01235869885',
            'username'=>'nducanh'
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Đức Tùng',
            'email' => 'c@gmail.com',
            'password' => bcrypt('1234'),
            'phone_number'=>'01235485624',
            'username'=>'bestsnip'
        ]);
         DB::table('users')->insert([
            'name' => 'Đặng Thanh Thảo',
            'email' => 'd@gmail.com',
            'password' => bcrypt('1234'),
            'phone_number'=>'0955656484',
            'username'=>'cute9x'
        ]);
        
    }
}
