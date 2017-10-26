# 函数

## UDF

```
有效的函数名以字母或下划线打头，后面跟字母，数字或下划线。
```


```
当一个函数是有条件被定义时，必须在调用函数之前定义。

$makefoo = true;

/* 不能在此处调用foo()函数，
   因为它还不存在，但可以调用bar()函数。*/

bar();

if ($makefoo) {
  function foo()
  {
    echo "I don't exist until program execution reaches me.\n";
  }
}
```

## 函数参数传递

PHP 支持按值传递参数（默认），通过引用传递参数以及默认参数。也支持可变长度参数列表。

```
如果希望函数改变你传入的值 也是需要进行引用的专递  也可以使用函数return  
不过这样就不用return了

函数参数必须是标量 不可以是变量 类成员 或者是函数
```

PHP 支持不定参数个数的传入 传入的个个参数会被变成数组进行储存
```
<?php
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
?>

可逆的 也可以进行用于解构

<?php
function add($a, $b) {
    return $a + $b;
}

echo add(...[1, 2])."\n";

$a = [1, 2];
echo add(...$a);
?>

```

以前写带默认值函数的时候会出现Missing Argument 1的问题 是因为函数定义的参数顺序不对

```
<?php
function makeyogurt($type = "acidophilus", $flavour)
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt("raspberry");   // won't work as expected
?>

<?php
function makeyogurt($flavour, $type = "acidophilus")
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt("raspberry");   // works as expected
?>
```

