<?php
require_once('../../connect.php');
$id = $_GET['id'];
var_dump($id);
$sql="DELETE FROM article WHERE id=$id";
//执行查询语句
$query=mysqli_query($conn,$sql);
if($query)
{
//跳转页面
    header("location:list.php");  //删除成功，则跳转回显示页面
}
else
{
    echo "删除失败！";
}