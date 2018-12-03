<?php
	header("Content-type:text/html;charset=utf-8");
	$file = isset($_GET['file'])?$_GET['file']:false;
	
	if($file === false){echo "非法访问！";exit;}
	
	if(!is_file($file)){	echo "不是一个文件";exit;}

	if(pathinfo($file)['extension'] == 'php' || pathinfo($file)['extension'] == 'html'){
		highlight_string(file_get_contents($file));
	}else{
		header("location:".$file);
	}
	
	
?>
