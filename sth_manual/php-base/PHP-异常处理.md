# PHP异常处理

每一个try后面至少有一个catch catch抛出的错误必须是Exception的一个实例化


如果所有Catch都不能复合 就会出现fatal ERROR

Uncaught Exception ..

PHP 5.5以后可以有

try catch finally 无论是不是出现了exception finally代码块仍然会执行

```
<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "First finally.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Second finally.\n";
}

// Continue execution
echo "Hello World\n";
?>

0.2
First finally.
Caught exception: Division by zero.
Second finally.
Hello World
```


可以通过重构或者扩展异常类来进行错误的email报告

> http://php.net/manual/zh/language.exceptions.extending.php


