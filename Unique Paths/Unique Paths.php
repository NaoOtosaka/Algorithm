<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/10
 * Time: 10:52
 */

function uniquePaths($m, $n) {
//    定义二维数组
    $pathNum = array();

//    dp[m][n] = dp[m-1][n] + dp[m][n-1]

//    定义初始值
    for ($i = 0;$i < $m;$i++){
        $pathNum[$i][0] = 1;
    }
    for ($i = 0;$i < $n;$i++){
        $pathNum[0][$i] = 1;
    }

    for ($i = 1;$i < $m;$i++){
        for ($v = 1;$v < $n;$v++){
            $pathNum[$i][$v] = $pathNum[$i - 1][$v] + $pathNum[$i][$v - 1];
        }
    }

    return $pathNum[$m - 1][$n - 1];
}

var_dump(uniquePaths(10,9));

