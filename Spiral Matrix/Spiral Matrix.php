<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/14
 * Time: 13:10
 * @param array $matrix
 */

function spiralOrder(array $matrix) {

    $answer = array();  //初始化结果数组

    $m = count($matrix);    //行
    $n = count($matrix[0]); //列

    $mF = 0;        //首行指针
    $mL = $m - 1;   //末行指针

    $nF = 0;        //首列指针
    $nL = $n - 1;   //末列指针

    while (true){
//        上遍历
        for ($i = $nF;$i <= $nL;$i++){
            array_push($answer,$matrix[$mF][$i]);
        }
        if (++$mF > $mL){
            break;
        }

//        右遍历
        for ($i = $mF;$i <= $mL;$i++){
            array_push($answer,$matrix[$i][$nL]);
        }
        if (--$nL < $nF){
            break;
        }

//        下遍历
        for ($i = $nL;$i >= $nF;$i--){
            array_push($answer,$matrix[$mL][$i]);
        }
        if (--$mL < $mF){
            break;
        }

//        左遍历
        for ($i = $mL;$i >= $mF;$i--){
            array_push($answer,$matrix[$i][$nF]);
        }
        if (++$nF > $nL){
            break;
        }
    }
    return $answer;
}

var_dump(spiralOrder([
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9,10,11,12],
    [13,14,15,16]
]));
