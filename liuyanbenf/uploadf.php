<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>liuyanben - mysql</title>
</head>
<body>
<h1>File liuyanben</h1>
<!--这里添加查看留言脚本即可-->


<form action="upload.php" method="post">
    <input type="text" name="content" />
    <input type="submit">
</form>


<?php
$handle = fopen('liuyan.txt', 'r') or die('cant read file');
$data = fgets($handle);
$arr = explode(',', $data);
foreach ($arr as $k => $v) {
    echo "{$v}\n";
}
?>


</body>
</html>