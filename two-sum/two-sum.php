<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/3/3
 * Time: 15:17
 */

/**
 * @param array $nums
 * @param int $target
 * @return array
 */
function twoSum(array $nums,int $target) {
//    $i = 0;
//    foreach ($nums as $value){
//        $v = 0;
//        foreach ($nums as $item){
//            if ($i != $v){
//                if (($value + $item) == $target){
//                    return [$i, $v];
//                }
//            }
//            $v++;
//        }
//        $i++;
//    }


//    for ($i = 0;$i < count($nums) - 1;$i++){
//        for ($v = $i + 1;$v < count($nums);$v++){
//            if (($nums[$i] + $nums[$v]) == $target){
//                return [$i, $v];
//            }
//        }
//    }

    $hash = array();
    foreach($nums as $i => $num) {
        $num_str = trim($num);
        $num2 = $target - $num;
        $num2_str = trim($num2);
        if (isset($hash[$num2_str])) {
            return [$hash[$num2_str], $i];
        }
        $hash[$num_str] = $i;
    }
}


$nums = [-1,-2,-3,-4,-5];
$target = -8;

var_dump(twoSum($nums, $target));