<?php
	header("Content-type:text/html;charset=utf-8");
	
	if(!isset($_GET['file']) && !isset($_POST['file'])){echo "请通过正常方式访问!";exit;}
	
	if(isset($_GET['file'])){
			$file = $_GET['file'];
	}else if(isset($_POST['file'])){
			$file = $_POST['file'];
	}else{
			echo "请通过正常方式访问!";
			exit;
	}
	
	if(!file_exists($file)){echo "文件或目录不存在!";exit;}
	if(!is_file($file)){echo "不是一个文件";exit;}
	
	if(isset($_POST['submit']) && $_POST['text']){
		if(file_put_contents($file,$_POST['text'])){
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}
?>
<html>
<head>
<script>
	window.onload = function(){
			var oTxt = document.getElementById('txt1');
			oTxt.style.width = document.body.offsetWidth + 'px';
			oTxt.style.height = document.body.clientHeight - 100 + 'px';
	}
</script>
</head>

<body>
	
	<form action="edit_file.php" method="post">
		<input type="hidden" name="file" value="<?php echo $file; ?>"/>
		<textarea name="text" id="txt1"><?php echo file_get_contents($file);?>	</textarea>
		<input type="submit" name="submit" value="save"/>
	</form>
</body>
</html>
