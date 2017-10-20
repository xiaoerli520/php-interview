<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 13:05
 * 文件留言本
 */
$content = isset($_POST['content']) ? $_POST['content'] : 'e';
if ($content === 'e') {
    die('content cannot be null');
}

// var_dump($content);
$handle = fopen('liuyan.txt', 'r+') or die('cant make or open file');

// 存储格式可以使用,进行隔开

$ori_content = fgets($handle);

$content = ",".$content;

$write = fwrite($handle, $content);



fclose($handle);


echo "<a href='uploadf.php'>go back</a>";





