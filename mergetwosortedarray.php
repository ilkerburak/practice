<?php
/*
Merge two sorted arrays into one sorted array. Given two sorted arrays, write a code to merge them in a sorted manner.

Input:

arr1 = { 1, 5, 6, 7}, arr2 = { 2, 5, 8, 9, 11}

Output:

{1, 2, 5, 5, 6, 7, 8, 9, 11}
 */

function mergeArray($arr1, $arr2){
    $arr = [];
    $indexFirst = 0;
    $indexSecond = 0;
    $total = count($arr1) + count($arr2);
    $i = 0;
    while($i < $total) {
        if (!isset($arr1[$indexFirst])) {
            $arr[] = $arr2[$indexSecond];
            $indexSecond++;
        } else if (!isset($arr2[$indexSecond])) {
            $arr[] = $arr1[$indexFirst];
            $indexFirst++;
        } else {
            if ($arr1[$indexFirst] < $arr2[$indexSecond]) {
                $arr[] = $arr1[$indexFirst];
                $indexFirst++;
            } else {
                $arr[] = $arr2[$indexSecond];
                $indexSecond++;
            }
        }
        $i++;
    }

    return $arr;
}

print_r(mergeArray([1, 5, 6, 7], [2, 5, 8, 9, 11]));
