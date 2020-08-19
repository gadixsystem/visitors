<?php

namespace gadixsystem\visitors;

use gadixsystem\visitors\Models\Visitor;
use Illuminate\Support\Carbon;
use gadixsystem\visitors\Models\Unique;

class VisitorsHelper
{
    /**
     * Get Active Visitors
     * @return integer
     */
    public static function getActive()
    {
        $unique = Unique::where('active', true)->count();
        return $unique;
    }
    /**
     * Get blocked Visitors
     * @return integer
     */
    public static function getBlocked()
    {
        $unique = Unique::where('active', false)->count();
        return $unique;
    }

    /**
     * Get Total Visitors
     * @return integer
     */
    public static function getTotal()
    {
        $unique = Unique::count();
        return $unique;
    }

    /**
     * Get today visitors
     * @return integer
     */
    public static function getToday()
    {
        $unique = Unique::where('created_at','>=',Carbon::today())->count();
        return $unique;
    }

    /**
     * Provide Labels and values for the visitors of last six months.
     */
    public static function graphic()
    {
        $currentMonth = Carbon::now()->month;

        $current = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth
        )->distinct('unique_id')->count('unique_id');

        $current_1 = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth - 1
        )->distinct('unique_id')->count('unique_id');

        $current_2 = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth - 2
        )->distinct('unique_id')->count('unique_id');

        $current_3 = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth - 3
        )->distinct('unique_id')->count('unique_id');

        $current_4 = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth - 4
        )->distinct('unique_id')->count('unique_id');

        $current_5 = Visitor::whereMonth(
            'created_at',
            '=',
            $currentMonth - 5
        )->distinct('unique_id')->count('unique_id');

        $currentYear = Carbon::now()->year;

        $currentYear = Carbon::now()->year;


        $labels = array();

        for ($i = 5; $i >= 0; $i--) {
            if ($currentMonth - $i < 1) {
                $currentYear = Carbon::now()->year - 1;

                switch ($currentMonth - $i) {
                    case -4:
                        $month = 8;
                        break;
                    case -3:
                        $month = 9;
                        break;
                    case -2:
                        $month = 10;
                        break;
                    case -1:
                        $month = 11;
                        break;
                    case 0:
                        $month = 12;
                        break;
                }
            } else {
                $currentYear = Carbon::now()->year;
                $month = $currentMonth - $i;
            }

            $label = $month . "-" . $currentYear;

            array_push($labels, $label);
        }

        $data = [$current_5, $current_4, $current_3, $current_2, $current_1, $current];

        $total = Unique::count();

        return ["labels" => $labels, "data" => $data, "total" => $total];
    }
}
