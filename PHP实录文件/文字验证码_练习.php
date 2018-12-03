<?php
	$str = "abcdefghijklmnopqrstuvwxyz123456789";
	
	$result = '';
	for($i=0;$i<4;$i++){
		$num = mt_rand(0,strlen($str)-1);
		$result .= $str[$num];
	}
	$result = strtoupper($result);
	
	echo $result;
?>
