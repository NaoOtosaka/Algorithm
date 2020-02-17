<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/17
 * Time: 12:57
 */

/**
 * Class Solution   测试类
 */
class Solution {

    static $pArr = [[0,1], [1,0], [0,-1], [-1,0]];  //预制坐标范围
    static $m;  //矩阵高
    static $n;  //矩阵宽

    /**
     * @param array $matrix 目标矩阵
     * @return int|mixed    最长路径
     */
    public static function longestIncreasingPath(array $matrix) {
        $count = 0; //计数

        $cache = array();   //初始化dp

        //宽高赋值
        self::$m = count($matrix);
        self::$n = count($matrix[0]);

        //遍历矩阵内坐标，dfs搜索
        for ($i = 0;$i < self::$m;$i++){
            for ($v = 0;$v < self::$n;$v++){
                $count = max($count, self::dfs($matrix, $i, $v, $cache));
            }
        }
        return $count;
    }

    /**
     * @param array $matrix 目标矩阵
     * @param int $x    当前点x坐标
     * @param int $y    当前点y坐标
     * @param array $cache  //记忆矩阵
     * @return mixed    当前点最大递增数
     */
    public static function dfs(array $matrix, int $x, int $y, array &$cache){
        //记忆区存在性判定
        $cache[$x][$y] = isset($cache[$x][$y]) ? $cache[$x][$y] : 0;

        //记忆区内已有计算数据
        if ($cache[$x][$y] != 0){
            return $cache[$x][$y];
        }

        //遍历预制点数组，对当前坐标进行四方向浮动
        foreach (self::$pArr as $coordinate){
            $xTemp = $x + $coordinate[0];
            $yTemp = $y + $coordinate[1];

            //深度优先搜索
            if ($xTemp >= 0 && $yTemp >= 0 && $xTemp < self::$m && $yTemp < self::$n
                && $matrix[$xTemp][$yTemp] > $matrix[$x][$y]){
                $cache[$x][$y] = max($cache[$x][$y],self::dfs($matrix, $xTemp, $yTemp, $cache));
            }
        }
        return ++$cache[$x][$y];
    }
}




$nums = [[0,1,2,3,4,5,6,7,8,9],
    [19,18,17,16,15,14,13,12,11,10],
    [20,21,22,23,24,25,26,27,28,29],
    [39,38,37,36,35,34,33,32,31,30],
    [40,41,42,43,44,45,46,47,48,49],
    [59,58,57,56,55,54,53,52,51,50],
    [60,61,62,63,64,65,66,67,68,69],
    [79,78,77,76,75,74,73,72,71,70],
    [80,81,82,83,84,85,86,87,88,89],
    [99,98,97,96,95,94,93,92,91,90],
    [100,101,102,103,104,105,106,107,108,109],
    [119,118,117,116,115,114,113,112,111,110],
    [120,121,122,123,124,125,126,127,128,129],
    [139,138,137,136,135,134,133,132,131,130],
    [0,0,0,0,0,0,0,0,0,0]];

var_dump(Solution::longestIncreasingPath($nums));