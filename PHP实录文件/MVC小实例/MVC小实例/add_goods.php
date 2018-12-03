<?php
header("Content-type:text/html;charset=utf-8");

$db_data = include "goods_db.php";
$POST["click_num"] = 1;
$db_data[] = $_POST;
$script = <<<str
	<script>
		setTimeout(function(){
			window.location = 'add_goods_view.php';
		},2000);
	</script>
str;
if( file_put_contents("goods_db.php","<?php \n return ".var_export($db_data,true)."\n?>") ){
		echo "Data insert sucssuc";
		echo $script;
}

?>
