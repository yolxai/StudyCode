<?php
error_reporting('E_ALL & ~E_NOTICE ');

Header("Content-type:text/html;charset=utf-8");
includeTime('config.php');
includeTime('config1.php');
includeTime("IncludeTime.php");
/*
 * 
 *  全部不填：返回数组（数组名为所有文件的MD5名，键值1是file即文件名，键值2是time即文件执行时间）
 *  第一个参数：文件名 （包含文件）
 *  第二个参数：是否返回文件包含所用的时间（包含并返回时间）
 * 
 * 
 * */

function includeTime($fileName=null,$status=false){
	static $fileExist = array();
	static $result = array(); //返回结果数组
	
	if( is_null($fileName) ){
			return $result;
			exit;
	}
	
	$md5FileName = md5($fileName); //生成MD5文件名
	if( isset($fileExist[$md5FileName]) ){ //只允许包含一次文件,如果文件存在静态数组中
		return false;
	}else{ //不存在的数组中的话（首次包含）
		$fileExist[$md5FileName] = 1; //添加数据至数组
		if($status == true){ //是否记录运行时间
			$start = microtime();
			include($fileName);
			$end = microtime();
			$IncludeTime = $end - $start; //脚本结束-脚本开始 = 脚本运行时间
			
			$result[$md5FileName]['file'] = $fileName;
			$result[$md5FileName]['time'] = $IncludeTime;
			
			return $IncludeTime; //如果第二个参数为真的话返回脚本包含执行所用的时间
			
			
		}else{ // 不记录时间就只包含文件
				$start = microtime();
				include($fileName);
				$end = microtime();
				$IncludeTime = $end - $start; //脚本结束-脚本开始 = 脚本运行时间
				$result[$md5FileName]['file'] = $fileName;
				$result[$md5FileName]['time'] = $IncludeTime;
		}
	}
	

}

?>
