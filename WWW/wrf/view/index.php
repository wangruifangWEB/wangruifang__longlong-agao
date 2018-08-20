<?php
//引入分页程序
require_once("../paging.php");
//取出列表页3条数据，存于数组$data中
if($info&&mysqli_num_rows($info)){
    while($row=mysqli_fetch_assoc($info)){
        $data[]=$row;
    }
}else{
    $data=array();
}
//取最新添加的6条编号、标题信息，存于数组$data_title
if($info_title&&mysqli_num_rows($info_title)){
    while($row_title=mysqli_fetch_assoc($info_title)){
        $data_title[]=$row_title;
    }
}else{
    $data_title=array();
}
?>
    <!--加载公共头部-->
   <?php include 'inc/header.php' ?>
		<section class="content-wrap">
			<div class="container">
				<div class="row">
					<main class="col-md-8 main-content">
						<!--内容模块区-->
                        <?php
                        //在$data不为空的情况下，通过foreach()将$data循环输出数来
                        if(!empty($data)){
                            foreach($data as $value){
                                ?>
                                <article class="post">
                                <div class="post-head">
                                    <h1 class="post-title"><a href="https://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/"><?php echo $value['title']; ?></a></h1>
                                    <div class="post-meta">
                                        <span class="author">发布人：<a href="http://wangruifang.cn/" target="_blank"><?php echo $value['author']; ?></a></span> •
                                        <time class="post-date"><?php echo date('Y-m-d H:i:s', $value['dateline']);?></time>
                                    </div>
                                </div>
                                <div class="featured-media">
                                    <a href="https://www.golaravel.com/post/2016-ban-laravel-xi-lie-ru-men-jiao-cheng-yi/"><img src="http://localhost/wrf/admin/cnotroller/<?php echo $value['imgSrc']; ?>" alt="关注作者" /></a>
                                    <span><?php echo $value['author']; ?></span>
                                </div>
                                <div class="post-content">
                                    <p></p>
                                    <p><?php echo $value['description'] ?></p>
                                </div>
                                <div class="post-permalink">
                                    <a href="details.php?id=<?php echo $value['id']; ?>" class="btn btn-default btn-lf">阅读全文</a>
                                </div>
                                <footer class="post-footer clearfix"></footer>
                                </article><?php
                            }
                        }
                        //初始化首页、上一页、下一页、末页的值，通过<a>标签进行跳转到当前页面，传入$page的值
                        $first=1;
                        $prev=$page-1;
                        $next=$page+1;
                        $last=$pagenum;
                        ?>
						<nav class="pagination" role="navigation">
                            <a class="older-posts" href="index.php?page=<?php echo $prev ?>" <?php if($page==1) echo "style=\"display:none\"" ; ?>><i class="fa fa-angle-left"></i></a>
							<span class="page-number">第 <?php echo $page ?> 页 / 共 <?php echo $pagenum ?> 页</span>
							<a class="older-posts" href="index.php?page=<?php echo $next ?>"><i class="fa fa-angle-right"></i></a>
						</nav>
					</main>
					<aside class="col-md-4 sidebar">
						<div class="widget">
							<h4 class="title">最近文章</h4>
                            <?php
                            //在$data不为空的情况下，通过foreach()将$data循环输出数来
                            if(!empty($data)){
                                foreach($data as $value){
                                    ?>
                                    <a href="details.php?id=<?php echo $value['id']; ?>" class="btn btn-default btn-block" target="_blank"><?php echo $value['title']; ?></a>
                                    <?php
                                }
                            }
                            ?>
						</div>
					</aside>
				</div>
			</div>
		</section>
        <!--加载公共底部-->
        <?php include 'inc/footer.php' ?>