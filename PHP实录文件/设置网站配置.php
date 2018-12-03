<?php
	header("Content-type:text/html;charset=utf-8");
	include "functions.php";
	$config = C(include "web_config.php");
	if(count($config)<=0){exit;}
?>
<html>
	
<head>
	<title>设置网站配置</title>
</head>

<body>
	<form action="change_config.php" method="post">
		<table class="tab1" style="margin:0 auto;">
			<thead>
				<th colspan=2>设置网站配置</th>
			</thead>
			<tbody>
				<?php
					foreach($config as $key=>$value):
						?>
							<tr>
								<td align=right><?php echo $key; ?> : </td>
								<td><input name=<?php echo $key ?> style="text-align:center;" type="text" value=<?php echo $value; ?> /></td>
							</tr>
						<?php
					endforeach;
					?>
					<tr>
						<td colspan=2 align="right">
							<input type="submit" name="submit" value="保存更改"/>
							<input type="hidden" name="q" value=1 />
						</td>
					</tr>
					<?php
				?>
			</tbody>
		</table>
	</form>
</body>

</html>
