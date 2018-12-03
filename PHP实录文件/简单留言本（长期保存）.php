<?php
	header("Content-type:text/html;charset=utf-8");
	$ftext = file_get_contents("liuyanben.txt");
?>
<html>
<head>
	<title>文件保存:留言本</title>
</head>

<body>
	<h1>
		PHP基础之留言本
	</h1>
	<p>----------------------------------------------------------------------------------------------------------------------------</p>
	<table>
		<?php
		
			if( $ftext ){
				$text_arr = explode("\n",$ftext);
				unset($text_arr[count($text_arr)-1]);
				foreach($text_arr as $value){
					$text_arr2 = explode("##@##",$value);
						echo "标题:".$text_arr2[0]."|内容:".$text_arr2[1]."|时间:".date("Y-m-d H:i:s",$text_arr2[2])."<br/>";
				}
			}else{
				echo "当前没有留言！";
			}
		?>
	</table>
	<p>----------------------------------------------------------------------------------------------------------------------------</p>
	<form action="" method="post">
		标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题:<input type="input" type="text" name="title" value="" /><br/>
		留言内容:<textarea style="resize:none" rows="1" cols="10" name="context"></textarea><br/>
		<input type="submit" value="提交留言" name="submit"/>
	</form>
</body>

</html>
<?php
	
	if($_POST['submit']){
				$text = $_POST['title'] . "##@##" . $_POST['context'] . "##@##" . time() . "\n";
				$ftext = file_get_contents("liuyanben.txt");
				$fcontext = file_put_contents("liuyanben.txt",$ftext.$text);
	}
	
?>
