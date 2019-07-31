<?php
/*
Given an array of strings, write a method to find the longest common prefix string. If no common prefix is found, return an empty string ” “.

For example:

Example 1:

Input: [“cate”,”catle”,”catera”]
Output: “cat”

The common prefix is ca.

Example 2:

Input: [“rat”,”dog”,”elephant”]
Output: “”

No common prefix is found.
*/

function findLongestCommon($arr){
    $minCharCount = PHP_INT_MAX;

    foreach($arr as $item){
        if(strlen($item) < $minCharCount) $minCharCount = strlen($item);
    }

    $longestArr = [];
    $tmpArr = [];

    for($i = 0; $i < $minCharCount; $i++){
        $tmp = null;
        $sameCount = 0;
        foreach($arr as $item){
            $val = str_split($item);
            if(!isset($tmp)){
                $sameCount++;
                $tmp = $val[$i];
                continue;
            } else {
                if($tmp == $val[$i]) {
                    $sameCount++;
                } else {
                    if(count($tmpArr) > count($longestArr)) {
                        $longestArr = $tmpArr;
                        $tmpArr = [];
                        break;
                    }
                }
            }

            if($sameCount == count($arr)) {
                $tmpArr[] = $tmp;
            }
        }


    }

    return $longestArr;
}

print_r(findLongestCommon(["catla","catle","catlra"]));
print_r(findLongestCommon(["rat","dog","elephant"]));