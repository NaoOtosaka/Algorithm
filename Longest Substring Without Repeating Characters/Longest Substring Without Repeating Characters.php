<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/21
 * Time: 14:14
 */

function lengthOfLongestSubstring($s){
    switch (strlen($s)){
        case 0: return 0;
        case 1: return 1;
    }

    $strArr = str_split($s);
    $start = 0;
    $end = 0;
    $maxLen = 1;

    while (isset($strArr[$end + 1])){
        for ($i = $start;$i <= $end;$i++){
            if ($strArr[$i] == $strArr[$end + 1]){
                break;
            }
        }
        if ($i <= $end){
            $start = $i + 1;
        }
        $end++;
        $len = $end - $start + 1;
        $maxLen = $maxLen < $len ? $len : $maxLen;
    }
    return $maxLen;
}

var_dump(lengthOfLongestSubstring(""));