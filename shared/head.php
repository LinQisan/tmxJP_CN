<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

    <title>STITERM</title>
</head>
<body>

<table width = "100%" border="1">
    <tr>
        <td>
            <a href = "index.php">检索语料</a>
        </td>
        <td>
            <a href = "insert.php">添加语料</a>
        </td>
        <td>
       <?php echo "欢迎语佬".$_SESSION["username"]."登录！";?>
        </td>
        <td>
            <a href = "logout.php">退出</a>
        </td>
    </tr>
</table>