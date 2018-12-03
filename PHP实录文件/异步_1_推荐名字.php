<?php

	error_reporting(0);
	$name = strtolower($_GET['name']);
	
	if(strlen($name) > 1){
		echo 'not find!';exit;
	}
	
	$result = array();
	
	$all_name = array("aHax","aJCa","aIsasd","Sscz","Qas");
	
	foreach($all_name as $value){
			if($name[0] == $value[0]){
				$result[] = $value;
			}
	}
	
	foreach($result as $value){
		echo $value.",";
	}
?>
