<?php

namespace Database\Seeders;

use App\Models\Menus;
use App\Models\Users;
use App\Models\UserMenus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_menus')->truncate();

        $users = Users::all();
        $menus = Menus::all();
        UserMenus::truncate();
        foreach ($users as $user) {
            foreach ($menus as $menu) {
                UserMenus::create([
                    'user_id' => $user->id,
                    'menu_id' => $menu->id,
                    'is_alloted' => 0,
                    'all' => 0,
                    'add' => 0,
                    'edit' => 0,
                    'view' => 0,
                    'delete' => 0,
                ]);
            }
        }
    }
}
