<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 14:
 * Serialize 序列化操作
 * serialize()可处理除了resource之外的任何类型
 * 想要将已序列化的字符串变回 PHP 的值，可使用unserialize()
 */
//简单一点的
//$array = array();
//$array['key'] = 'website';
//$array['value']='www.isoji.org';
//$a = serialize($array);
//echo $a;
//unset($array);
//$a = unserialize($a);
//print_r($a);

class dog {
    var $name;
    var $age;
    var $owner;
    function dog($in_name="unnamed",$in_age="0",$in_owner="unknown") {
        $this->name = $in_name;
        $this->age = $in_age;
        $this->owner = $in_owner;
    }
    function getage() {
        return ($this->age * 365);
    }

    function getowner() {
        return ($this->owner);
    }

    function getname() {
        return ($this->name);
    }
}

$ourfirstdog = new dog("Rover",12,"Lisa and Graham");
$dogdisc = serialize($ourfirstdog);
print $dogdisc;

// 可以将数据变成序列化的字符串 方便进行传输 也可以方便存储 而且可以进行json文本的直接存储

/**
 * array_shift() 删除数组的第一个元素
 * array_unshift() 将某一个元素的值插入数组开头作为数组的第一个元素
 */