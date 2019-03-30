<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(them_user::class);
        $this->call(them_fc::class);
        $this->call(them_tran::class);
        $this->call(them_ve_cuoc::class);
    }
}
