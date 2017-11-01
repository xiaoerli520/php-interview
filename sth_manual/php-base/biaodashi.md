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

```
echo 2 ^ "4"; // 2 ^ ((int)"4")

// PHP的报错配置也是使用了位运算符进行定义

// E_ALL ^ E_NOTICE 类似就使用了异或的方法
```

### 比较运算符

```
$a <=> $b // 太空船运算符 PHP7开始提供 小于返回 -1 等于返回 0 大于返回 1

$a ?? $b ?? $c NULL合并操作符

$email = isset($_GET['email']) ? $_GET['email'] : 'noemail';

运用运算符之后就可以这样写

$email = $_GET['email'] ?? 'noemail';

也可以

$email = $_GET['email'] ?: 'noemail';

$info = $_GET['email'] ?? $_POST['email'] ?? ‘noemail';

```

```
// Manual的例程

<?php
var_dump(0 == "a"); // 0 == 0 -> true
var_dump("1" == "01"); // 1 == 1 -> true
var_dump("10" == "1e1"); // 10 == 10 -> true
var_dump(100 == "1e2"); // 100 == 100 -> true

switch ("a") {
case 0:
    echo "0";
    break;
case "a": // never reached because "a" is already matched with 0
    echo "a";
    break;
}

// Strings
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1 ASCII比较
echo "a" <=> "aa"; // -1

echo ([3, 2, 1] <=> [3, 2, 3]) // -1  也就是说太空舱函数是从开始往后比的

$a = (object) ["a" => "b"];
 
$b = (object) ["a" => "c"];
 
echo $a <=> $b; // -1  只会对比它们的值

?>
```

> 多种类型的比较

```
String和Integer进行对比 将转化为数字进行比较 这也就是10e2 == 100的原因

由于浮点数 float 的内部表达方式，不应比较两个浮点数float是否相等。

// 乍看起来下面的输出是 'true'
echo (true?'true':false?'t':'f');

// 然而，上面语句的实际输出是't'，因为三元运算符是从左往右计算的

// 下面是与上面等价的语句，但更清晰
echo ((true ? 'true' : 'false') ? 't' : 'f');


```

### 错误控制运算符

@

### 执行运算符

```
// `` 反引号 PHP尝试将反引号内的部分当做shell指令执行 类似shell_exec();
而且输出的内容可以输出到变量 $opt = `ls`;

```

### 单词形式的逻辑运算符

```
and or xor && || !(并没有not)
```

> 符号的要比字母的优先级要高

### 数组运算符

```
// 以下都是数组
$a + $b  // 联合 把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略。
$a == $b // 两数组有相同的键值对
$a === $b // 两数组具有相同的键值对并且顺序也一样
!= <> 均为不等于的意思
```

### 类型运算符

instanceof 用于确定一个PHP变量是否属于某一类class的实例

```
<?php
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass); true 
var_dump($a instanceof NotMyClass); false

class ParentClass
{
}

class MyClass extends ParentClass
{
}

$a = new MyClass;

var_dump($a instanceof MyClass); true
var_dump($a instanceof ParentClass); true 对继承类有效

// 也可以用于interface 接口


```


