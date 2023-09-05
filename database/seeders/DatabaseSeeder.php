<?php

namespace Database\Seeders;
use App\Models\Rol;
use App\Models\User;
use App\Models\UserRol;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Rol::create([
            'name' => 'admin',
        ]);

        Rol::create([
            'name' => 'instructor',
        ]);

        Rol::create([
            'name' => 'aprendiz',
        ]);

        User::create([
            'code' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail',
            'password' => bcrypt('123'),
        ]);
        UserRol::create([
            'user_id' => 1,
            'rol_id' => 1,
        ]);
    }
}
