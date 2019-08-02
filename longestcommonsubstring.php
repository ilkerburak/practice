<?php
//  Given two strings ‘X’ and ‘Y’, find the longest common substring.

function longestCommonSubsequence($a, $b){
    $longestStr = "";

    if(strlen($a) > strlen($b)){
        $minLengthStr = $b;
        $maxLengthStr = $a;
    } else {
        $minLengthStr = $a;
        $maxLengthStr = $b;
    }

    for($i = 0; $i < strlen($minLengthStr) - 1; $i++){
        $searchStr = $minLengthStr[$i];
        for($j = $i ; $j < strlen($minLengthStr); $j++){
            if($j != $i) {
                $searchStr = $searchStr.$minLengthStr[$j];
            }

            if(strpos($maxLengthStr, $searchStr) !== false){
                if(strlen($searchStr) > strlen($longestStr)){
                    $longestStr = $searchStr;
                }
            }
        }
    }

    return $longestStr;
}

echo longestCommonSubsequence("zxabcdezy", "yzabcdezx");