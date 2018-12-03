<?php
	
	header("Content-type:text/html;charset=utf-8");
	include "functions.php";
	if( !isset($_POST['q']) ){echo "<script>alert('请通过正常程序进入此页面');window.location='设置网站配置.php'</script>";exit;}
	
	array_pop($_POST);
	array_pop($_POST);

	$data = var_export($_POST,true);

	
	$str = "<?php return \n ".$data." \n ?>";
	
	$file_active = file_put_contents("web_config.php",$str);
	
	if($file_active == true){
		echo "<script>alert('配置文件成功!');window.location='设置网站配置.php'</script>";
	}else{
		echo "<script>alert('配置改变失败,请检查文件')</script>";
	}

?>
