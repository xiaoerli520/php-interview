<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 14:18
 *
 * 引用相关
 */

function &myfunc()
{
    return 10;
}

$a = myfunc(); // 常规调用 结果为10
var_dump($a);
$a = &myfunc(); // 引用调用 返回了函数的地址
$a = 100;
echo myfunc();