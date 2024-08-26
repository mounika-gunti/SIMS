<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Artisan::call('db:seed MenuSeeder');
        Artisan::call('db:seed RoleSeeder');
        User::truncate();
        $user = User::where('username', 'superadmin')->first();
        if (!$user) {
            $user = User::create([
                'username' => 'superadmin',
                'first_name' => 'DoozieSoft',
                'middle_name' => '',
                'last_name' => 'Admin',
                'last_logged_in_at' => Carbon::now(),
                'active_from' => Carbon::now(),
                'role_id' => '1',
                'password' => Hash::make('SIMS#123'),
            ]);
        }

        Artisan::call('db:seed UserMenuSeeder');
    }
}
