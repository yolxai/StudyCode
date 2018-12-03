<?php
header("Content-type:text/html;charset=utf-8");
?>
<html>
<head>
	<title>XSS过滤练习</title>
</head>

<body>
	<form action="" method="post" name="myForm">
		内容:<input type="text" name="username" value=""/><br/>
		<input type="submit" name="submit" value="提交留言" onclick="if(myForm.username.value == ''){alert('请输入内容!');return false;}">
	</form>
</body>

</html>

<?php
	if($_POST['submit']){
		$str = $_POST['username'];
		echo htmlspecialchars(strip_tags($str));
	}
?>
