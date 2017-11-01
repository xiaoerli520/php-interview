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

PHP函数在接收参数的时候也可以进行类型要求

```
<?php
 function test(boolean $param) {}
 test(true);
 ?>
 
 然而这样是会报错的 要求bool  给了个bool
 
 参数类型判断也可以适用于类等
 
 class C {}
 class D extends C {}
 
 // This doesn't extend C.
 class E {}
 
 function f(C $c) {
     echo get_class($c)."\n";
 }
 
 f(new C);
 f(new D);  // extend是可以的
 f(new E); // 此句报错 会出现不是instanceof C的fatal
 
 interface 同样适用
 <?php
 interface I { public function f(); }
 class C implements I { public function f() {} }
 
 // This doesn't implement I.
 class E {}
 
 function f(I $i) {
     echo get_class($i)."\n";
 }
 
 f(new C);
 f(new E);
 ?>
 
```

## return

```
<?php
function small_numbers()
{
    return array (0, 1, 2);
}
list ($zero, $one, $two) = small_numbers(); // list的方法是把数组的值赋给一些变量
?>
```

PHP7新特性 确定返回值的类型

```
<?php
function sum($a, $b): float {
    return $a + $b;
}

// Note that a float will be returned.
var_dump(sum(1, 2));
?>

但是！！
<?php
declare(strict_types=1);

function sum($a, $b): int {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1, 2.5)); // 这句会fatal 因为返回了float 是错误的
?>
```

## 可变函数

PHP 支持可变函数的概念。这意味着如果一个变量名后有圆括号，PHP 将寻找与变量的值同名的函数，并且尝试执行它。

可变函数可以用来实现包括回调函数，函数表在内的一些用途。

```
<?php
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

// 使用 echo 的包装函数
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()
?>
```

## 匿名函数 (闭包函数)

```
<?php
$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');
?>
```

闭包可以从父作用域中继承变量。 任何此类变量都应该用 use 语言结构传递进去。 
PHP 7.1 起，不能传入此类变量： superglobals、 $this 或者和参数重名。

```
<?php
$message = 'hello';

// 没有 "use"
$example = function () {
    var_dump($message);
};
echo $example();

// 继承 $message
$example = function () use ($message) {
    var_dump($message);
};
echo $example();

// Inherited variable's value is from when the function
// is defined, not when called
// 也就是说当use的时候的变量值已经固定 以后重新定义是无用的
$message = 'world';
echo $example();

// Reset message
$message = 'hello';

// Inherit by-reference
// 使用引用就可以受影响了
$example = function () use (&$message) {
    var_dump($message);
};
echo $example();

// The changed value in the parent scope
// is reflected inside the function call
$message = 'world';
echo $example();

// Closures can also accept regular arguments
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello");
?>
```

静态闭包函数

```
<?php

class Foo
{
    function __construct()
    {
        $func = static function() {
            var_dump($this);
        };
        $func();
    }
};
new Foo();

?>
```