<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/9
 * Time: 11:38
 */



$str = 'MCMXCVII';

function RomanNumDisplay(string $str){
//    初始化字典
    $RomanNum = [
        'I'=> 1,
        'V'=> 5,
        'X'=> 10,
        'L'=> 50,
        'C'=> 100,
        'D'=> 500,
        'M'=> 1000,
    ];
//    初始化字符串map及和
    $stringArr = [];
    $sum = 0;

//    字符串=>数组
    for ($i = 1;$i <= strlen($str);$i++){
        $stringArr[$i-1] = substr($str,$i-1,1);
    }

    for ($v = 0;$v < count($stringArr);$v++){
        if (isset($stringArr[$v + 1]) && $RomanNum[$stringArr[$v]] < $RomanNum[$stringArr[$v + 1]]){
            $sum += $RomanNum[$stringArr[$v + 1]] - $RomanNum[$stringArr[$v]];
            $v++;
            continue;
        }
        $sum += $RomanNum[$stringArr[$v]];
    }
    return $sum;
}
var_dump($str);
var_dump(RomanNumDisplay($str));
