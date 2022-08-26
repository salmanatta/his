<?php

namespace Database\Seeders;

use Database\Seeders\UserTableUser;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        // $this->call([UserTableUser::class,]);        
        // $this->call(LaratrustSeeder::class);
        

        // \App\Models\User::factory(10)->create();
    }
}