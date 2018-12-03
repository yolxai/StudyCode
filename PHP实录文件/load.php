<?php
	
		load( "config.php" );load( "config.php" );load( "config.php" );load( "config.php" );

		function load($IncludeFileName){
			static $IncludeExist = array();
			$NameMd5Value = md5 ($IncludeFileName); //生成MD5文件名 
			
			if(in_array($NameMd5Value,$IncludeExist)){  //如果键值为MD5文件名的数值在数组中，就返回真
				return true;
			}else{    //否则
				$IncludeExist[$NameMd5Value] = true; //给数组中添加键值为MD5文件名的数值为true
				Include($IncludeFileName); //包含文件
			}
			
			//先在数组中判断是否包含过文件，如果没有就包含文件并且在数组中添加true ， 如果有就返回true
			//功能：包含文件（只能包含一次）
			
		}

?>
