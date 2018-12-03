<?php
	header("Content-type:text/html;charset=utf-8");
	$html = file_get_contents("正则_5_替换p标签内容.html");
	
	//$preg = '/<p>.*?<\/p>/is'; //i不区分大小写 s不区分换行(.是除换行之外的字符，加上s就匹配所有的内容)	
	// $result = preg_match($preg,$html,$resultArr); //已经匹配到p标签
	//print_r($resultArr);
	
	$preg = '/<p>(.*)<\/p>/is';
	$result = preg_replace($preg,'<p style="background:red;color:black">\1</p>',$html);
	
	echo $result;
?>
