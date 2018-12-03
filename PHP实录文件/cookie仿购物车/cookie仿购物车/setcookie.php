<?php

	$title = $_POST['title'];
	$price = $_POST['price'];
	$smImg = $_POST['smImg'];
	
	setcookie('title',$title,time()+3600);
	setcookie('price',$price,time()+3600);
	setcookie('smImg',$smImg,time()+3600);
	$str = "<td><img class='img' width=50 height=50 src={$smImg} /></td><td><p>{$title}</p></td><td>{$price}</td>";
	$car_data = isset($_COOKIE['car_data'])?unserialize($_COOKIE['car_data']):array();
	$car_data[] = $str;
	setcookie('car_data',serialize($car_data),time()+3600);

?>
