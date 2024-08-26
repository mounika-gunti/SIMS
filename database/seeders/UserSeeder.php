<?php

namespace Database\Seeders;

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
        Artisan::call('db:seed MenuSeeder');
        Artisan::call('db:seed RoleSeeder');
        User::truncate();
        $user = User::create([
            'username' => 'superadmin',
            'first_name' => 'DoozieSoft',
            'last_name' => 'Admin',
            'role_id' => '1',
            'email' => 'clear@dooziesoft.com',
            'password' => Hash::make('SIMS#123'),
        ]);

        Artisan::call('db:seed UserMenusSeeder');
    }
}
