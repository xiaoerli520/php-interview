# PHP 安全

由于 PHP 的文件系统操作是基于 C 语言的函数的，所以它可能会以您意想不到的方式处理 Null 字符。 

应用程序永远不要使用数据库所有者或超级用户帐号来连接数据库，因为这些帐号可以执行任意的操作，

# 引用计数  

在PHP中 一个变量的值可能是一个容器 其在PHP引擎中除了内还有

refcount is_ref两个字段来区别是否是引用 以及使用容器内容的变量个数

```
<?php
$a = "new string";
$b = $a;
xdebug_debug_zval( 'a' );
?>
解释COW机制
```

当考虑像 array和object这样的复合类型时，事情就稍微有点复杂. 与 标量(scalar)类型的值不同，array和 object类型的变量把它们的成员或属性存在自己的符号表中。

这意味着下面的例子将生成三个zval变量容器。

```
<?php
$a = array( 'meaning' => 'life', 'number' => 42 );
xdebug_debug_zval( 'a' );
?>

a: (refcount=1, is_ref=0)=array (
   'meaning' => (refcount=1, is_ref=0)='life',
   'number' => (refcount=1, is_ref=0)=42
)
```

```
<?php
$a = array( 'one' );
$a[] =& $a;
xdebug_debug_zval( 'a' );
?>

a: (refcount=2, is_ref=1)=array (
   0 => (refcount=1, is_ref=0)='one',
   1 => (refcount=2, is_ref=1)=...
)

...代表指向了原始数组
```

垃圾回收机制会节约内存 但是会增加少许运行时间

