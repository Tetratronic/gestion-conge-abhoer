<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateCalculationHelper
{
    public static function isWeekendOrHoliday($date, $holidays): bool
    {
        $date = Carbon::parse($date);
        return in_array($date->format('d-m-Y'), $holidays) || $date->isWeekend();
    }

    public static function calculateDays($startDate, $endDate, $holidays): int
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $days = 0;

        while($start->lte($end)) {
            if (!self::isWeekendOrHoliday($start, $holidays)) {
                $days++;
            }
            $start->addDay();
        }
        return $days;
    }

    public static function calculateEndDate($startDate, $duration, $holidays): string
    {
        $date = Carbon::parse($startDate);

        while($duration > 0) {
            if (!self::isWeekendOrHoliday($date, $holidays)) {
                $duration--;
            }
            if($duration > 0) {
                $date->addDay();
            }
        }
        return $date->format('Y-m-d');
    }
}
