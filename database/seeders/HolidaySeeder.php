<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('holidays')->insert([
            // Religious Holidays
            ['name' => 'Aïd Al Fitr', 'date' => '2024-04-10'],
            ['name' => 'Aïd Al Fitr', 'date' => '2024-04-11'],
            ['name' => 'Aïd Al Adha', 'date' => '2024-06-16'],
            ['name' => 'Aïd Al Adha', 'date' => '2024-06-17'],
            ['name' => '1er Moharram', 'date' => '2024-07-08'],
            ['name' => 'Aïd Al Mawlid', 'date' => '2024-09-16'],

            // National Holidays
            ['name' => 'Nouvel An', 'date' => '2024-01-01'],
            ['name' => 'Manifeste de l’Indépendance', 'date' => '2024-01-11'],
            ['name' => 'Nouvel An Amazigh', 'date' => '2024-01-14'],
            ['name' => 'Fête du Travail', 'date' => '2024-05-01'],
            ['name' => 'Fête du Trône', 'date' => '2024-07-30'],
            ['name' => 'Allégeance Oued Eddahab', 'date' => '2024-08-14'],
            ['name' => 'Révolution du Roi et du Peuple', 'date' => '2024-08-20'],
            ['name' => 'Fête de la Jeunesse', 'date' => '2024-08-21'],
            ['name' => 'Anniversaire de la Marche verte', 'date' => '2024-11-06'],
            ['name' => 'Fête de l’Indépendance', 'date' => '2024-11-18'],
        ]);
    }
}
