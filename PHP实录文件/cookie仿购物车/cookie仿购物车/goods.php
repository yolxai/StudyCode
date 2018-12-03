<?php
	include "./template/goods_car.html";
	header("Content-type:text/html;charset=utf-8");
	$id = isset($_GET['id'])?$_GET['id']:false;
	if($id===false){echo "<script>alert('请通过正常的途径访问!');location.href='index.php'</script>";exit;}
	
	$goods_db = include "goods_db.php";
	
	$title = $goods_db[$id]['title'];
	$price = $goods_db[$id]['price'];
	$smImg = $goods_db[$id]['img'];
	$img = $goods_db[$id]['big_img'];
	
	include "./template/goods.html";
?>
