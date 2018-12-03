<?php
	header("Content-type:text/html;charset=utf-8");
	$html = file_get_contents("functions.php");
	
	$preg = '/\/\/(.*)\s?/';
	// preg_match_all($preg,$html,$arr); 查找到所有的 单行注释
	
	$html = preg_replace($preg,"",$html); //去除所有 单行注释
	
	echo $html;
?>
