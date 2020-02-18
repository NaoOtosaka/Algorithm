<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/18
 * Time: 10:26
 */

/**
 * @param int $x    输入值
 * @return float|int    反转值
 */
function reverse(int $x) {
    if ($x == 0){
        return 0;
    }

    $max = 0x7fffffff;
    $min = -0x80000000;
    $xTemp = abs($x);
    $ans = 0;

    while ($xTemp > 0){
        $ans = $xTemp % 10 + $ans * 10;
        $xTemp = ($xTemp - $xTemp % 10) / 10;
    }

    return $x > 0 ? ($ans < $max ? $ans : 0) : (-$ans < $min ? 0 : -$ans);
}

$ans = reverse(2147483648);
var_dump($ans);