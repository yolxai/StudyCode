<?php
	
	header("Content-type:text/html;charset=utf-8");
	
	$db = include "file_db.php"; //包含图片数据数组
	
	$allow_type = array(".jpg",".gif",".jpeg",".png"); //允许上传的图片类型
	if(is_uploaded_file($_FILES['upfile']['tmp_name'])){ //检测是否是可以上传的文件
		
		$type = strrchr($_FILES['upfile']['name'],'.'); //获取文件后戳
		if(!in_array($type,$allow_type)){echo "<script>alert('非法的文件类型');</script>";exit;} //检测后戳
		
		$imageFile = time().mt_rand(1,5000).$type; //随机生成文件名
		
		$imageName = substr($_FILES['upfile']['name'],0,strrpos($_FILES['upfile']['name'],"."));
		
		if(move_uploaded_file($_FILES['upfile']['tmp_name'],'upload/'.$imageFile)){ //文件上传成功
			
				$db[] = array( //生成新的数据数组
					"name" => $imageName, //上传时的原始文件名
					"image_path" => 'upload/'.$imageFile, //上传后的图片文件名
					"image_size" => $_FILES['upfile']['size'], //图片大小
					"image_type" => $_FILES['upfile']['type'] //图片类型
				);
				
				//添加到数据文件中
				if(file_put_contents("file_db.php","<?php \nreturn ".var_export($db,true)."\n?>")){
					echo "上传成功！<script>window.location.assign('view_image.php');</script>";
				}else{
					echo "未知错误！";
				}
				
		}else{ //失败
				echo "上传失败，错误代码为：".$_FILES['upfile']['error'];
		}
		
	}
?>
