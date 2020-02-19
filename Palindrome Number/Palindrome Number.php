<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/19
 * Time: 13:06
 * @param int $x
 * @return bool
 */

//function isPalindrome($x) {
//
//    $numArr = array();
//
//    if($x < 0){
//        return false;
//    }
//
//    if ($x == 0){
//        return true;
//    }
//
//    while ($x > 0){
//        $temp = $x % 10;
//        array_push($numArr,$temp);
//        $x = ($x - $temp) / 10;
//    }
//
//    for ($i = 0;$i < count($numArr) /2;$i++){
//        if ($numArr[0 + $i] !== $numArr[count($numArr) - 1 - $i]){
//            return false;
//        }
//        if ($i >= count($numArr) /2 - 1){
//            return true;
//        }
//    }
//}

function isPalindrome(int $x) {
    $xTemp = $x;
    $ans = 0;
    if($x < 0){
        return false;
    }
    if ($x == 0){
        return true;
    }
    while ($xTemp > 0){
        $ans = $ans * 10 + $xTemp % 10;
        $xTemp = ($xTemp - $xTemp % 10) / 10;
    }
    return $x == $ans ? true : false;
}

var_dump(isPalindrome(121));
