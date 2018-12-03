<?php

/*
 *  @author Lxai
 *  @mail lxai@th4ck.com
 * */
 
 /*  function  p(){}
  *  	与print_r()同理
  * */
  
  /* function array_change_key_d() 改变key大小写（递归）
   * 
   * */
   
  /* function array_change_value_d() 改变value大小写（递归）
   * 
   * */
  
  /*  function C(){}
   *  	@param $name,$value
   *   1. 获得$name中传入的配置项 ($name == true , $value == null ) return array() & $name-type = array()
   *   2. 获取$name和$value($value == null , $value != null) & $name-type = string()
   * */
   
   /* function M(){}
    * 	@param $table_name 
    *  调用Model类并且实例化
    * 
    * 
    *  function K(){}
    *  @param $k_name,$table_name
    *  实例化扩展模型
    * */
   
   
   //设置页面编码 默认UTF-8
   function charset($char="utf-8"){
	   return header("Content-type:text/html;charset=".$char."");
	}
   
////p函数
   function p($v){
	   echo "<pre>";
		print_r($v);
		echo "</pre>";
	}
	
////M函数
	function M($table_name){
			return new Model($table_name);
	}
	
////K函数
	function K($name,$table_name){
			$modelFile = PATH_APP."/model/".ucfirst($name)."Model.class.php";
			if(!is_file($modelFile)){
					die("扩展模型文件不存在!");
			}
			C(include PATH_APP.'/config/config.php');
			include $modelFile;
			$obj_name = $name."Model";
			return new $obj_name($table_name);
			
	}
	
	
////不区分大小写 查询键值是否存在 array_key_exists 的自定义版本
	function array_key_exists_d($key,$arr){
		$_key = strtoupper($key);
		foreach($arr as $k=>$v){
			$_k = strtoupper($k);
			if($_key == $k){
				return true;
			}
		}
		
		return false;
		
	}
	
////递归改变key的大小写
	function array_change_key_d($arr,$action=0){
		if(!is_array($arr) || count($arr)<0 )exit;
		
		$ac = $action?"strtoupper":"strtolower";
		$_newArray = array();
	
		foreach($arr as $key=>$value){
				$_key = $ac($key);
				$_newArray[$_key] = is_array($value)?array_change_key_d($value,$action):$value;
		}
		
		return $_newArray;
		
	}
	
////递归改变value的大小写
	function array_change_value_d($arr,$action=0){
		if(!is_array($arr) || count($arr)<0 )exit;
		$ac = $action?"strtoupper":"strtolower";
		$_newArray = array();
		
		foreach($arr as $key=>$value){
			$_value = is_array($value)?array_change_value_d($value,$action):$ac($value);
			$_newArray[$key] = $_value;
		}
		
		return $_newArray;
	
	}
	
////读取配置项 改变配置项的C函数
	function C($name=null,$value=null){
		
		static $config = array(); //定义静态配置文件
		
		// C() 返回当前的配置文件
		if($name == null){
			return $config;
		}
		
		
		// $name是数组 并且$value是null的话 看作配置 配置文件
		if(is_array($name) && $value == null){
				$config = array_merge($config,$name);//合并数组
				return $config; //并且返回数组
		}
		
		//如果$name是字符串
		if( is_string($name) ){
			
			$name = strtoupper($name); //转换成大写
			
			if($value == null){ //判断是读取还是设置
				
					//$value==null 说明只有一个参数 那么就是读取配置文件
					return array_key_exists_d($name,$config)?$config[$name]:false; //查询的字段是否存在
			
			}else{
			
					//$value!=null 说明有两个参数 那么就是配置文件
					$config[$name] = $value;
					return true;
			
			}
		
		}
		
	}
	
////获取文件夹的大小 递归获取文件夹内的文件大小并且相加
	function get_dir_size( $dirName){
		if( !is_dir($dirName) ){return false;} //不是目录就返回假
		
		$allFile = scandir($dirName); //扫描目录中的文件和文件夹
		$countSize = 0;	
		
		foreach($allFile as $value){
			if(in_array($value,array(".",".."))){continue;}
			$filePath = $dirName."/".$value;
			//如果是文件就获得大小并且相加 如果是目录就递归执行此函数
			$countSize += is_dir($filePath)?get_dir_size($filePath):filesize($filePath); 
		}
		
		return $countSize;
		
	}
	
////递归删除非空文件夹
	function delete_dir($dirName){
		if(!is_dir($dirName))return false;//不是目录就返回假
		$allFile = scandir($dirName); //扫描目录中的文件和文件夹
		
		foreach($allFile as $value){
			if(in_array($value,array(".",".."))){continue;}
			$fileName = $dirName."/".$value;
			if(is_dir($fileName)){
				delete_dir($fileName);
			}
			if(is_file($fileName)){
				unlink($fileName);
			}
		}
		return rmdir($dirName);
		
	}

////copy自定义函数 添加复制目录功能
	function copy_dir($sdir,$ddir){
		if(!is_dir($sdir))return false;
		is_dir($ddir) || mkdir($ddir);
		
		$file = scandir($sdir);
		foreach($file as $value){
			if(in_array($value,array(".",".."))){continue;}
			$_sFile = $sdir."/".$value;
			$_dFile = $ddir."/".$value;
			
			if(is_dir($_sFile)){
				copy_dir($_sFile,$_dFile);
			}else{
				copy($_sFile,$_dFile);
			}
			
		}
		return true;
	}


?>
