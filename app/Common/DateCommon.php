<?php

namespace App\Common;
use Carbon\Carbon;

class DateCommon{

    private static function dateTimeZone(){
        return new \DateTimeZone("Asia/Ho_Chi_Minh");
    }

    public static function newDate($format = "m/d/Y"){
        return Carbon::now(self::dateTimeZone());
    }

    public static function createFromFormat($value, $format = "m/d/Y"){
        return Carbon::createFromFormat($format,$value);
    }

    public static function dateFormat($value, $format = "d-m-Y H:i"){
        return Carbon::parse($value)->format($format);
    }

    public static function getDayOnDate($value){
        return Carbon::parse($value)->day;
    }
    public static function getMonthOnDate($value){
        return Carbon::parse($value)->shortEnglishMonth;
    }

    public static function dateFormatText($value, $format = "d-M-Y H:i"){
        $today = date("d-M-Y");
        $another_date = Carbon::parse($value);

        $days = (strtotime($today) - strtotime($another_date->format('d-M-Y')))/ (60 * 60 * 24);

        $dateMain = $another_date->format($format);
        if ($days == 0) {
            $date = "Today".' <span>'.$another_date->format('H:i').'</span>';
        } else if($days == 1){
            $date = "Yesterday".' <span>'.$another_date->format('H:i').'</span>';
        } else {
            $date = $dateMain;
        }
        return $date;
    }

    public static function dateToString($date, $format = "d-M-Y"){
        return $date->format($format);
    }
}
