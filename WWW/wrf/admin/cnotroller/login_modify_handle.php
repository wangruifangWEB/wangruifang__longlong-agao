<?php

session_start();//首先要启动session
header("content-type:text/html;charset=utf-8");
//连接数据库
$link=require_once("../../connect.php");
if (!$link) {
    die("连接失败: " . mysqli_connect_error());
}
$id = $_POST['id'];
$mpass=$_POST['mpass'];
$newpass=$_POST['newpass'];
$renewpass=$_POST['renewpass'];
$dbpassword=null;



if( $mpass == "" || $newpass == "" || $renewpass == "")
    {
        echo "请确认信息完整性";
    }else {

        if ($newpass != $renewpass) {
            echo "两次输入的密码不一致,请重新输入！" . "<br/><br/>";
            echo "<a href='pass.php'>重新输入</a>";
        } else {
            $SQL = "select * from userlogin order by id desc";
            $query = mysqli_query($conn, $SQL);

            if (!$query) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            while($row = mysqli_fetch_array($query)){
                $dbpassword=$row["password"];
            }


            if (!$query) {
                echo "查询原密码失败！";
            } else {
                 if ($mpass != $dbpassword) {
                    echo "原密码输入有误！";
                } else {
                    $sql = "update article set  password='$newpass' where id=$id";
                    $result = mysqli_query($link, $sql);
                    if (!$result) {
                        echo "密码修改失败！" . "<br/><br/>";
                        echo "<a href='pass.php'>返回</a>";
                    } else {
                        echo "密码修改成功!" . "<br/><br/>";
                        echo "<a href='login.php'>立刻登录</a>";
                    }
                }
            }
    }
}
//
//if(mysqli_query($conn,$sql)){
//
//}


