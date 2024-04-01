<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for ($i = 0; $i < 60; $i++) {
            DB::table('employees')->insert([
                'firstname' => fake()->firstName,
                'lastname' => fake()->lastName,
                'fullname_ar' => fake('ar_JO')->name,
                'position' => fake()->jobTitle,
                'department' => 'Informatique',
                'idnumber' => fake()->randomLetter() . fake()->numerify('######'),
                'email' => fake()->email,
                'current_year_days' => fake()->numberBetween(0, 22),
                'previous_year_days' => fake()->numberBetween(0, 22),
            ]);
        }
    }
}
