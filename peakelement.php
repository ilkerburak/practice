<?php
/*
Given an array of integers, find a peak element. The array may contain multiple peak elements, in that case, return anyone peak element.
Peak element is an element which greater than it’s neighbours.

For example:

Input: {2, 3, 4, 7, 5} , Output: 7

The element 7 is greater than it’s neighbours (4 and 5).

Input: {8, 7, 6, 5, 4}, Output: 8

In this example, An array is strictly decreasing, so the first element is the peak element.

Input: {2, 3, 4, 5, 6}, Output: 6

An array is strictly increasing, so the last element is the peak element.

Input: {2, 2, 2, 2, 2}, Output: 2

All the array element is the same, So every element in this array is the peak element.
*/

function findPeak($arr){
    if(count($arr) == 0) return;
    $peakElem = $arr[0];
    for($i = 0; $i < count($arr); $i++){
        $leftCondition = isset($arr[$i - 1]) ? $arr[$i] > $arr[$i - 1] : true;
        $rightCondition = isset($arr[$i + 1]) ? $arr[$i] > $arr[$i + 1] : true;

        if($leftCondition && $rightCondition) {
            $peakElem = $arr[$i];
        }
    }

    if($peakElem) {
        return "found: ".$peakElem;
    } else {
        return "not found";
    }
}

$arr = [2, 3, 4, 7, 5];
echo findPeak($arr);
