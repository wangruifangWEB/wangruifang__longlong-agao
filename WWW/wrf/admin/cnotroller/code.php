<?php
session_start();//首先要启动session
Header("Content-type:image/PNG"); // 告诉浏览器当前文件产生的结果以png形式进行输出
$im = imagecreate(150,45);
$back = imagecolorallocate($im, 245, 245, 245);
imagefill($im, 0,0, $back);
$vcodes = "";
for($i = 0; $i < 4; $i++){
    $font = imagecolorallocate($im, rand(100, 255), rand(0, 100), rand(100, 255));
    $authnum = rand(0, 9);
    $vcodes .= $authnum;
    imagestring($im, 5, 50 + $i * 10, 20, $authnum, $font);
}
$_SESSION['VCODE'] = $vcodes;
for($i=0;$i<200;$i++) {
    $randcolor = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($im, rand()%150, rand()%150, $randcolor); //
}
imagepng($im);
imagedestroy($im);