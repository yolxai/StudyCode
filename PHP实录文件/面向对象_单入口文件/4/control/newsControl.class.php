<?php

	class newsControl extends Control{
		
		function index(){ // [ news control -> index() ] -> default 显示首页
			$this->display("index.html");
		}
		
		function addshow(){ //[ news control -> addshow() ] -> 显示发表文章页面
			$this->display("addshow.html");
		}
		
		function add(){ //[ news control -> addshow() ] -> 发表文章处理
			
				//添加文章到config/db.php
				$db = include 'db.php';//包含配置文件
				$db[] = $_POST;
				if(file_put_contents("db.php","<?php \n return ".var_export($db,true)."\n ?>")){
					echo "<script>alert('成功发表文章!');</script>";
				}else{
					echo "<script>alert('发表文章失败!');</script>";
				}
				
				echo "<script>location.href='index.php'</script>";
				
			
		}
		
		
	}

?>
