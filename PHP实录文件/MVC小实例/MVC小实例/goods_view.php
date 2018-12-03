<?php
	
	header("Content-type:text/html;charset=utf-8");
	$db = include "goods_db.php";
	$id = 0;
	foreach($db as $value){
		$id++;
			
		echo $id.":<a href='view.php?id=$id' >".$value["goods_name"]."</a><br/>";
	}
	
?>
