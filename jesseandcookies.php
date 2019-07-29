<?php
/*
Jesse loves cookies. He wants the sweetness of all his cookies to be greater than value .
To do this, Jesse repeatedly mixes two cookies with the least sweetness. He creates a special combined cookie with:

sweetness  Least sweet cookie   2nd least sweet cookie).

He repeats this procedure until all the cookies in his collection have a sweetness .
You are given Jesse's cookies. Print the number of operations required to give the cookies a sweetness . Print  if this isn't possible.

Sample Input:

6 7
1 2 3 9 10 12
Sample Output

2

Explanation:

Combine the first two cookies to create a cookie with sweetness  =
After this operation, the cookies are .
Then, combine the cookies with sweetness  and sweetness , to create a cookie with resulting sweetness  =
Now, the cookies are .
All the cookies have a sweetness .

Thus,  operations are required to increase the sweetness.
*/

function cookies($k, $A) {
    $try = 0;
    $cnt = 0;
    $new = 0;
    $total = count($A);

    if(checkItIsOk($A, $k)) return $try;
    while($cnt < $total - 1){
        $try++;
        list($minFirst, $minSecond) = getMinimumIndexes($A);
        $new = $A[$minFirst] +  (2 * $A[$minSecond]);
        unset($A[$minSecond]);
        $A[$minFirst] = $new;
        $A = array_values($A);
        if(checkItIsOk($A, $k)) return $try;
        $cnt++;
    }

    return -1;
}

function getMinimumIndexes($arr){
    $minFirst = PHP_INT_MAX;
    $minSecond = PHP_INT_MAX;

    $minFirstIndex = null;
    $minSecondIndex = null;

    for($i = 0; $i < count($arr); $i++){
        if($arr[$i] < $minSecond){
            $minSecond = $arr[$i];
            $minSecondIndex = $i;
        }
        if($arr[$i] < $minFirst){
            $minSecond = $minFirst;
            $minFirst = $arr[$i];

            $minSecondIndex = $minFirstIndex;
            $minFirstIndex = $i;
        }
    }

    return [$minFirstIndex, $minSecondIndex];
}