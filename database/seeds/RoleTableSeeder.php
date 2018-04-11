<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // User Role
    $role_employee = new Role();
    $role_employee->name = 'user';
    $role_employee->description = 'A User';
    $role_employee->save();
    // Employee Role, Can create new posts.
    $role_employee = new Role();
    $role_employee->name = 'employee';
    $role_employee->description = 'A Employee User';
    $role_employee->save();
    // Manager Role, Can Add products and create new posts.
    $role_manager = new Role();
    $role_manager->name = 'manager';
    $role_manager->description = 'A Manager User';
    $role_manager->save();
    // Administrator Role, Can Create new users, add products and create new posts.
    $role_manager = new Role();
    $role_manager->name = 'administrator';
    $role_manager->description = 'A Administrator User';
    $role_manager->save();
    }
}
