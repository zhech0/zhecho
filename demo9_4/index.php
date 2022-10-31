<?php
/*
等比例缩放
*/
header('Content-type:image/jpeg');
$width=300;


$img=imagecreatefromjpeg('images/zcx.jpg');


$imgWidth=imagesx($img);
$imgHeight=imagesy($img);

$height=$width/($imgWidth/$imgHeight);
$img1=imagecreatetruecolor($width,$height);
/*
imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h)
参数说明：
$dst_image:目标图像资源
$src_image:源图像资源（你要采样的那个图像资源）
$dst_x:
$dst_y:与上面的$dst_x确定了一个坐标,把采样到的部分 放到目标图像资源的什么位置
$src_x:
$src_y:与上面的$src_y确定了一个坐标,你要采样的原图像资源的 某个部分的起始坐标
$dst_w:
$dst_h:与上面的$dst_w确定了 放到目标图像资源上面的尺寸
$src_w:
$src_h:与上面的$src_w确定了 采样原图像资源的 某个部分

*/
imagecopyresampled($img1,$img,0,0,0,0,$width,$height,$imgWidth,$imgHeight);
//裁剪
//imagecopyresampled($img1,$img,0,0,0,0,100,100,100,100);
if(imagejpeg($img1)){
	imagejpeg($img1,'images/zoom_zcx.jpg');
}
imagedestroy($img);
imagedestroy($img1);


