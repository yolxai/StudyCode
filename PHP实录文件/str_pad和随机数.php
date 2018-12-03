<script>
	setInterval(function(){
			window.location.reload();
	},2000);
</script>
<?php
	header("Content-type:text/html;charset=utf-8");
	$userArr = array(
		array(
				"name"=>"lisi",
				"age"=>16,
				"phone"=>15078315426
		),array(
				"name"=>"wangwu",
				"age"=>17,
				"phone"=>15078314164
		),array(
				"name"=>"zhaoliu",
				"age"=>19,
				"phone"=>15078765426
		)
	);
	
	$prize = array("iphone4s","iphone6s","xiaomi2s","三星盖世","ipad");
	
	$pIndex = mt_rand(0,count($prize)-1);
	$index = mt_rand(0,count($userArr)-1);

?>

<h3>恭喜名字为<font color="red"><?php echo $userArr[$index]["name"] ?></font>的用户获得<font color="red"><?php echo $prize[$pIndex] ?></font>,手机号为:<?php echo substr($userArr[$index]["phone"],0,-4)."****" ?></h3>
