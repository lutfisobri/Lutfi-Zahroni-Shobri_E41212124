<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Role::create([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\User::create([
            'name' => 'Kateru Riyu',
            'email' => 'kateruriyu@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
