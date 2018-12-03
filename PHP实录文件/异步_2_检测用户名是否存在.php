<?php

	$name = strtolower(trim($_GET['name']));
	
	$exists = array("admin","xiaoge","xiaoning","kxiaomei","fuck","admin1","admin888");
	
	if( in_array($name,$exists) ){
		echo "用户名已存在!";
	}else{
		echo " ";
	}

?>
