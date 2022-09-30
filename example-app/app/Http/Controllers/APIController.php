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

    function secondAPI($num){

        $numAsArray = array();

        //Transform number into array and find number of digits in number from array's length
        function countDigits($number, $numAsArray){
            $digits = 0;
            while(($number) != 0){
                $actualNumber = $number % 10;
                $number = (int)($number / 10);
                array_push($numAsArray, $actualNumber);
            }
            return ($numAsArray);
        }

        $numAsArray = countDigits($num, $numAsArray);
        $length = count($numAsArray);

        //For each array element multiply it by its position in the array, largest numbers are last in the array
        for($i = $length - 1; $i > 0; $i--){
            $numAsArray[$i] = (int)$numAsArray[$i] * pow(10, $i);
        }

        //Reverse array for proper reading
        $numAsArray = (array_reverse($numAsArray));
        return response()->json([
            "status" => "Success",
            "number as array" => $numAsArray
        ]);
    }

    function thirdAPI($str){
        //Split string to array based on pattern switching
        //Patterns being detected are characters, spaces, dots, and numbers
        preg_match_all('/([0-9]+|[a-zA-Z]+|[\s]+|[\.])/', $str, $matches);
        $matches = $matches[0];

        //Check numbers found in array and change them into binary representation using decbin
        for($i = 0; $i < count($matches); $i++){
            if(is_numeric((int)$matches[$i]) && decbin($matches[$i] != 0)){
                $matches[$i] = decbin($matches[$i]);
            }
        }
        
        //Join the array into string and return it
        $matches = (implode("", $matches));
        return response()->json([
            "status" => "Success",
            "message" => $matches
        ]);                                                   
    }

    function fourthAPI($str){
        $arr = explode(" ", $str);
        print_r($arr);
        if($arr[0] == '+'){
            $answer = 0;
            for($i = 1; $i < count($arr); $i++){
                $answer += $arr[$i];
            }
        }
        else if($arr[0] == '-'){
            
        }
        else if($arr[0] == '/'){
            
        }
        else if($arr[0] == '*'){
            
        }
        echo $answer;
    }
}
