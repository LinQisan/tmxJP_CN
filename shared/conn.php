<?php
    $dbhost = "localhost"; //数据库所在主机地址
    $dbuser = "root";//登录服务器所用的服务器用户名
    $dbpass = "root";//登录服务器所用的用户名密码
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass);

    //var_dump($conn)

    if(!$conn)
    {  
        die("无法连接服务器，错误代码为： " . mysqli_connect_error());  
      }
?>