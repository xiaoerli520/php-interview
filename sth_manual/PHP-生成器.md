# PHP 生成器

生成器提供了一种更容易的方法来实现简单的对象迭代，

相比较定义类实现 Iterator 接口的方式，性能开销和复杂性大大降低。

调用range的时候会在内存中占用空间

迭代是指反复执行一个过程，每执行一次叫做迭代一次。比如普通的遍历便是迭代

```
$arr = [1, 2, 3, 4, 5];

foreach($arr as $key => $value) {
    echo $key . ' => ' . $value . "\n";
}


```

这种方法的优点是显而易见的.它可以让你在处理大数据集合的时候不用一次性的加载到内存中.甚至你可以处理【无限大】的数据流.

xrange()函数提供了和PHP的内建函数range()一样的功能

但是不同的是range()函数返回的是一个包含值从1到100万0的数组(注：请查看手册).
 
而xrange()函数返回的是依次输出这些值的一个迭代器, 而【不会真正以数组形式】返回.

我们可以看到通过foreach对数组遍历并迭代输出其内容。

在foreach内部，每次迭代都会将当前的元素的值赋给$value并将数组的指针移动指向下一个元素为下一次迭代坐准备，从而实现顺序遍历。

像这样能够让外部的函数迭代自己内部数据的接口就是迭代器接口，对应的那个被迭代的自己就是迭代器对象。

PHP 统一迭代器接口

```
Iterator extends Traversable {

    // 返回当前的元素
    abstract public mixed current(void)
    // 返回当前元素的键
    abstract public scalar key(void)
    // 向下移动到下一个元素
    abstract public void next(void)
    // 返回到迭代器的第一个元素
    abstract public void rewind(void)
    // 检查当前位置是否有效
    abstract public boolean valid(void)
}
```


```
string(18) "MyIterator::rewind" 

string(17) "MyIterator::valid" string(19) 

"MyIterator::current" string(15) 

"MyIterator::key" 

int(0) 

string(5) "first" 

string(16) "MyIterator::next" 

string(17) "MyIterator::valid" 

string(19) "MyIterator::current" 

string(15) "MyIterator::key" 

int(1) 

string(6) "second" 

string(16) "MyIterator::next" 

string(17) "MyIterator::valid" 

string(19) "MyIterator::current" 

string(15) "MyIterator::key" 

int(2) 

string(5) "third" 

string(16) "MyIterator::next" 

string(17) "MyIterator::valid"
```

yield和生成器

相比较迭代器，生成器提供了一种更容易的方法来实现简单的对象迭代，性能开销和复杂性都大大降低。

```
生成器的实现函数

Generator implements Iterator {
    public mixed current(void)
    public mixed key(void)
    public void next(void)
    public void rewind(void)
    // 向生成器传入一个值
    public mixed send(mixed $value)
    public void throw(Exception $exception)
    public bool valid(void)
    // 序列化回调
    public void __wakeup(void)
}

```

例程

```
function printer() {
    $i = 1;
    while(true) {
        echo 'this is the yield ' . (yield $i) . "\n";
        $i++;
    }
}

$printer = printer();
var_dump($printer->send('first'));
var_dump($printer->send('second'));


this is the yield first
int(2)
this is the yield second
int(3)
```