<?php

	//将所有的键值统一转换为大写或小写 （array_change_key_case优化版）
	$array = array(
		"user"=>array(
			"admin"=>array(
				"id"=>1,
				"username"=>"admin",
				"age"=>17,
				"sex"=>"man"
			),
			"xiaoming"=>array(
				"id"=>2,
				"username"=>"xiaoming",
				"age"=>14,
				"sex"=>"man"
			),
			"xiaohong"=>array(
				"id"=>3,
				"username"=>"xiaohong",
				"age"=>16,
				"sex"=>"woman"
			)
		),
		"password"=>array(
			1=>"md5(admin888)",
			2=>"md5(xiaohong520)",
			3=>"md5(xiaoming520)"
		)
	);
	
	//print_r(array_change_key_case($array,1)); 只能改变最上层的键值
	echo "<pre>";
	print_r(array_change_key_case_d($array,1));
	
	function array_change_key_case_d($array,$action=0){
			if(!is_array($array) || count($array)<=0 )exit;
			$to = $action?"strtoupper":"strtolower";
			
			$new_array = array();
			
			foreach( $array as $key=>$value ){
				$_key = $to($key);
				$new_array[$_key] = is_array($value)?array_change_key_case_d($value,$action):$value;
			}
			
			return $new_array;
	
	}

?>
