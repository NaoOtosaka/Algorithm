<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数字汉字转换</title>
</head>
<body>
<h2>数字汉字转换（12位以内）</h2>
<form action="font.php" method="post">
    <input type="number" name="num" id="num">
    <input type="submit">
</form>
<hr>

<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/3
 * Time: 16:57
 */
//错误抑制
error_reporting(E_ALL&~E_NOTICE);

//接收变量、初始化数组、计算变量长度、初始化位数计数器
$inputNum = $_POST['num'];
$arrNum = [];
$numLen = strlen($inputNum);
$bit = 0;
$bitTemp = 0;

//输入校验
if ($numLen > 12 || $inputNum < 0){
    echo "参数不合法";
    exit();
}

//完整性校验
if (!isset($inputNum)){
    echo "请输入参数";
}

//特殊情况
if ($inputNum == 0){
    echo "零";
}

//字典定义
$numFont = array(0=>"", 1=>"一", 2=>"二",3=>"三",4=>"四",5=>"五",6=>"六",7=>"七",8=>"八",9=>"九");
$baseBit = array(0=>"", 1=>"", 2=>"十", 3=>"百", 4=>"千");
$carryBit = array(0=>"", 1=>"万", 2=>"亿");

//提取变量中单个数字至数组，并累计位数计数器
for ($i = pow(10, $numLen - 1);$i >= 1;$i /= 10){
    $arrNum[$bit] = intval($inputNum / $i);
    $inputNum %= $i;
    $bit++;
}

//输出
for ($i = intval($bit / 4);$i >= 0;$i--){
    for ($v = intval($bit - ($i * 4));$v >= 1;$v--){
        if ($v == 1 && $arrNum[$bitTemp - 1] == 0 && isset($arrNum[$bitTemp - 1]) && $arrNum[$bitTemp]){
            echo "零";
        }
        echo $numFont[$arrNum[$bitTemp]];
        if ($arrNum[$bitTemp]){
            echo $baseBit[$v];
        }
        $bit --;
        $bitTemp ++;
    }
    if ($numLen / 4 > $i){
        echo $carryBit[$i];
        $numLen -= 1;
    }
}
?>
</body>
</html>


