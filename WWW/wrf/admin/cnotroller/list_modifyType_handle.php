<?php
header('Content-Type: text/html; charset=utf-8');
require_once("../../connect.php");

$id = isset($_GET["id"])?$_GET["id"]:"";
$sortName = isset($_POST["sortName"])?$_POST["sortName"]:"";

$sql = "select id,sortName from article where id = '$id'";
$query = mysqli_query($conn,$sql);

if($query)
{
    echo "修改类目成功！";
}
else
{
    echo "修改类目失败！";
}