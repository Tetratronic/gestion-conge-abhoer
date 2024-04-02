<?php

namespace App\Helpers;

class DateCalculationHelper
{
    public static function isWeekendOrHoliday($date, $holidays): bool
    {
        return in_array($date, $holidays) || date('N', strtotime($date)) >= 6;
    }

    public static function calculateDays($startDate, $endDate, $holidays): int
    {
        $days = 0;
        while(strtotime($startDate) <= strtotime($endDate)) {
            if (!self::isWeekendOrHoliday($startDate, $holidays)) {
                $days++;
            }
            $startDate = date('Y-m-d', strtotime($startDate . ' +1 day'));
        }
        return $days;
    }

    public static function calculateEndDate($startDate, $duration, $holidays) {
        $endDate = $startDate;
        while($duration > 0) {
            if (!self::isWeekendOrHoliday($endDate, $holidays)) {
                $duration--;
            }
            if($duration > 0) {
                $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
            }
        }
        return $endDate;
    }
}
