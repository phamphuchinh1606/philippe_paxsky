<?php

namespace App\Common;

class NumberUtils{
    public static function formatMoney($value){
        return number_format($value);
    }

    public static function formatDouble($value){
        try{
            if($value == (int)$value){
                return number_format($value);
            }
            if($value * 10 == (int)($value*10)){
                return number_format($value,1);
            }
        }catch (\Exception $ex){}

        return number_format($value,2);
    }
}
