<?php
header("Content-type:text/html;charset=utf-8");
$keys = "/枪支|弹药|卖淫|炮弹|黑客|刷钻/";
?>
<html>
<head>

</head>

<body>
	<form action="" method="post">
		<input type="text" value="" name="keys" />
		<input type="submit" name="submit" value="检测关键字是否非法"/>
	</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$value = $_POST['keys'];
		if($result = preg_match($keys,$value)){
			echo "字符串非法";
		}else{
			echo "无非法字符串";
		}
	}
?>
