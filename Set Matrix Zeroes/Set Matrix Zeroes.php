<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/16
 * Time: 14:51
 * @param $matrix
 */
function setZeroes(&$matrix) {

    $m = count($matrix);
    $n = count($matrix[0]);

    for ($i = 0;$i < $m;$i++){
        for ($v = 0;$v < $n;$v++){
            if ($matrix[$i][$v] === 0 || $matrix[$i][$v] === true){
                setZ($matrix, $i, $v);
            }
        }
    }

    for ($i = 0;$i < $m;$i++) {
        for ($v = 0; $v < $n; $v++) {
            if ($matrix[$i][$v] === true|| $matrix[$i][$v] === false) {
                $matrix[$i][$v] = 0;
            }
        }
    }

}

function setZ(&$board, $x, $y){

    $m = count($board);
    $n = count($board[0]);

    for ($i = 0;$i < $n;$i++){
        $board[$x][$i] = $board[$x][$i] === 0 || $board[$x][$i] === true ? true : false;
    }
    for ($v = 0;$v < $m;$v++){
        $board[$v][$y] = $board[$v][$y] === 0 || $board[$v][$y] === true? true : false;
    }

}


$arr = [
    [0,1,2,0],
    [3,4,5,2],
    [1,3,1,5]
];
setZeroes($arr);
var_dump($arr);








