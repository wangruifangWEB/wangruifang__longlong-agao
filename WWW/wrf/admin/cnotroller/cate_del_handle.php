<?php
require_once('../../connect.php');
$id = $_GET['id'];
var_dump($id);
$sql="DELETE FROM cate WHERE id=$id";
//执行查询语句
$query=mysqli_query($conn,$sql);
if($query)
{
//   echo "<script>alert('分类删除成功！');</script>";
    header('location: '.$_SERVER['HTTP_REFERER']);
}
else
{
    echo "<script>alert('分类删除失败！');</script>";
}