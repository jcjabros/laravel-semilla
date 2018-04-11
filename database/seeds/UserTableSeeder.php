<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $role_user = Role::where('name', 'user')->first();
    $role_employee = Role::where('name', 'employee')->first();
    $role_manager  = Role::where('name', 'manager')->first();
    $role_administartor  = Role::where('name', 'administrator')->first();
    //
    $employee = new User();
    $employee->name = 'User Name';
    $employee->email = 'user@example.com';
    $employee->password = bcrypt('secret');
    $employee->save();
    $employee->roles()->attach($role_user);
    //
    $employee = new User();
    $employee->name = 'Employee Name';
    $employee->email = 'employee@example.com';
    $employee->password = bcrypt('secret');
    $employee->save();
    $employee->roles()->attach($role_employee);
    //
    $manager = new User();
    $manager->name = 'Manager Name';
    $manager->email = 'manager@example.com';
    $manager->password = bcrypt('secret');
    $manager->save();
    $manager->roles()->attach($role_manager);
    //
    $employee = new User();
    $employee->name = 'Administrator Name';
    $employee->email = 'administrator@example.com';
    $employee->password = bcrypt('secret');
    $employee->save();
    $employee->roles()->attach($role_administartor);
    }
}
