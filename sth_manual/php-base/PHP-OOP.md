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

## 类的自动加载

```
 spl_autoload_register() 
```

自动加载不可用于 PHP 的 CLI 交互模式。

```
<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2();
?>
```

## 构造函数

如果子类中定义了构造函数则不会隐式调用其父类的构造函数。

要执行父类的构造函数，需要在子类的构造函数中调用 parent::__construct()

析构函数即使在使用 exit() 终止脚本运行时也会被调用。

在析构函数中调用 exit() 将会中止其余关闭操作的运行。

同一个类的对象即使不是同一个实例也可以互相访问对方的私有与受保护成员。

这是由于在这些对象的内部具体实现的细节都是已知的。

## 范围解析操作符 （::） 

范围解析操作符（也可称作 Paamayim Nekudotayim）或者更简单地说是一对冒号，可以用于访问静态成员，类常量，还可以用于覆盖类中的属性和方法。

## 静态关键字static

```
<?php
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


在外面调用的话需要:: 不能使用-> 
```

## PHP也是有抽象类的~

PHP 5 支持抽象类和抽象方法。定义为抽象的类不能被实例化。

任何一个类，如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。

被定义为抽象的方法只是声明了其调用方式（参数），不能定义其具体的功能实现。

继承一个抽象类的时候，子类必须定义父类中的【所有】抽象方法

另外，这些方法的访问控制必须和父类中一样（或者更为宽松）


```
<?php
abstract class AbstractClass
{
 // 强制要求子类定义这些方法
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // 普通方法（非抽象方法）
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}
```


## 对象接口

使用接口（interface），可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。

接口是通过 interface 关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的。

接口中定义的所有方法都必须是【公有】，这是接口的特性。

类中必须实现接口中定义的【所有】方法

否则会报一个致命错误

```
可扩充的接口

interface a
{
    public function foo();
}

interface b extends a
{
    public function baz(Baz $baz);
}

// 正确写法
class c implements b
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

虽然PHP是类单继承的 但是可以继承多个接口

interface a
{
    public function foo();
}

interface b
{
    public function bar();
}

interface c extends a, b
{
    public function baz();
}

class d implements c
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}
```


## trait

用于解决类的单继承的问题

```
trait ezcReflectionReturnInfo {
    function getReturnType() { /*1*/ }
    function getReturnDescription() { /*2*/ }
}

class ezcReflectionMethod extends ReflectionMethod {
    use ezcReflectionReturnInfo;
    /* ... */
}

class ezcReflectionFunction extends ReflectionFunction {
    use ezcReflectionReturnInfo;
    /* ... */
}
```

从基类继承的成员会被 trait 插入的成员所覆盖。

优先顺序是来自当前类的成员覆盖了 trait 的方法，而 trait 则覆盖了被继承的方法。


```
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

多继承实例
```

```
<?php
对应同名方法
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}
```

使用As语法还可以进行修改属性

```
<?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// 修改 sayHello 的访问控制
class MyClass1 {
    use HelloWorld { sayHello as protected; }
}

// 给方法一个改变了访问控制的别名
// 原版 sayHello 的访问控制则没有发生变化
class MyClass2 {
    use HelloWorld { sayHello as private myPrivateHello; }
}
?>
```


trait也可以进行相互继承 也可以是多继承

```
<?php
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World!';
    }
}

trait HelloWorld {
    use Hello, World;
}

class MyHelloWorld {
    use HelloWorld;
}

```

也有static 但是不同的地方使用不会是单初始化的状态

```
<?php
trait Counter {
    public function inc() {
        static $c = 0;
        $c = $c + 1;
        echo "$c\n";
    }
}

class C1 {
    use Counter;
}

class C2 {
    use Counter;
}

$o = new C1(); $o->inc(); // echo 1
$p = new C2(); $p->inc(); // echo 1
?>
```

trait也可以使用属性

## PHP7 匿名类

PHP匿名类可以创建【一次性】的简单对象


## PHP的重载

所有的重载方法都必须被声明为 public。

PHP所提供的"重载"（overloading）是指动态地"创建"类属性和方法。

是通过魔术方法（magic methods）来实现的。


## PHP可以进行对象的遍历

默认情况下，所有可见属性都将被用于遍历。

protected和private并不会被遍历

但是在属性内部调用对this的遍历之后 是可以进行遍历protected和private的遍历

## PHP __魔术方法


__sleep() 和 __wakeup()


serialize() 函数会检查类中是否存在一个魔术方法 __sleep()。如果存在，该方法会先被调用，然后才执行序列化操作。

unserialze() 会检查是否有wakeup 


当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。

laravel的单方法控制器


## final 关键字 

如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。

## 对象的&引用


PHP 的引用是别名，就是两个不同的变量名字指向相同的内容

```
<?php
class A {
    public $foo = 1;
}  

$a = new A;
$b = $a;     // $a ,$b都是同一个标识符的拷贝
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c ,$d是引用
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";

?>
```
