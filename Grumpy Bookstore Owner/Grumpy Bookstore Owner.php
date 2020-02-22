<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/22
 * Time: 14:21
 */

/**
 * @param $customers
 * @param $grumpy
 * @param $X
 * @return int|mixed
 */
function maxSatisfied(array $customers,array $grumpy,int $X) {

    $time = count($customers);
    $res = 0;
    $maxRes = 0;
    $sum = 0;

    for ($i = 0;$i < $time;$i++) {
        if ($grumpy[$i] == 0){
            $sum += $customers[$i];
            $customers[$i] = 0;
        }
    }

    for ($i = 1;$i < $time;$i++){
        $res =  $i < $X ?  $res + $customers[$i] : $res + $customers[$i] - $customers[$i - $X];
        $maxRes = max($maxRes, $res);
    }
    return $sum + $maxRes;
}

maxSatisfied([1,0,1,2,1,1,7,5], [0,1,0,1,0,1,0,1], 3);





//方法一
//for ($v = 0;$v < count($customers);$v++) {
//    $ans = 0;
//    for ($i = 0; $i < count($customers); $i++) {
//        if ($i <= $v + $X - 1 && $i >= $v){
//            $ans += $customers[$i];
//            continue;
//        }
//        $ans += $grumpy[$i] == 0 ? $customers[$i] : 0;
//    }
//    $res = max($ans, $res);
//}


//方法二
//$time = count($customers);
//$endTime = $time - $X;
//$res = 0;
//$ans = 0;
//$start = 0;
//
//for ($i = 0; $i < count($customers); $i++) {
//    $ans += $grumpy[$i] == 0 ? $customers[$i] : 0;
//}
//
//while ($start <= $endTime){
//    $tag = $ans;
//    $end = $start + $X - 1;
//    for ($i = $start; $i <= $end; $i++) {
//        if ($grumpy[$i] == 1){
//            $tag += $customers[$i];
//        }
//    }
//    $res = max($res, $tag);
//    $start++;
//}
//return $res;
