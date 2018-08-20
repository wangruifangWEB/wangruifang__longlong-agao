<?php
header('Content-Type: text/html; charset=utf-8');
require_once("../../connect.php");
//把传递过来的信息入库,在入库之前对所有的信息进行校验。
if(!(isset($_POST['cate_name'])&&(!empty($_POST['cate_name'])))){
    echo "<script>alert('分类名称不能为空');history.go(-1);</script>";
}

//$id=$_POST['id'];
//$pid = $_POST['pid'];
$cate_name = $_POST['cate_name'];
$sort = $_POST['sort'];

$insertsql = "insert into cate(id, pid, cate_name, sort) values('', '','$cate_name','$sort')";
//    	echo $insertsql;
//    	exit;

if(mysqli_query($conn,$insertsql)){
//    echo "<script>alert('添加分类成功！');</script>";
    header('location: '.$_SERVER['HTTP_REFERER']);
}else{
    echo "<script>alert('添加分类失败！');history.go(-1);</script>";
}
