<?php

	// 不区分大小写的 array_key_exists();
	
	$array = array(
		"id"=>1,
		"name"=>"xiaoGe",
		"age"=>17,
		"sex"=>"man"
	);
	echo "<pre>";
	
	// var_dump(array_key_exists("NAME",$array) );
	var_dump(array_key_exists_i("name",$array));
	function array_key_exists_i($k,$arr){
		
		if(!is_array($arr))return false;
		
		$_k = strtoupper($k); //把需要验证的键值转换为 大写
		
		foreach($arr as $key=>$value){ 
			
			$_key = strtoupper($key);  //把目标数组的键值也 转换为 大写
			 
			if($_k == $_key){ //如果两个大写的键值相同 就返回true
				return true;
			}
			
		}
		return false; //整个过程都没有return true就return false
	}
?>
