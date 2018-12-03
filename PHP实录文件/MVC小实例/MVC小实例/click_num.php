<?php
	
	$db = include "goods_db.php";

	$id = $_GET['id'];

	$db[$id]["click_num"] = $db[$id]["click_num"]+1;
	echo "document.write(".$db[$id]["click_num"].")";
	
	
	file_put_contents("goods_db.php","<?php \n return ".var_export($db,true)."\n?>")
?>
