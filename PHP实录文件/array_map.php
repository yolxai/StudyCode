<?php
	
	$arr = array(
		array(
			"name" => "lisi",
			"age" => 17
		),
		array(
			"name" => "wangwu",
			"age" =>18
		)
	);
	
	function fun1($v){
		$v["age"]+=10;
		return $v;
	}
	
	$newArray = array_map("fun1",$arr);
	
	echo "<pre>";
	print_r($newArray);


?>
