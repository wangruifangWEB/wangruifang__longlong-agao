<?php
//分页功能
//连接数据库
require_once("connect.php");
$page = isset($_GET['page'])?intval($_GET['page']):1;//设置当前页数，没有则设置为1
$num=3;//每页显示3条数据
/*
首先我们要获取数据库中到底有多少数据，才能判断具体要分多少页，总页数 具体的公式就是
总数据数 除以 每页显示的条数，有余进一 。
也就是说10/3=3.3333=4 有余数就要进一。
*/
$sql="select * from article";
$result=mysqli_query($conn,$sql);
$total=mysqli_num_rows($result);//查询数据的总条数
$pagenum=ceil($total/$num);//获得总页数
//假如传入的页数参数page 大于总页数 pagenum，则显示错误信息
if($page>$pagenum || $page == 0){
    echo "<script>alert('没有内容了');history.go(-1);</script>";
    exit;
}
$offset=($page-1)*$num;
/* 获取limit的第一个参数的值 offset ，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。             (传入的页数-1) * 每页的数据 得到limit第一个参数的值*/
$sql="select * from article limit $offset,$num ";
$info=mysqli_query($conn,$sql);   //获取相应页数所需要显示的数据
//获取最新添加的前六条数据
$sql_new="select  id,title from article order by dateline desc limit 0,6 ";
$info_title=mysqli_query($conn,$sql_new);
?>