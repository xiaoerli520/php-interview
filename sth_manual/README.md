## PHP基础问题

### 类型

含有九大类型

标准：Boolean布尔类型、Integer整型、Float浮点类型、String字符串

集合：Array Object

特殊 NULL Resource Callback

>Boolean

FALSE 的集合有 0 0.0 '' '0' false null array()

```
-1 和其它非零值（不论正负）一样，被认为是 TRUE！
(bool)-2312312 = 1...
```
>Integer

扩展：GMP BCMath 是两个高精度计算库，可以用来令PHP计算高精度数据

Integer 表达

```
<?php
$a = 1234; // 十进制数
$a = -123; // 负数
$a = 0123; // 八进制数 (等于十进制 83)
$a = 0x1A; // 十六进制数 (等于十进制 26)
$a = 0b11111111; // 二进制数字 (等于十进制 255)
?>
```

PHP不支持无符号整数 可以通过
```
PHP_INT_MAX/MIN 来查看最大最小值 2147483647 -2147483648 32bit
9223372036854775807 -9223372036854775808 64bit
```

注意！PHP没有整除运算符 因为是弱类型 会灵活的转换

1/2 = float 0.5

除法运算后可以进行floor进行整除 MOD()亦可 或者也可以进行(int) 转换

转换为整型

Resource转换为int会成为系统为其分配的统一资源号

```
<?php
echo (int) ( (0.1+0.7) * 10 ); // 未知精度转换。显示 7!
?>

// 对于精度问题 在小数点后五位精度内都是相等的
```

NaN应该使用函数 is_nan(); 来进行比较

### 变量

以一个有效的字母或者下划线开头 中间可以有字母数字下划线

```
[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*

$i站点is = 'mansikka';  // 合法变量名；可以用中文
```

变量默认总是传值赋值。那也就是说，当将一个表达式的值赋予一个变量时，整个原始表达式的值被赋值到目标变量。这意味着，例如，当一个变量的值赋予另外一个变量时，改变其中一个变量的值，将不会影响到另外一个变量。

有一点重要事项必须指出，那就是只有有名字的变量才可以引用赋值，表达式结果 或者函数引用（其实是可以的，需要在函数名前面加&）都不可以直接使用&。

```
<?php
$foo = 25;
$bar = &$foo;      // 合法的赋值
$bar = &(24 * 7);  // 非法; 引用没有名字的表达式

function test()
{
   return 25;
}

$bar = &test();    // 非法
?>
```
> isset() 语言结构可以用来检测一个变量是否已被初始化。

关于预定义变量 没什么好说的，4.20取消了register globals 

变量范围：

```
<?php
$a = 1; /* 全局变量 并不能在函数体内使用 */

function Test()
{
    echo $a; /* 局部变量 无法继承全局变量 但是JavaScript可以继承全局变量var not let */
    global $a;
    echo $a; // 此时a = 1 所以PHP中引用全局变量需要global 这是出于安全起见
    echo $GLOBALS['a']; // 这样也是可以的 全局变量的另一种调用方式
    echo $HTTP_POST_VARS['name'];
    echo $_POST['name']; // 超全局变量不需要global 可以直接使用
}

Test();
?>
```


```
<?php

$a = 1;

function Test()
{
    $a = 0; // 普通变量每次都进行初始化
    static $b = 0; // 静态变量在多次调用的时候只初始化一次
    static $c = (1+2) // 错误 静态变量不可以使用表达式进行声明
    $a++;
    $b++;
    echo $a;
    echo $b;
}

for();

```

### 可变变量

```
<?php

$a = 'hello';

$$a = 'gtx';  // 一个可变变量获取了一个普通变量的值作为这个可变变量的变量名

// 此时有两个变量被定义 a 的值为 hello hello(可变名字的变量) 值为 gtx
echo "$a ${$a}";
echo "$a $hello";


?>
```


一个例程

```
<?php
class foo {
    var $bar = 'I am bar.';
    var $arr = array('I am A.', 'I am B.', 'I am C.');
    var $r   = 'I am r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$bar . "\n";
echo $foo->$baz[1] . "\n";

$start = 'b';
$end   = 'ar';
echo $foo->{$start . $end} . "\n";

$arr = 'arr';
echo $foo->$arr[1] . "\n";
echo $foo->{$arr}[1] . "\n";

?>
```



### 来自外面的变量

从POST表单中获取变量

```
import_request_variables('p', 'p_'); // 已经被弃用
echo $p_username;
```

你可以使用 types 参数指定需要导入的变量。可以用字母‘G’、‘P’和‘C’分别表示 GET、POST 和 Cookie。这些字母不区分大小写，所以你可以使用‘g’、‘p’和‘c’的任何组合。POST 包含了通过 POST 方法上传的文件信息。注意这些字母的顺序，当使用“gp”时，POST 变量将使用相同的名字覆盖 GET 变量。任何 GPC 以外的字母都将被忽略。

prefix 参数作为变量名的前缀，置于所有被导入到全局作用域的变量之前。所以如果你有个名为“userid”的 GET 变量，同时提供了“pref_”作为前缀，那么你将获得一个名为 $pref_userid 的全局变量。