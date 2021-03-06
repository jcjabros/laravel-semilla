<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
         // Role comes before User seeder here.
         $this->call(RoleTableSeeder::class);
         // User seeder will use the roles above created.
         $this->call(UserTableSeeder::class);
         //Category Seeder
         $this->call(PCategorySeeder::class);
         //Product Seeder
         $this->call(ProductSeeder::class);
         //Home Slider Seeder
         $this->call(HomeSliderSeeder::class);
    }
}
