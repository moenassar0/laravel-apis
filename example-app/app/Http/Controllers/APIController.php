<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    function firstAPI($str){
        //Split string into array
        $arr = str_split($str);
        //Sort array alphabatically (numbers are at the start now)
        usort($arr, 'strcasecmp');

        //Use usort to sort numbers after characters
        usort($arr , function ($a, $b){
            if(is_numeric($a) && !is_numeric($b))
                return 1;
            else if(!is_numeric($a) && is_numeric($b))
                return -1;
        });

        //Shuffle capital letters to the right side of their lowercase versions
        for($i = 0; $i < count($arr); $i++){
            if($i != count($arr) - 1){
                if(strtolower($arr[$i]) == $arr[$i + 1]){
                    $temp = $arr[$i + 1];
                    $arr[$i + 1] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }
        }
        $arr = implode("", $arr);


        return response()->json([
            "status" => "Success",
            "message" => $arr
        ]);
    }
}
