<?php

namespace Database\Seeders;

use App\Models\Menus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['name' => 'Customer Master', 'address' => 'customer', 'icon' => "fa fa-address-book"],
            ['name' => 'Employee Details', 'address' => 'employee_master', 'icon' => "fa fa-address-book"],
            ['name' => 'Service Master', 'address' => 'services', 'icon' => "fa fa-address-book"],
            ['name' => 'Reports', 'address' => 'reports', 'icon' => "fa fa-address-book"],
            ['name' => 'User Management', 'address' => 'user_management', 'icon' => "fa fa-address-book"],
        ];
        Menus::truncate();
        foreach ($menus as $menu) {
            Menus::create($menu);
        }
    }
}
