<?php

	header("Content-type:text/html;charset=utf-8");
	$db = include "file_db.php";
?>
<html>
	<head></head>
	<body>
		<table width=800>
			<thead>
				<th>ID</th>
				<th>说明</th>
				<th>图片地址</th>
				<th>大小</th>
			</thead>
			<tbody>
				<?php
					foreach($db as $key=>$value){
						echo "<tr>";
						echo "<td align='center'>".($key+1)."</td>";
						echo "<td align='center'>".$value['name']."</td>";
						echo "<td align='center'><a href='".$value['image_path']."'>".$value['image_path']."</a></td>";
						echo "<td align='center'>".$value['image_size']."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</body>
</html>
