# OOP

一个合法类名以字母或下划线开头，后面跟着若干字母，数字或下划线。

以正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。

要创建一个类的实例，必须使用 new 关键字。

当把一个对象已经创建的实例赋给一个新变量时，新变量会访问同一个实例，

就和用该对象赋值一样。此行为和给函数传递入实例时一样。

可以用克隆给一个已创建的对象建立一个新实例。

PHP 5.3.0 引进了两个新方法来创建一个对象的实例：

```
<?php
class Test
{
    static public function getNew()
    {
        return new static;  // 通过return new 来进行创建
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);
?>
```

被继承的方法和属性可以通过用同样的名字重新声明被覆盖。

但是如果父类定义方法时使用了 final，则该方法不可被覆盖。

可以通过 parent:: 来访问被覆盖的方法或属性。


## 类的属性

在类的成员方法里面，可以用 ->（对象运算符）：$this->property（其中 property 是该属性名）这种方式来访问非静态属性。

静态属性则是用 ::（双冒号）：self::$property 来访问。

```
<?php
class SimpleClass
{
   // 错误的属性声明
   public $var1 = 'hello ' . 'world';
   public $var2 = <<<EOD
hello world
EOD;
   public $var3 = 1+2;
   public $var4 = self::myStaticMethod();
   public $var5 = $myVar;

   // 正确的属性声明
   public $var6 = myConstant;
   public $var7 = array(true, false);

   //在 PHP 5.3.0 及之后，下面的声明也正确
   public $var8 = <<<'EOD'
hello world
EOD;
}
?>
```




