<?php
	header("Content-type:text/html;charset=utf-8");
	$context = file_get_contents("http://programmer.csdn.net/");
	//echo $context;
	
	
	//<img src="http://img.ptcms.csdn.net/article/201504/21/5535f04049c93_thumb.jpg" alt="">
	
	$preg = '/<img src=\"(.*?)\" alt=\"\" \/?>/i';
	
	$data = preg_match_all($preg,$context,$img);
	
	
	echo "<pre>";
	print_r($img);
	
	/* 下载图片代码区块
	 * 
	$imgUrlArr = $img[1];
	$id = 0;
	foreach($imgUrlArr as $value){
		$id++;
		file_put_contents("./img/".$id.".jpg",file_get_contents($value));
	}
	* */
?>
