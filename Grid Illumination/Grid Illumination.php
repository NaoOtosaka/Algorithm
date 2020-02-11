<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/11
 * Time: 12:38
 */

/**
 * Class Lamp灯泡类
 */
class Lamp{

    public $status = 0; //灯泡状态（0为关，1为开）
    public $source = 0; //受光源影响数量
    public $isLightSource = false;  //是否为光源

    /**
     * 电源开
     */
    public function On(){
        $this->status = 1;
    }

    /**
     * 电源关
     */
    public function Off(){
        $this->status = 0;
    }

    /**
     * 开灯
     */
    public function LightenUp(){
        $this->isLightSource = true;
        $this->On();
        $this->source += 1;
    }

    /**
     * 关灯
     */
    public function LightenOff(){
        $this->isLightSource = false;
        $this->source -= 1;
//        若不受其它点亮的灯泡影响则关闭亮度
        if ($this->source == 0){
            $this->Off();
        }
    }

    /**
     * 受其它光源影响
     */
    public function Shine(){
        $this->On();
        $this->source += 1;
    }

    /**
     * 受其它光源影响取消
     */
    public function ShineOff(){
        $this->source -= 1;
//        若不受其它点亮的灯泡影响则关闭亮度
        if ($this->source == 0){
            $this->Off();
        }
    }
}

/**
 * Class Board面板类
 */
class Board{

    public $board = array(array()); //初始化面板数组
    public $sideLength; //面板边长

    /**
     * Board constructor.
     * @param int $N 设定边长
     */
    public function __construct(int $N)
    {
        $this->sideLength = $N;
        for ($i = 0;$i < $N;$i++){
            for ($v = 0;$v < $N;$v++){
                $this->board[$i][$v] = new Lamp();
            }
        }
    }

    /**
     * @param array $lamps  灯泡坐标数组
     * 面板上开启灯泡并影响其他坐标
     */
    public function LightOn(array $lamps){
        foreach ($lamps as $lamp){
//            灯泡电源开启
            $this->board[$lamp[0]][$lamp[1]]->LightenUp();
//            影响作用
            for ($i = 0;$i < $this->sideLength;$i++) {
//                行、列影响
                if ($i !== $lamp[0]) {
                    $this->board[$i][$lamp[1]]->Shine();
                }
                if ($i !== $lamp[1]) {
                    $this->board[$lamp[0]][$i]->Shine();
                }

//                交叉影响
//                公式：  y=x+(z(y)-z(x))
//                        y=-x+(z(y)+z(x))

                $yA = $i + ($lamp[1] - $lamp[0]);
                $yB = -$i + ($lamp[0] + $lamp[1]);
                if ($yA >= 0 && $yA < $this->sideLength && $yA !== $lamp[1]){
                    $this->board[$i][$yA]->Shine();
                }
                if ($yB >= 0 && $yB < $this->sideLength && $yB !== $lamp[1]){
                    $this->board[$i][$yB]->Shine();
                }
            }
        }
    }

    /**
     * @param array $lamp   灯泡坐标数组
     * 面板上关闭灯泡并影响其他坐标
     */
    private function LightOff(array $lamp){
//        灯泡电源关闭
        $this->board[$lamp[0]][$lamp[1]]->LightenOff();
        for ($i = 0;$i < $this->sideLength;$i++){
            if ($i !== $lamp[0]){
                $this->board[$i][$lamp[1]]->ShineOff();
            }
            if ($i !== $lamp[1]){
                $this->board[$lamp[0]][$i]->ShineOff();
            }

            $yA = $i + ($lamp[1] - $lamp[0]);
            $yB = -$i + ($lamp[0] + $lamp[1]);
            if ($yA >= 0 && $yA < $this->sideLength && $yA !== $lamp[1]){
                $this->board[$i][$yA]->ShineOff();
            }
            if ($yB >= 0 && $yB < $this->sideLength && $yB !== $lamp[1]){
                $this->board[$i][$yB]->ShineOff();
            }
        }
    }

    /**
     * @param array $lamps 需要查询的灯泡数组
     * 在面板中查询灯泡并关闭周围8个坐标的灯泡
     * @return array 返回答案数组,每个值 queryArr[i] 等于第 i 次查询 queries[i] 的结果
     */
    public function query(array $lamps){
        $queryArr = array();
        foreach ($lamps as $lamp){
            array_push($queryArr,$this->board[$lamp[0]][$lamp[1]]->status);
            echo "灯泡(".$lamp[0].",".$lamp[1].")状态为：".$this->board[$lamp[0]][$lamp[1]]->status."<br>";
//            循环遍历查询坐标周围八个坐标
            for ($i = -1;$i <= 1;$i++){
                for ($v = -1;$v <= 1;$v++){
//                    存在性检验and光源验证
                    if (!isset($this->board[$lamp[0] + $i][$lamp[1] + $v])
                        || !$this->board[$lamp[0] + $i][$lamp[1] + $v]->isLightSource){
                        continue;
                    }
                    $this->LightOff([$lamp[0] + $i,$lamp[1] + $v]);
                }
            }
        }
        return $queryArr;
    }

    /**
     * 展示面板状态
     */
    public function show(){
        foreach ($this->board as $value){
            foreach ($value as $v){
                echo $v->status." ";
            }
            echo "<br>";
        }
    }
}

function gridIllumination(int $N,array $lamps,array $queries) {
    $board = new Board($N);
    $board->LightOn($lamps);
//    echo "开灯时状态为：<br>";
//    $board->show();
//    echo "<br>";
    $answer = $board->query($queries);
//    echo "关灯后状态为：<br>";
//    $board->show();
    return $answer;
}

$answer = gridIllumination(1000,[[0,0], [4,3]],[[2,2], [4,3]]);