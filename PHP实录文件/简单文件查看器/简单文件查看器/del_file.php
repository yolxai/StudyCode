<?php
	
	include "functions.php";
	charset();
	
	$file = isset($_GET['file'])?$_GET['file']:false;
	
	if($file === false){echo "非法访问！";exit;}
	if(!file_exists($file)){echo "文件或目录不存在!";exit;}
	
	if(is_file($file)){
			if(unlink($file)){
				echo "<script>alert('删除成功!');window.location='index.php';</script>";
			}else{
				echo "<script>alert('删除失败!');window.location='index.php';</script>";
			}
	}else{
		if(delete_dir($file)){
				echo "<script>alert('删除成功!');window.location='index.php';</script>";
			}else{
				echo "<script>alert('删除失败!');window.location='index.php';</script>";
			}
	}
?>
