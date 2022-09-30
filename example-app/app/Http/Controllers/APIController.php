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

        print_r($arr);
    }



}
