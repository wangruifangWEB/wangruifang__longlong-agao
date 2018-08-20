<?php
    require_once("../../connect.php");
    //把传递过来的信息入库,在入库之前对所有的信息进行校验。
    if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
        echo "<script>alert('标题不能为空');history.go(-1);</script>";
    }
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
//    $img= $_POST['img'];
//    $sort= $_POST['sort'];
    $content = $_POST['content'];


    $insertsql = "insert into article(title, author,description, content) values('$title', '$author','$description',$content)";
    //	echo $insertsql;
    //
    //	exit;

    if(mysqli_query($conn,$insertsql)){
        echo "<script>alert('发布文章成功');window.location.href=adv_handle.phpcript>";
    }else{
        echo "<script>alert('发布失败');history.go(-1);</script>";
    }
