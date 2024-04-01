<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'login' => 'Aymanebk',
            'email' => 'aymanebk@gmail.com',
            'password' => 'passwd',
            'role' => 'admin',
        ]);

        $this->call([
            HolidaySeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
