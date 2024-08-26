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
            ['name' => 'Customer Master', 'address' => 'master/customer_master', 'icon' => "fa fa-address-book"],
            ['name' => 'Employee Details', 'address' => 'master/employee_details', 'icon' => "fa fa-address-book"],
            ['name' => 'Service Master', 'address' => 'master/service_master', 'icon' => "fa fa-address-book"],
            ['name' => 'Reports', 'address' => 'master/reports', 'icon' => "fa fa-address-book"],
            ['name' => 'User Management', 'address' => 'master/user_management', 'icon' => "fa fa-address-book"],
        ];
        Menus::truncate();
        foreach ($menus as $menu) {
            Menus::create($menu);
        }
    }
}