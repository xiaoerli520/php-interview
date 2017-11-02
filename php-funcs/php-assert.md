# PHP 断言

assert — 检查一个断言是否为 FALSE

assert这个函数在php语言中是用来判断一个【表达式】是否成立。返回true or false;

有点像Unit test

assert_option() // 设置断言判断的相关选项

ASSERT_ACTIVE	assert.active	1	启用 assert() 断言

ASSERT_WARNING	assert.warning	1	为每个失败的断言产生一个 PHP 警告（warning）

ASSERT_BAIL	assert.bail	0	在断言失败时中止执行

ASSERT_QUIET_EVAL	assert.quiet_eval	0	在断言表达式求值时禁用 error_reporting

ASSERT_CALLBACK	assert.callback	(NULL)	断言失败时调用回调函数

通过官网的实例看到断言都在测试一些内置的函数 如何测试我们自己写的函数呢？

```
bool assert ( mixed $assertion [, string $description ] )

assert() 会检查指定的 assertion 并在结果为 FALSE 时采取适当的行动。
```

dl — 运行时载入一个 PHP 扩展

extension_loaded — 检查一个扩展是否已经加载

gc_collect_cycles — 强制收集所有现存的垃圾循环周期

```
<?php
// getenv() 使用示例
$ip = getenv('REMOTE_ADDR');

// 或简单仅使用全局变量（$_SERVER 或 $_ENV）
$ip = $_SERVER['REMOTE_ADDR'];
?>
```

# Phar

```
<?php
$phar = new Phar('swoole.phar');
$phar->buildFromDirectory(__DIR__.'/../', '/\.php$/');
$phar->compressFiles(Phar::GZ);
$phar->stopBuffering();
$phar->setStub($phar->createDefaultStub('lib_config.php'));

new Phar的参数是压缩包的名称。buildFromDirectory指定压缩的目录，第二个参数可通过正则来制定压缩文件的扩展名。

Phar::GZ表示使用gzip来压缩此文件。也支持bz2压缩。参数修改为 PHAR::BZ2即可。

setSub用来设置启动加载的文件。默认会自动加载并执行 lib_config.php。

执行此代码后，即生成一个swoole.phar文件。

include 'swoole.phar';
include 'swoole.phar/code/page.php';
```

bool is_nan ( float $val )


如果 val 为“非数值”，例如 acos(1.01) 的结果，则返回 TRUE。

bool imagesetpixel ( resource $image , int $x , int $y , int $color )

imagesetpixel() 在 image 图像中用 color 颜色在 x，y 坐标（图像左上角为 0，0）上画一个点。

Sphinx搜索引擎扩展


session_destroy — 销毁一个会话中的【全部】数据

session_is_registered — 检查变量是否在会话中已经注册

session_unset — 释放所有的会话变量

bin2hex — 函数把包含数据的二进制字符串转换为十六进制值

chop — rtrim 的别名

htmlspecialchars_decode — 将特殊的 HTML 实体转换回普通字符


htmlspecialchars — 将特殊字符转换为 HTML 实体

join — 别名 implode

lcfirst — 使一个字符串的第一个字符小写

sprintf — Return a formatted string 格式化 不输出 返回

strrpos — 计算指定字符串在目标字符串中最后一次出现的位置

strpos — 计算指定字符串在目标字符串中第一次出现的位置

ucfirst — 将字符串的首字母转换为大写

ucwords — 将字符串中每个单词的首字母转换为大写

strtolower — 将字符串转化为小写


strtoupper — 将字符串转化为大写