<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/15
 * Time: 15:57
 * @param $board
 */

//初始值：1（存活）
//                周围活数量  |结果|标志值|   意义
//                  x<3          0    -2   活细胞死了
//                  x>4          0    -2   活细胞死了
//                  3<=x<=4      1    1    活细胞不变
//
//初始值：0（死亡）
//                  x=3          1    -1   死细胞活了
//                  x<3          0    0    死细胞不变
//                  x>3          0    0    死细胞不变


function gameOfLife(&$board) {
    $row = count($board);       //行数
    $column = count($board[0]); //列数

//    遍历替换为标志值
    for ($i = 0;$i < $row;$i++){
        for ($v = 0;$v < $column;$v++){
            $board[$i][$v] = countLifeNum($board,$i,$v);
        }
    }

//    遍历根据特征值判断生死
    for ($i = 0;$i < $row;$i++) {
        for ($v = 0; $v < $column; $v++) {
            $board[$i][$v] = abs($board[$i][$v]) == 1 ? 1 : 0;
        }
    }

}

function countLifeNum($board, $x, $y){
//    周围活细胞数量初始化
    $count = 0;

//    四向遍历边界设定
    $top = $x - 1 >= 0 ? $x - 1 : 0;
    $bottom = $x + 1 <= count($board) - 1 ? $x + 1 : count($board) - 1;
    $left = $y - 1 >= 0 ? $y - 1 : 0;
    $right = $y + 1 <= count($board[0]) - 1 ? $y + 1 : count($board[0]) - 1;

//    echo $top." ".$bottom." ".$left." ".$right."<br>";    //边界输出（调试）

//    根据边界遍历以输入坐标为中心的九个元素
    for ($i = $top;$i <= $bottom;$i++){
        for ($v = $left;$v <= $right;$v++){
//            元素值为1或-2时计数加一,否则不变
            $count = $board[$i][$v] == 1 || $board[$i][$v] == -2 ? $count + 1 : $count;
        }
    }

//    输入坐标为1：活细胞计数为3或4时返回1，否则返回-2；
//    输入坐标不为1：活细胞计数为3时返回-1，否则返回0。
    return $board[$x][$y] == 1 ? ($count == 3 || $count == 4 ? 1 : -2) : ($count == 3 ? -1 : 0);

}


$arr = [
    [0,1,0],
    [0,0,1],
    [1,1,1],
    [0,0,0]
];

gameOfLife($arr);