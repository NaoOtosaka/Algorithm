<?php
/**
 * Created by PhpStorm
 * User: Yuuri/NaoOtosaka
 * Date: 2020/2/13
 * Time: 12:22
 */

class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val) {
         $this->val = $val;
     }

     function show(){
         if ($this->next != null){
             return $this->val."->".$this->next->show();
         }else{
             return $this->val;
         }
     }
}

/**
 * @param int $tag
 * @param array $list
 * @return ListNode
 */
function test(int $tag,array $list){

    if ($tag >= count($list) - 1){
        return new ListNode($list[$tag]);
    }else{
        $list[$tag] = new ListNode($list[$tag]);
        $list[$tag]->next = test($tag + 1,$list);
    }

    return $list[$tag];
}

function mergeTwoLists(array $l1, array $l2) {
    $answer = array();
    for ($i = 0;$i < count($l1);$i++){
        array_push($answer, $l1[$i]);
    }
    for ($i = 0;$i < count($l2);$i++){
        array_push($answer, $l2[$i]);
    }
    sort($answer);

    $firstNode = test(0,$answer);

    var_dump($firstNode);

    return $str = $firstNode->show();
}



var_dump(mergeTwoLists([2,3,1,5,1],[8,6,4,7,2]));




