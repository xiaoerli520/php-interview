# PHP-流程控制
:)

> https://github.com/getify/You-Dont-Know-JS/tree/1ed-zh-CN

```
<?php

/* 不正确的使用方法： */
if($a > $b):
    echo $a." is greater than ".$b;
else if($a == $b): // 将无法编译
    echo "The above line causes a parse error.";
endif;


/* 正确的使用方法： */
if($a > $b):  // 可以使用冒号来进行 也可以不使用 但是使用的时候必须elseif为单词形式
    echo $a." is greater than ".$b;
elseif($a == $b): // 注意使用了一个单词的 elseif
    echo $a." equals ".$b;
else:
    echo $a." is neither greater than or equal to ".$b;
endif;

?>
```


MATLAB用过的一定知道if endif的使用结构 PHP也是支持的

```
<?php
if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif;
?>
// 不支持在一个控制块内使用两种语法
```


### foreach

```
当 foreach 开始执行时，数组内部的指针会自动指向第一个单元。这意味着不需要在 foreach 循环之前调用 reset()。

由于 foreach 依赖内部数组指针，在循环中修改其值将可能导致意外的行为。

为什么
foreach($key as  $item){
    change of item 不可以改变item
    可以很容易地通过在 $value 之前加上 & 来修改数组的元素。此方法将以引用赋值而不是拷贝一个值。
}
<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr is now array(2, 4, 6, 8)
unset($value); // 最后取消掉引用
?>

$value 的引用仅在被遍历的数组可以被引用时才可用（例如是个变量）。以下代码则无法运行：

<?php
foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
}
unset($value) //建议去引用

foreach 不支持用“@”来抑制错误信息的能力。
?>

```

### while list each = foreach

```
<?php
$arr = array("one", "two", "three");
reset($arr); // 重置数组指针 foreach会做这件事
while (list(, $value) = each($arr)) {
    echo "Value: $value<br>\n";
}

foreach ($arr as $value) {
    echo "Value: $value<br />\n";
}
?>
```

### 使用list()为foreach的多维数组进行解包，可以理解为JavaScript的解构

```
<?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo "A: $a; B: $b\n";
}
?>

A: 1; B: 2
A: 3; B: 4

如果list($a) 则输出
1
3

如果list($a, $b, $c);

会有警告的错误 

$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
while (list (, $val) = each($arr)) {
    if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
    }
    echo "$val<br />\n";
}



```

## continue (n)

```
continue 接受一个可选的数字参数来决定跳过几重循环到循环结尾。默认值是 1，即跳到当前循环末尾
```

## include

```
当一个文件被包含时，其中所包含的代码继承了 include 所在行的变量范围。

从该处开始，调用文件在该行处可用的任何变量在被调用的文件中也都可用。
不过所有在包含文件中定义的函数和类都具有全局作用域。
```