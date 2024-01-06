<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'no_badge' => 124565,
            'email' => 'admin@gmail.com',
            'password' => bcrypt(124565),
        ]);

        Role::create([
            'name' => 'admin'
        ]);
    }
}
