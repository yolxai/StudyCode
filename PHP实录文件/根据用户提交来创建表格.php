<html>
	
<head>
	<meta charset="utf-8"/>
</head>

<body>
	<form action="" method="get" >
			row:<input type="text" name="row"/><br/>
			col:<input type="text" name="col"/><br/>
			是否隔行变色:<input type="checkbox" name="changeColor"/><br/>
			<input type="submit" value="submit" name="submit"/><input type="reset" value="reset"/>
	</form>
	
<table border=1>
<?php

if(isset($_GET['submit'])){
	$changeColor = $_GET['changeColor'] == 'on' ? true : false;
	
	if($_GET['row'] && $_GET['col']){
		
				$row = $_GET['row'];
				$col = $_GET['col'];
				
				for($i=0;$i<$row;$i++){
					if( $changeColor ){
							if($i % 2 == 0 ){
								echo "<tr style='background:red'>";
							}
					 }else{
							 echo "<tr>";
					}
					
						
						for($j=0;$j<$col;$j++){
									
									echo "<td>我是第{$i}行的第{$j}个列</td>";
								
								}
								
							 echo "</tr>";
				}
	}
	
}

?>
</table>

</body>

</html>
