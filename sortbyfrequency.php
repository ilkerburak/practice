<?php
/*
Given a string, write a method to sort it in decreasing order based on the frequency of characters.
For example:

Input : “teee”
Output: “eeet”

Input: “dddbbb”
Output: “dddbbb”   or “bbbddd” (Both d and b appear 3 times so any of the above output are valid)


Input:  “Eett”
Output: “ttEe” or “tteE”  (Both e and E are two different characters so the output should not be “Eett”)
*/


function sortByFreq($str){
    $strArr = str_split($str);
    $freqArr = [];
    foreach($strArr as $char){
        if(!isset($freqArr[ord($char)])) {
            $freqArr[ord($char)] = 1;
        } else {
            $freqArr[ord($char)] = $freqArr[ord($char)] + 1;
        }
    }
    // sort

    ksort($freqArr);
    foreach($freqArr as $key=>$value){
        echo repeatChar($key, $value);
    }
}

function repeatChar($key, $count){
    $str = "";
    while($count > 0){
        $str .= chr($key);
        $count--;
    }
    return $str;
}

sortByFreq("Eett");