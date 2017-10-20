<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 14:39
 * ip2long — 将 IPV4 的字符串互联网协议转换成长整型数字
 */

$ip = gethostbyname('www.example.com'); //dns解析
$out = "The following URLs are equivalent:<br />\n";
$out .= 'http://www.example.com/, http://' . $ip . '/, and http://' . sprintf("%u", ip2long($ip)) . "/<br />\n";
echo $out;

// 对应的 long2ip就是将 long 的IP协议字符转换为IP

$a = 123;
$b = 456;

print($a); // print只能打印一个变量
printf("this is dddd %d", $a); // 可以进行多变量格式化输出
$arr1 = range(1,3);
print_r($arr1);

var_dump($arr1);  // print r只打印数组元素 vardump 打印元素和类型 所以printr 等打印NULL false 的时候是空的
print(NULL);
print(false);
$c = sprintf("this is return printf %d", $b);
var_dump($c); //sprintf 不打印 是返回的