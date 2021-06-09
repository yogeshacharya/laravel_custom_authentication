<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today_date = Carbon::now()->toDateString();
        DB::table('users')->insert([
            array('id' => '1','name' => 'Administrator','email' => 'admin@admin.com','has_admin_role'=>1,'registerated_date' => $today_date, 'password'=> \Hash::make('12345678')),
        ]);
    }
}
