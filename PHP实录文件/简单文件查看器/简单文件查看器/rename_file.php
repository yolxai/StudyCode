<?php
	include "functions.php";
	charset();
	
	$file = isset($_GET['file'])?$_GET['file']:false;
	
	if($file === false){echo "非法访问！";exit;}
	if(!file_exists($file)){echo "文件或目录不存在!";exit;}
	
	
?>
<html>

<head>
<script>
	function jun(local){
			window.location = local;
	}
	
	window.onload = function(){
			var oBtn = document.getElementById("btn");
			var oForm = document.getElementById("form1");
			
			oBtn.onclick = function(){
					if(form1.newName.value == ''){
						alert('请填写新的名字');
						return false;
					}
					
			}
	}
</script>
</head>

<body>
	<form id="form1" action="rename_file.php" name="form1" method="get">
		<input type="hidden" name="file" value="<?php echo $file; ?>"/>
		请输入新文件名:<input type="text" name="newName" value="" />
		<input type="submit" id="btn" name="submit" value="rename" />
		<input type="button" onclick="jun('index.php')" value="Cancel"/>
	</form>
</body>

</html>
<?php
	if(!isset($_GET['submit']))exit;
	
	$file = $_GET['file'];
	$newFile = $_GET['newName'];
	
	if(rename($file,$newFile)){
		echo "<script>alert('改名成功!');window.location='index.php'</script>";
	}else{
		echo "<script>alert('改名失败!');window.location='index.php'</script>";
	}
?>
