<?php
/**
 * Created by PhpStorm.
 * User: GTX
 * Date: 2017/10/20
 * Time: 11:21
 * mysql方式留言本 - 留言上传脚本 尝试使用mysqli stmt 预处理脚本进行防治注入
 */
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'liuyanben';

// 面向对象链接方式
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}

$mysqli -> set_charset('utf8');
// 进行数据获取
$contents = isset($_POST['content']) ? $_POST['content'] : ' ';
$contents = htmlspecialchars($contents, ENT_QUOTES, 'UTF-8');
$created_at = time();

// var_dump($contents);

// 为防止sql注入 使用prepare进行防治

$mysqli_stmt = $mysqli -> prepare("INSERT INTO liuyan (contents, created_at) VALUES (?, ?)") or die($mysqli -> error);

$mysqli_stmt -> bind_param("si", $contents, $created_at); // 注意bind_param 第一个参数是绑定参数的类型

$res = $mysqli_stmt -> execute();

if ($res) {
    echo "add success";
    echo "<a href='uploadf.php'>go back</a>";
} else {
    echo "add fail";
}
$mysqli -> close();

// 进行数据留言插入
//$sql = "INSERT INTO liuyan (`contents`, `created_at`) VALUES ()"