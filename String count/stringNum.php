<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>统计字符串</title>
</head>
<style type="text/css">
    table.imagetable {
        font-family: verdana,arial,sans-serif;
        font-size:16px;
        color:#333333;
        border-width: 1px;
        border-color: #999999;
        border-collapse: collapse;
    }
    table.imagetable th {
        background:#b5cfd2;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
    table.imagetable td {
        background:#dcddc0;
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #999999;
    }
</style>

<body>
<h2>统计字符串内各字符个数</h2>
<form action="stringNum.php" method="post">
    <input type="text" name="str" id="str">
    <input type="submit">
</form>
<hr>
<table class="imagetable">
<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/4
 * Time: 12:02
 */
//错误抑制
error_reporting(E_ALL&~E_NOTICE);

//特殊字符过滤
function myTrim($str)
{
    $search = array(" ","　","\n","\r","\t");
    $replace = array("","","","","");
    return str_replace($search, $replace, $str);
}

//变量接收、变量缓存
$string = $_POST['str'];
$stringTemp = $string;

//数组初始化
$stringArr = [];
$sortStrArr = [];

//字符串过滤
$string = myTrim($string);

//字符串内个字符载入数组
for ($i = 1;$i <= strlen($string);$i++){
    $stringArr[$i-1] = substr($string,$i-1,1);
}

for ($i = 0;$i < strlen($string);$i++){
    $tag = 0;   //字符出现次数初始化
//    当值为null跳过本次循环
    if ($stringArr[$i] === null){
        continue;
    }
    $tag++;
    for ($v = $i + 1;$v < strlen($string);$v++){
        if ($stringArr[$i] !== $stringArr[$v]){
            continue;
        }
        $tag++;
        $stringArr[$v] = null;  //对比过的字符设置为null
    }
    $sortStrArr[$stringArr[$i]] = $tag;
}

//输出
if ($string){
    echo "<tr><td><b>字符串</b></td><td><b>".$stringTemp."</b></td></tr>";
}

foreach ($sortStrArr as $key => $value){
    echo "<tr>";
    echo "<td>".$key."字符出现</td><td>".$value."次<br></td>";
    echo "</tr>";
}

//var_dump($string);
//var_dump($stringArr);
//var_dump($sortStrArr);

?>
</table>
</body>
</html>

