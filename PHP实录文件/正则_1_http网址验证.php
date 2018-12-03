<?php
	header("Content-type:text/html;charset=utf-8");
?>
<html>
<head>
</head>

<body>
	<form name="form1" action="" method="post">
		请输入网址（带HTTP）：<input type="text" value="" name="regStr" />
		<input type="submit" value="验证" name="submit"/><br/>
		<!-- <span id="span1"></span> -->
	</form>
</body>

</html>
<!-- <script type="text/javascript">
		function t(){
				var oSpan = document.getElementById('span1');
				if(form1.regStr.value == ''){
					oSpan.innerHTML = '请勿为空';
					return false;
				}else{
					oSpan.innerHTML = '';
					return true;
				}
		}
	</script>
-->
<?php
	if(isset($_POST['submit'])){
		
		$urlStr = $_POST['regStr'];
		
		if(empty($urlStr)){
				echo "<span>请输入内容</span>";
				exit;
		}
		
		$regExp = "/(http:\/\/)\w*\.\w+\.(com.cn|com|org|net|tv)/i";
		if( preg_match($regExp,$urlStr) ){
			echo "<span>是http网址</span><br/>";
			echo $urlStr;
		}else{
			echo "<span>不是一个正确的HTTP网址</span><br/>";
			echo $urlStr;
		}
		
	}
?>
