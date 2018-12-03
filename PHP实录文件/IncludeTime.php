<html>
<head>
	<title>表格</title>
</head>

<body>
	<table border=1 width=500>
		<tr>
			<td>id</td>
			<td>FileName</td>
			<td>RunTime</td>
		</tr>
	<?php
		$id = 0;
		$arr = includeTime();
		foreach($arr as $value){
			$id++;
			echo "<tr>";
			echo "<td>".$id."</td>";
			echo "<td>".$value[file]."</td>";
			echo "<td>".$value[time]."</td>";
			echo "</tr>";
		}
	?>
	</table>
</body>

</html>
