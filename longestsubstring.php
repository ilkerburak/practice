<?php
/*
Given a string, find the length of the longest substring without repeating characters.

For example –

Example 1:

Input: “abcabcbb” Output: 3

The output string is “abc”, with a length of 3.

Example 2:

Input: “bbbbb” Output: 1

The longest substring in this example is “b”. Its length is 1.

Example 3:

Input: “pwwkew” Output: 3

The answer is “wke”. Its length is 3.
*/

function longestSub($str){
    $maxArr = [];
    for($i = 0; $i < strlen($str) - 1; $i++){
        $tmpArr = [$str[$i]];

        for($j = $i + 1; $j < strlen($str); $j++){
            if(in_array($str[$j], $tmpArr)){
                break;
            }
            $tmpArr[] = $str[$j];
        }
        if(count($tmpArr) > count($maxArr)) $maxArr = $tmpArr;
    }
    return count($maxArr);
}

echo longestSub("abcabcbb");