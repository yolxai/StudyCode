<?php
	
	header("Content-type:text/html;charset=utf-8");
	
	if(empty($_GET['id'])){
		return false;
	}

	include "view_function.php";
	$db = include "goods_db.php";
	
	$id = $_GET['id']-1;
	
	
	
	assign("goods_name",$db[$id]["goods_name"]);
	assign("goods_price",$db[$id]["goods_price"]);
	assign("goods_id",$id);
	
	
	display("template.html");
	
	
	
?>
