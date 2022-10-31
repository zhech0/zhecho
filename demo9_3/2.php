<?php 
header('Content-type:image/jpeg');
$img=imagecreatefromjpeg('images/zcx.jpg');
$waterMark=imagecreatefromgif('images/watermark1.gif');
$color=imagecolorallocate($img,255,255,255);

$width=imagesx($img);
$height=imagesy($img);

$waterMarkWidth=imagesx($waterMark);
$waterMarkHeight=imagesy($waterMark);

$position=imagettfbbox(20,0,'font/china1.TTF','小刚/周传雄');
$stringWidth=$position[2]-$position[0];
//文字水印
//imagettftext($img,20,0,$width-1-$stringWidth-($width/30),$height-1-($height/30), $color,'font/china1.TTF','小刚/周传雄');

/*
imagecopymerge($img,$waterMark,100,100,0,0,$waterMarkWidth,$waterMarkHeight,0);
参数说明：
$img:目标图像资源
$waterMark:水印的图像资源
100:所要拷贝到目标图像资源上面的坐标(x轴位置)
100:所要拷贝到目标图像资源上面的坐标(y轴位置)
0:从水印的图像资源的x坐标为0的位置开始拷贝
0:从水印的图像资源的y坐标为0的位置开始拷贝
$waterMarkWidth:所要拷贝的水印图像的长度
$waterMarkHeight:所要拷贝的水印图像的高度
0:表示透明度,数值越小就越透明，最大值100相当于和imagecopy这个函数一样

*/

imagecopymerge($img,$waterMark,$width-1-$waterMarkWidth,$height-1-$waterMarkHeight,0,0,$waterMarkWidth,$waterMarkHeight,30);

imagejpeg($img);
imagedestroy($img);
?>