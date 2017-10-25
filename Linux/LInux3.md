# Linux常用命令

```
/              根目录
├── bin     存放用户二进制文件
├── boot    存放内核引导配置文件
├── dev     存放设备文件
├── etc     存放系统配置文件
├── home    用户主目录
├── lib     动态共享库
├── lost+found  文件系统恢复时的恢复文件
├── media   可卸载存储介质挂载点
├── mnt     文件系统临时挂载点
├── opt     附加的应用程序包
├── proc    系统内存的映射目录，提供内核与进程信息
├── root    root 用户主目录
├── sbin    存放系统二进制文件
├── srv     存放服务相关数据
├── sys     sys 虚拟文件系统挂载点
├── tmp     存放临时文件
├── usr     存放用户应用程序
└── var     存放邮件、系统日志等变化文件
```


## ls
```
首先说 ls -l 和 ll的区别

前者和后者都是列出列表 然后 后者还可以ls -la 显示隐藏文件

ll 是ls -la的别名

ls -S是以文件大小进行排序
-R 列出目录所有子文件


ls -l * |grep "^-"|wc -l ---- 显示目录下文件数

ls -l * |grep "^d"|wc -l ----- 显示目录下目录数

ls -lh 文件容量更加易懂

grep  | 管道命令 Global Regular Expression Print

```

## grep  | 管道命令 Global Regular Expression Print

```
用于过滤/搜索的特定字符。可使用正则表达式能多种命令配合使用。

1.ps -ef|grep svn -c // 查找svn的个数 没有c的话就列表

2.cat test.txt | grep -nf test2.txt 从文件中读取关键字进行搜索

从test2.txt文件中读取关键词过滤test.txt
n参数：显示行号

3.grep 'linux' test.txt 从文件中显示关键词 还可以从多个文件中查找关键词 grep test1.txt test2.txt

4.cat test.txt |grep ^u 找出u开头的行内容

ex 输出非u开头的内容：cat test.txt |grep ^[^u]

5.输出以hat结尾的内容

cat test.txt |grep hat$

ex 显示包含ed或者at字符的内容行 cat test.txt |grep -E "ed|at"

```

## Find Locate whereis 查找

```
find 用于在目录以及子目录下搜索文件

find  [指定查找目录]  [查找规则]  [查找完后执行的action]

也可以查找多个目录 空格隔开
 
查找规则

-i 不区分大小写

find /etc/ -iname "guoqingz?" ?代表任意匹配的单个字符

find /etc/ -name "[gh]uoqingz?" [] 通配中括号里面的任何一个字符

-user -group 根据用户和组来查找文件

-uid -gid 根据用户id 以及组id来查找文件

find /etc/ -uid 500 -gid -5000


-atime 最近一次访问时间

-mtime 最近一次内容修改时间 通常

-ctime 最近一次属性修改时间

-size 根据大小查找文件

find /etc/ -size +2M -6M

-perm 根据文件权限查找

find /tmp -perm +222 755 -222

locate 搜索速度明显快于find 其搜索一个索引库

/usr/bin/updatedb   主要用来更新数据库，通过crontab自动完成的

新增的文件无法locate 需要先updatedb

```

## cp mv rm 

```
cp Copy

-a 带文件属性一起复制 如果是链接则复制链接 递归复制= -pdr

-p 将文件属性复制过去

-i 交互式复制 当文件存在的时候询问用户

-f 强制复制  不会询问用户

-d 若为链接则复制链接

-u 若目标比原件旧才更新目标文件

-l 建立硬连

-s 建立软连
```

### 硬链接和软连接的区别

```
软链接又称符号链接symbol link

硬链接有如下特点

文件有相同的 inode 及 data block；

只能对已存在的文件进行创建；

不能交叉文件系统进行硬链接的创建；

不能对目录进行创建，只可对文件创建； 而可以对目录建立软连接

删除一个硬链接文件并不影响其他有相同 inode 号的文件。

```

```
mv Move 

-i 覆盖提示
-f 强制覆盖
-u 只覆盖较新的版本
```

```
rm  Ulink 

-i 互动删除
-r 便利删除
-f 强制删除 

```

### PS 命令 

```
该命令用于将某个时间点的进程运行情况选取下来并输出，process之意，它的常用参数如下：


-A 将所有进程均显示出来
-a 不与terminal相关的进程
-u 有效用户的相关进程
-x 可以列出较为完整的信息 -aux
-l 较长 可以将进程PID列出

```





### 常用文章查阅

```
cat 从文章开头开始阅读
cat -n 对输出的所有行进行编号
cat -b 对输出的非空行编号


tac 从文章末尾开始阅读(cat反过来 很魔性)
查看大文件可以 cat file.txt | more进行翻页阅读
less more 可以翻页的
more 只可以向下翻页 less只能向上翻页
head 只看头几行  head -n file.txt
tail 只看末尾几行 tail -n file.txt

```

### 文件权限
```
chown 修改文件所有者
chmod 4777  注意这里是四位数
权限标志通过三个"位"来定义：
1.SETUID 使文件执行时具有文件所有者的权限
2.SETGID 该权限只对目录有效，目录在被设置该位后，任何用户在此目录下创建的文件都具有和该目录的组
3.Sticky bit 防删除位，[一个文件是否能够被删除，主要取决于文件所属的组是否具有写权限] 如果没有写权限 就无法增删，如果想令其能增不可删 使用sticky BIT


SUID eg:/usr/bin/passwd 提权操作
SGID eg:/home/devOPS1/  统一群组 可用于开发统一权限
Sticky eg:/tmp  可写而不可删

那么如何操作？
1:
chmod u+s temp 增加SUID
chmod g+s temp 增加SGID
chmod o+s temp 增加Stricky BIT
2:采用八进制方式（其他的三位也是八进制方式 RWX）
增加一位位SUID SGID Stricky BIT

ls -ll后可以查看
rwsrw-r-- 表示有setuid标志
rwxrwsrw- 表示有setgid标志
rwxrw-rwt 表示有sticky标志

[如果本来在该位上有x，则这些特殊标志显示为小写字母 (s, s, t)。否则, 显示为大写字母 (S, S, T) ]

相关SUID可以令程序在执行的时候进行提权 比如修改密码，本来是root才能执行的，但是普通用户就可以直接修改密码
passwd

```

### 文件系统

```
df 估出文件系统整体磁盘使用量 通过innode节点进行估计
du 通过便利目录 查看目录文件大小 Disk Usage 不包含metadata元数据
```

### 其他的一些

```
touch 可以用来创建空文件

mv也可以用来重命名

交互模式乱码的问题 比如backspace的时候 会出现^|H 等乱码问题 按住Ctrl可以解决

```