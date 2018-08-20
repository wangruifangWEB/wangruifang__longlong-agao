<?php

session_start();//首先要启动session
header('Content-Type: text/html; charset=utf-8');
//连接数据库
$link=require_once("../../connect.php");
$username=$_POST['username'];
$pwd=$_POST['password'];

if (!$link) {
    die("连接失败: " . mysqli_connect_error());
}

if(isset($_POST)){
    //用户名不能为空
    if(!$_POST['username']){
        echo('用户名不能为空');
        return;
    }
    //密码不能为空
    if(!$_POST['password']){
        echo('密码不能为空');
        return;
    }
    //判断验证码是否填写并且是否正确
    if(!$_POST['code']){
        echo('验证码不能为空');
        return;
    }else if($_POST['code']!=$_SESSION['VCODE']){
        echo('验证码不正确');
        return;
    }
    $sql="select username,password from userlogin where username = '{$_POST['username']}' and password='{$_POST['password']}'";
    $rs=mysqli_query($conn,$sql); //执行sql查询
    $row=mysqli_fetch_assoc($rs);
    if($row) { // 用户存在；
        if ($username == $row['username'] && $pwd == $row['password']) { //对密码进行判断。
            echo "登陆成功，正在为你跳转至后台页面";
            header("location:index.html");
        }
    }else{
        echo "账号或密码错误" . "<br/>";
        echo "<a href='login.html'>返回登陆页面</a>";
    }
}