# 引用

在 PHP 中引用意味着用不同的名字访问同一个变量内容。这并不像 C 的指针

$a = &b;

$a 和 $b 在这里是完全相同的，这并不是 $a 指向了 $b 或者相反，而是 $a 和 $b 指向了同一个地方。

```

// 如果在一个函数内部给一个声明为 global 的变量赋于一个引用，该引用只在函数内部可见。可以通过使用 $GLOBALS 数组避免这一点。


<?php
$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;
    if (!$use_globals) {
        $var2 =& $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] =& $var1; // visible also in global context
    }
}

global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''
global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'
?>

```

```
<?php
function foo(&$var)
{
    $var++;
}

$a=5;
foo($a);
// $a is 6 here
?>
但是这样写的话
在最近版本的 PHP 中如果把 & 用在 foo(&$a); 中会得到一条警告说“Call-time pass-by-reference”已经过时了。



变量，例如 foo($a)
New 语句，例如 foo(new foobar())
从函数中返回的引用，例如：

<?php
function &bar()
{
    $a = 5;
    return $a;
}
foo(bar());
?>
```

任何其它表达式都不能通过引用传递，结果未定义。例如下面引用传递的例子是无效的：

```
<?php
function foo(&$var)
{
    $var++;
}
function bar() // Note the missing &
{
    $a = 5;
    return $a;
}
foo(bar()); // 自 PHP 5.0.5 起导致致命错误，自 PHP 5.1.1 起导致严格模式错误
            // 自 PHP 7.0 起导致 notice 信息
foo($a = 5) // 表达式，不是变量
foo(5) // 导致致命错误
?>
```

取消引用
$a = 1;
$b = &$a;
unset($a)

不会 unset $b，只是 $a。

再拿这个和 Unix 的 unlink 调用来类比一下可能有助于理解。