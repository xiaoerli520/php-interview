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
$handle = fopen('liuyan.txt', 'w+') or die('cant make or open file');

$content = readfile('liuyan.txt');

var_dump($content);

