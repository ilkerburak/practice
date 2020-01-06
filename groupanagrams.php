<?php
/*
Given an array of strings or a list of words, write a code to group anagrams together.
For example, Word “car” and “rac” are anagrams of each other. As both, the strings contain the same number of characters only the order of character is different in both the strings.

Now, let’s understand this problem statement with example.

For example:

Input: {“eat”, “tea”, “tan”, “ate”, “nat”, “bat”}

Output:

[
["ate","eat","tea"],
["nat","tan"],
["bat"]
]
]
 */

function groupAnagrams(Array $arr){
    $retArr = [];

    foreach($arr as $item){
        $itemArr = str_split($item);
        $val = implode("", $itemArr);
        sort($itemArr);
        $key = implode("", $itemArr);
        $retArr[$key][]  = $val;
    }

    return $retArr;
}

print_r(groupAnagrams(["eat", "tea", "tan", "ate", "nat", "bat"]));