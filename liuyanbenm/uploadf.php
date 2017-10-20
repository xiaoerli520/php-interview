<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>liuyanben - mysql</title>
</head>
<body>
    <h1>mysql liuyanben</h1>
    <!--这里添加查看留言脚本即可-->


    <form action="upload.php" method="post">
        <input type="text" name="content" />
        <input type="submit">
    </form>

    <?php
        // 进行已经留言过的显示
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = 'root';
        $db_name = 'liuyanben';

        $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
        if (mysqli_connect_error()) {
            echo mysqli_connect_error();
        }
        $mysqli -> set_charset('utf8');

        // $mysqli_stmt = $mysqli -> prepare('SELECT * FROM liuyan');

        // $res = $mysqli_stmt -> execute();

        // var_dump($mysqli_stmt -> fetch());

        $sql = 'SELECT * FROM liuyan';

        $res = $mysqli -> query($sql);
        $res_arr = $res -> fetch_all();
        var_dump($res_arr);
    ?>

</body>
</html>