<?php
	header("Content-type:image/jpeg");
	$res = imagecreatetruecolor(500,500);
	$color = imagecolorallocate($res,255,0,0);
	imageline($res,250,0,500,250,$color);
	imageline($res,0,250,250,0,$color);
	imageline($res,0,250,500,250,$color);
	imagejpeg($res);
?>
