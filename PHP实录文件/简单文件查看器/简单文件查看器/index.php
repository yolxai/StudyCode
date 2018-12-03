<?php
	header("Content-type:text/html;charset=utf-8");
	$path = isset($_GET['path'])?urlencode($_GET['path'])."/":"./";
	$file = glob(urldecode($path)."*");
	
	/*foreach($file as $key=>$value){
		
	}
	* */
?>
<html>
<head>

</head>

<body>
	<table border=1 width=600>
		<thead>
			<th>ID</th>
			<th>文件名</th>
			<th>类型</th>
			<th>大小</th>
			<th>操作</th>
		</thead>
		<tbody>
			<?php
				foreach($file as $key=>$value):
			?>
				<tr>
					<td align=center><?php echo $key+1 ?></td>
					<td align=center><?php echo basename($value); ?></td>
					<td align=center><?php echo isset(pathinfo($value)['extension'])?"文件":"目录";?></td>
					<td align=center><?php echo is_file($value)?filesize($value):"";?></td>
					<td align=center>
						<a href="view_file.php?file=<?php echo $value; ?>" ><?php echo is_file($value)?"查看":"进入" ?></a>
						<a href="rename_file.php?file=<?php echo $value; ?>" >改名</a>
						<a href="del_file.php?file=<?php echo $value;?>" >删除</a>
						<a href="edit_file.php?file=<?php echo $value;?>" ><?php echo isset(pathinfo($value)['extension'])?"编辑":"";?></a>
					</td>
				</tr>
			<?php
				endforeach;
			?>
		</tbody>
	</table>
</body>
</html>
