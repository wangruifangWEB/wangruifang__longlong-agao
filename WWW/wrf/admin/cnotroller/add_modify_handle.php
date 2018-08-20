<?php
require_once('../../connect.php');
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$dateline =  time();

//头像上传
$uImg1=$_FILES["fileField"];
//    print_r($uImg1);
//    print_r($uImg1[name]);
$ext1=explode(".", $uImg1["name"]);
$extName1=end($ext1);
if($extName1!="jpg"&&$extName1!="gif"&&$extName1!="png"){
    echo "文件错误<a href='index.php'>返回</a><br/>";
    exit;
}
if($uImg1["size"]>5000000){
    echo "照片太大了<a href'index.php'>返回</a><br/>";
    exit;
}
$dir1="images/head/";
@$fileName1=time().rand(10000.99999).".".$extName1;
@$times1=date("Y-m-d H:i:s", time()) ;
$Url1=$dir1.$fileName1;
echo "头像上传成功";
move_uploaded_file($uImg1["tmp_name"],$Url1);

$sql = "update article set title='$title',author='$author',description='$description',content='$content',dateline=$dateline,imgSrc='$Url1' where id=$id";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('修改文章成功');window.location.href='list.php';</script>";
}else{
    echo "<script>alert('修改文章失败');window.location.href='list.php';</script>";
}
?>