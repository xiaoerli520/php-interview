## 常量

可以使用define()定义常量 也可以使用const进行定义 后者为语言结构 执行速度更快

> const 只可以包含boolean int float string

PHP 在处理未定义的常量时，常量值为其本身的字符串

PHP魔术常量

```
__LINE__ // 文件中当前行号

__FILE__ // 文件的完整路径和文件名 4.0.2之前返回相对路径 后返回绝对路径

__DIR__ // 文件所在的目录 等价于dirname(__FILE__)

__FUNCTION__ // 函数名称 对trait也起作用

__TRAIT__ // 返回trait的名字

__METHOD__ __NAMESPACE__ 顾名思义
```

