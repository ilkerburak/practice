<?php
/*
Find top k most frequent elements in an array of integers.

Given an array of integers, return the k most frequent elements.

Example 1:

Input: arr = {1, 1, 1, 2, 2, 3, 3, 3}, k = 2 (In this input array, we have to find two most frequent elements.)

Output: {1, 3}

The number 1 and 3 occurs thrice, so it is the two most frequent elements in this input array.

Example 2:

Input: arr = {1}, k = 1

Output: {1}
 */

function findMost($arr, $k){
    $hash = [];
    foreach($arr as $a){
        if(!isset($hash[$a])){
            $hash[$a] = 1;
        } else {
            $hash[$a]++;
        }
    }

    arsort($hash);
    $res = array_keys($hash);
    return array_slice($res, 0,  $k);
}

$arr = [1, 1, 1, 2, 2, 3, 3, 3];
print_r(findMost($arr, 2));