<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	</head>

	<body>
			<form action=""  method="get">
				<input type="text" name="text" value="">
				<input type="submit"  value="搜索"/>
			</form>
	</body>
	
</html>

<?php

if( $_GET['text'] ){
	echo "您搜索的内容是:".$_GET['text'];
}

?>
