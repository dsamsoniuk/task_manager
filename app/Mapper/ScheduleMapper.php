<?php

namespace App\Mapper;

use App\Models\Schedule;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class ScheduleMapper
{
    public static function indexMap(Collection $schedules): array{
        $map = [];
        $sumWorkTime = 0;
        $prevMonth = null;
        $prevYear = null;
        
        /** @var Schedule $schedule */
        foreach($schedules as $schedule){
            $date = DateTime::createFromFormat("Y-m-d", $schedule->date);
            $year = $date->format("Y");
            $month = $date->format("m");

            if($prevMonth === null || $prevYear === null || $prevMonth != $month || $prevYear != $year){
                $sumWorkTime = 0;
                $prevMonth = $month;
                $prevYear = $year;
            }

            $sumWorkTime += $schedule->work_hours;

            $map[$year][$month]['elements'][] = $schedule;
            $map[$year][$month]['sum_hours'] = $sumWorkTime;
        }

        // asort($map);
        // foreach($map as &$month) {
        //     // asort($month['list']);
        // }

        return $map;
    }
}