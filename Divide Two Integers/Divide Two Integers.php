<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/12
 * Time: 13:05
 */
define("INT32_MAX",2147483647);
define("INT32_MIN",-2147483647);
function divide(int $dividend,int $divisor) {
    if ($dividend == 0){
        return 0;
    }

    if ($divisor == -1 && $dividend <= INT32_MIN){
        return INT32_MAX;
    }

    $tag = ($dividend ^ $divisor) < 0;

    $dividendTemp = abs($dividend);
    $divisorTemp = abs($divisor);
//    初始化答案
    $answer = 0;

    for ($i=31; $i>=0;$i--) {
        if (($dividendTemp>>$i)>=$divisorTemp) {
            $answer+=1<<$i;
            $dividendTemp-=$divisorTemp<<$i;
        }
    }
    return $tag ? -$answer : $answer;
}


divide(100,3);

