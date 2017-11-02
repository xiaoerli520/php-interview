# 缓存控制

```
<?php

ob_start();
echo "Hello\n";

setcookie("cookiename", "cookiedata");

ob_end_flush();

?>
echo函数的输出将一直被保存在输出缓冲区中直到调用 ob_end_flush() 。同时，对setcookie()的调用也成功存储了一个cookie,而不会引起错误
```

```
EG

flush — 刷新输出缓冲
ob_clean — 清空（擦掉）输出缓冲区
ob_end_clean — 清空（擦除）缓冲区并关闭输出缓冲
ob_end_flush — 冲刷出（送出）输出缓冲区内容并关闭缓冲
ob_flush — 冲刷出（送出）输出缓冲区中的内容
ob_get_clean — 得到当前缓冲区的内容并删除当前输出缓。
ob_get_contents — 返回输出缓冲区的内容
ob_get_flush — 刷出（送出）缓冲区内容，以字符串形式返回内容，并关闭输出缓冲区。
ob_get_length — 返回输出缓冲区内容的长度
ob_get_level — 返回输出缓冲机制的嵌套级别
ob_get_status — 得到所有输出缓冲区的状态
ob_gzhandler — 在ob_start中使用的用来压缩输出缓冲区中内容的回调函数。ob_start callback function to gzip output buffer
ob_implicit_flush — 打开/关闭绝对刷送
ob_list_handlers — 列出所有使用中的输出处理程序。
ob_start — 打开输出控制缓冲
output_add_rewrite_var — 添加URL重写器的值（Add URL rewriter values）
output_reset_rewrite_vars — 重设URL重写器的值（Reset URL rewriter values）

```

类似的 相应的框架render基本就是使用这个方法加上extract进行传惨改变

```
function render_template($request,$data_ext) //增加给模板传递的数据
{
    ob_start();
    $tpl_data = $request -> attributes -> all();
    $tpl_data['data'] = $data_ext;
    extract($tpl_data, EXTR_SKIP); // 数组K改为变量名字
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);
    return new Response(ob_get_clean());
}
```

