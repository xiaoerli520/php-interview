# PHP 预定义变量

这些超全局变量是：

$GLOBALS

$_SERVER

```
PHP_SELF // 当前脚本文件名

在地址为 http://example.com/foo/bar.php 的脚本中使用 $_SERVER['PHP_SELF'] 将得到 /foo/bar.php
'GATEWAY_INTERFACE'
服务器使用的 CGI 规范的版本；例如，“CGI/1.1”。
'SERVER_ADDR'
当前运行脚本所在的服务器的 IP 地址。
'SERVER_NAME'
当前运行脚本所在的服务器的主机名。如果脚本运行于虚拟主机中，该名称是由那个虚拟主机所设置的值决定。

SERVER_SOFTWARE'
服务器标识字符串，在响应请求时的头信息中给出。
'SERVER_PROTOCOL'
请求页面时通信协议的名称和版本。例如，“HTTP/1.0”。
'REQUEST_METHOD'
访问页面使用的请求方法；例如，“GET”, “HEAD”，“POST”，“PUT”。

'REQUEST_TIME'
请求开始时的时间戳。从 PHP 5.1.0 起可用。
'REQUEST_TIME_FLOAT'
请求开始时的时间戳，微秒级别的精准度。 自 PHP 5.4.0 开始生效。
'QUERY_STRING'
query string（查询字符串），如果有的话，通过它进行页面访问。
'DOCUMENT_ROOT'
当前运行脚本所在的文档根目录。在服务器配置文件中定义。

'HTTP_ACCEPT'
当前请求头中 Accept: 项的内容，如果存在的话。
'HTTP_ACCEPT_CHARSET'
当前请求头中 Accept-Charset: 项的内容，如果存在的话。例如：“iso-8859-1,*,utf-8”。
'HTTP_ACCEPT_ENCODING'
当前请求头中 Accept-Encoding: 项的内容，如果存在的话。例如：“gzip”。
'HTTP_ACCEPT_LANGUAGE'
当前请求头中 Accept-Language: 项的内容，如果存在的话。例如：“en”。
'HTTP_CONNECTION'
当前请求头中 Connection: 项的内容，如果存在的话。例如：“Keep-Alive”。
'HTTP_HOST'
当前请求头中 Host: 项的内容，如果存在的话。
'HTTP_REFERER'
引导用户代理到当前页的前一页的地址（如果存在）。由 user agent 设置决定。并不是所有的用户代理都会设置该项，有的还提供了修改 HTTP_REFERER 的功能。简言之，该值并不可信。
'HTTP_USER_AGENT'
当前请求头中 User-Agent: 项的内容，如果存在的话。该字符串表明了访问该页面的用户代理的信息。一个典型的例子是：Mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586)。除此之外，你可以通过 get_browser() 来使用该值，从而定制页面输出以便适应用户代理的性能。
'HTTPS'
如果脚本是通过 HTTPS 协议被访问，则被设为一个非空的值。
Note: 注意当使用 IIS 上的 ISAPI 方式时，如果不是通过 HTTPS 协议被访问，这个值将为 off。
'REMOTE_ADDR'
浏览当前页面的用户的 IP 地址。
'REMOTE_HOST'
浏览当前页面的用户的主机名。DNS 反向解析不依赖于用户的 REMOTE_ADDR。
```

$_GET

$_POST

$_FILES

$_COOKIE

$_SESSION

$_REQUEST

默认情况下包含了 $_GET，$_POST 和 $_COOKIE 的数组。

$_ENV

通过环境方式传递给当前脚本的变量的数组。

$php_errormsg
```
<?php
@strpos();
echo $php_errormsg;
?>
```


显示 前一个错误信息

$http_response_header — HTTP 响应头

$argc = 传递给脚本的参数数目

```
<?php
var_dump($argc);
?>
当使用这个命令执行: php script.php arg1 arg2 arg3

以上例程的输出类似于：

int(4)
```

$argv 传递给脚本的参数数组


