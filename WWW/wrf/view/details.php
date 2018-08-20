<?php
require_once("../connect.php");
$id=$_GET['id'];
//var_dump($id);
$SQL="SELECT * FROM article WHERE id=$id";
$query = mysqli_query($conn,$SQL);
$data = mysqli_fetch_assoc($query);
//var_dump($data);
?>
<!--加载公共头部-->
<?php include 'inc/header.php' ?>
		<section class="content-wrap">
			<div class="container">
				<div class="row">
					<main class="col-md-8 main-content">
						<article class="post">
							<header class="post-head">
								<h1 class="post-title"><?php echo $data['title'];?></h1>
								<section class="post-meta">
									<span class="author">作者：<a href="http://lvwenhan.com" target="_blank"><?php echo $data['author'];?></a></span> •
									<time class="post-date" ><?php echo date('Y-m-d H:i:s', $data['dateline']);?></time>
								</section>
							</header>
                            <section>
                                <?php echo html_entity_decode($data['content']);?>
                            </section>
							<section class="featured-media">
								<img src="http://localhost/wrf/admin/cnotroller/<?php echo $data['imgSrc']; ?>" alt="<?php echo $data['title']; ?>" />
							</section>
							<footer class="post-footer clearfix"></footer>
						</article>
						<div class="about-author clearfix">
							<div class="details">
								<div class="author">
									关于作者
									<a href=""><?php echo $data['author'];?></a>
								</div>
								<div class="meta-info">
									<span class="loaction"><i class="fa fa-home"></i>Beijing</span>
									<span class="website"><i class="fa fa-globe"></i><a href="https://github.com/wangruifangWEB" targer="_blank">github</a></span>
								</div>
								<div class="bio">
									爱着自己本职业的某人
								</div>
							</div>
						</div>

					</main>
					<aside class="col-md-4 sidebar">
						<div class="widget">
							<h4 class="title">社区</h4>
							<div class="content community">
								<p>segmentfault</p>
								<p>
									<a href="https://segmentfault.com/u/wangruifang" title="segmentfault社区" target="_blank" onclick="_hmt.push(['_trackEvent', 'big-button', 'click', '问答社区'])"><i class="fa fa-comments"></i> 问答社区</a>
								</p>
							</div>
						</div>
						<div class="widget">
							<h4 class="title">文档</h4>
							<a href="https://docs.golaravel.com/docs/5.6/" class="btn btn-default btn-block" target="_blank">5.6 文档</a>
							<a href="https://docs.golaravel.com/docs/5.5/" class="btn btn-default btn-block" target="_blank">5.5 文档</a>
						</div>
					</aside>
				</div>
			</div>
		</section>
    <!--加载公共底部-->
<?php include 'inc/footer.php' ?>