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

        print_r($arr);

        
    }



}
