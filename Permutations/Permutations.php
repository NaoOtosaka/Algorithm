<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/3/2
 * Time: 10:27
 */

/**
 * @param $nums
 * @return array
 */
function permute(array $nums) {
    $res = array();
    for ($i = 0;$i < count($nums);$i++){
        $temp = [];
        dfs($nums, $temp, $res);
    }
    return $res;
}

function dfs($nums, $temp, &$res){
    if (count($temp) == count($nums)){
        array_push($res, $temp);
        return;
    }
    for ($a = 0;$a < count($nums);$a++){
        if (in_array($nums[$a], $temp)){
            continue;
        }
        array_push($temp,$nums[$a]);
        dfs($nums, $temp, $res);
        array_pop($temp);
    }
}


$arr = [1,2,3,4];

var_dump(permute($arr));