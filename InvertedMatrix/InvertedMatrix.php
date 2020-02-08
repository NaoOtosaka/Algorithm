<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/8
 * Time: 16:52
 */

$inputArr = [
    [1, 1, 0],
    [0, 1, 1],
    [0, 0, 0]
];

for ($i = 0;$i < count($inputArr);$i++){
    for ($v = 0;$v < count($inputArr)/2;$v++){
        $temp = $inputArr[$i][$v];  //缓存当前数字
        //对偏移量为v的数组首尾互换并对1进行异或运算
        $inputArr[$i][$v] = $inputArr[$i][count($inputArr[$i]) - 1 - $v] ^ 1;
        $inputArr[$i][count($inputArr[$i]) - 1 - $v]= $temp ^ 1;
    }
}
