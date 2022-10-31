<?php
header('Content-type:image/jpeg');
$img=imagecreatefromjpeg('images/zcx.jpg');
$color=imagecolorallocate($img,255,255,255);

$width=imagesx($img);
$height=imagesy($img);
$position=imagettfbbox(20,0,'font/china1.TTF','小刚/周传雄');
$stringWidth=$position[2]-$position[0];

imagettftext($img,20,0,$width-1-$stringWidth-($width/30),$height-1-($height/30), $color,'font/china1.TTF','小刚/周传雄');
imagejpeg($img);
imagedestroy($img);