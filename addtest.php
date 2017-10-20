<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 11:15
 * 浮点数相加测试
 * 后式会出现float数的精度问题 结果应该是0.7999999 所以不会得到预期的8
 */
$a = 0.5;
$b = 0.1;
if ((float)$a + (float)$b === (float)0.6) {
    echo "equal";
} else {
    echo "no equal";
}

echo floor((0.1+0.7)*10);
