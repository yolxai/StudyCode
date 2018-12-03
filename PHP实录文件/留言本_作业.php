<html>
<head>
	<meta charset="utf-8"/>
	<title>留言本</title>
	<script>
		function onCheck(){
			if(userSend.title.value == ''){
				alert('请输入用户名!');
				return false;
			}
			if(userSend.context.value == ''){
				alert('请输入密码!');
				return false;
			}
		}
	</script>
</head>

<body>
	<form name="userSend" action="" method="post">
		标题:<input type="text" name="title" value="" /><br/>
		内容:<textarea name="context" style="resize:none"></textarea><br/>
		<input type="submit" name="submit" value="提交留言" onclick="onCheck()"/>
	</form>
</body>
</html>
<?php
	
	if(isset($_POST['submit'])){
		$date = date('Y-m-d H:i:s');
		if($_POST['title'] && $_POST['context']){
			$_POST['time'] = $date;
			print_r($_POST);
		}
	}

?>
