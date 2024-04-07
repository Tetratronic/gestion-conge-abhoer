<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();





Schedule::call(function () {
    // Logic to update vacation days
    DB::table('employees')->update([
        'previous_year_days' => DB::raw('current_year_days'),
        'current_year_days' => 22
    ]);
})->yearlyOn(1, 1, '00:00')->timezone('Africa/Casablanca');

//Schedule::call(function () {
//    // Logic to update vacation days
//    DB::table('employees')->update([
//        'previous_year_days' => DB::raw('previous_year_days + 1' ),
//        'current_year_days' => 22
//    ]);
//})->everyMinute();

