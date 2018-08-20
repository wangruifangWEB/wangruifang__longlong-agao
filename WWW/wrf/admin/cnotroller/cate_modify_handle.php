<?php
header('Content-Type: text/html; charset=utf-8');
require_once("../../connect.php");
//把传递过来的信息入库,在入库之前对所有的信息进行校验。
if(!(isset($_POST['cate_name'])&&(!empty($_POST['cate_name'])))){
    echo "<script>alert('分类名称不能为空');history.go(-1);</script>";
}

$id=$_POST['id'];
//$pid = $_POST['pid'];
$cate_name = $_POST['cate_name'];
$sort = $_POST['sort'];

$sql = "update cate set cate_name='$cate_name',sort='$sort' where id=$id";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('修改分类成功');window.location.href='cate.php';</script>";
}else{
    echo "<script>alert('修改分类失败');history.go(-1);</script>";
}