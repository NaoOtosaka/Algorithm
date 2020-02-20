<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/20
 * Time: 11:47
 */

/**
 * @param $nums
 * @return int
 */
function removeDuplicates(&$nums) {
    if(count($nums) == 0) return false;
    $flag = 0;
    foreach ($nums as $num){
        if ($num != $nums[$flag]){
            $flag++;
            $nums[$flag] = $num;
        }
    }
    return ++$flag;
}
$nums = [1,1,1,2,3];

var_dump(removeDuplicates($nums));
var_dump($nums);