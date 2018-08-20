<?php
    header("content-type:text/html;charset=utf-8");         //设置编码
    $servername = "localhost";
    $username = "root";
    $password = "root";

    // 创建连接
    $conn = new mysqli($servername, $username, $password);

    if(mysqli_errno($conn)){
        echo mysqli_errno($conn);
        exit;
    }
    mysqli_select_db($conn,"articledb");
    mysqli_set_charset($conn,'utf8');

//    echo "连接成功";
?>