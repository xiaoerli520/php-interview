## 表达式

无

## 运算符

### 运算符优先级

```
clone new 

[    // array

** // 算数运算符

++ -- int float string array object bool @ 递增递减 类型转换

instanceof

!

* / %

+ - .

>> << 

< <= > >=

== != === !== <> <=>

&

^

|

&&

||

??

? : // 三目运算符

= += -= *= /= 

and

xor

or
```


```
<?php
$a = 3 * 3 % 5; // (3 * 3) % 5 = 4
// ternary operator associativity differs from C/C++
$a = true ? 0 : true ? 1 : 2; // (true ? 0 : true) ? 1 : 2 = 2

$a = 1;
$b = 2;
$a = $b += 3; // $a = ($b += 3) -> $a = 5, $b = 5  这里是因为向右结合导致
?>

```

```
<?php
$a = 1;
echo $a + $a++; // may print either 2 or 3

$i = 1;
$array[$i] = $i++; // may set either index 1 or 2
?>
```

** 代表求幂

取模就是取余数


```
<?php
$a = 3;
$b = &$a; // $b 是 $a 的引用

print "$a\n"; // 输出 3
print "$b\n"; // 输出 3

$a = 4; // 修改 $a

print "$a\n"; // 输出 4
print "$b\n"; // 也输出 4，因为 $b 是 $a 的引用，因此也被改变
?>
```

### 位运算符

```
$a & $b // 按位与

$a | $b // 按位或

$a ^ $b // 按位异或

~ $a // 按位取反

$a << $b 左移 每次左移相当于×2
```