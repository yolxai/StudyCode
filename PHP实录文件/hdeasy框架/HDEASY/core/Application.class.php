<?php

	final class Application{
			
			static function run(){ //初始化
				
					//function __autoload(){};自定义一个autoload
					spl_autoload_register(array(__CLASS__,'autoload'));
					self::setConst();//设置常量
					self::createAppPath();//创建应用基本目录
					self::init();//初始化应用 
					self::appRun();//运行应用
			}
			
			
			static private function  autoload($class_name){
				$class_path = HDEASY_ROOT."/class/".$class_name.".class.php";
				if(!is_file($class_path)){die("控制器不存在");}else{
						include $class_path;
				}
			}
			
			//创建应用目录(TPL,CONTROL,CONFIG)为了让用户更简单方便
			static private function createAppPath(){ 
				$dirs = array(
					"app"=>PATH_APP,//应用目录
					"config"=>PATH_APP."/config", //配置文件夹
					"control"=>PATH_APP."/control", //控制器文件夹
					"tpl"=>PATH_APP."/tpl", //模板文件夹
					"model"=>PATH_APP."/model" //模型文件
				);
				
				foreach($dirs as $d){
					if(!is_dir($d)){
						mkdir($d,0777,true) || die('目录创建失败,请检查权限!'); //遍历循环 创建目录
					}
				}
				
			}
			
			//初始化应用
			static private function init(){
				$config = PATH_APP."/config/config.php"; //构造配置文件地址
				if(is_file($config)){return false;} //如果配置文件存在,就return false
				
				//初始化index控制器的代码
				$indexControl = <<<str
<?php
class indexControl extends Control{
	function index(){
		echo "欢迎使用HDEASY框架!";
	}
}
?>
str;
				copy(HDEASY_ROOT."/core/config.php",PATH_APP."/config/config.php"); //复制配置文件
				file_put_contents(PATH_APP."/control/indexControl.class.php",$indexControl); //写入index控制器

			}
			
			
			
			//定义常量
			static private function setConst(){
					
					if(!defined("PATH_APP")){
							define("PATH_APP",PATH_ROOT."/".APP); //应用的文件夹 d:/www/hdcms/index 
					}
				
					$control = isset($_GET['c'])?$_GET['c']:"index"; //接受控制器
					$method = isset($_GET['m'])?$_GET['m']:"index"; //接受方法
					
					
					define("CONTROL",$control);
					define("METHOD",$method);
					define("PATH_CONTROL",PATH_APP."/control"); //应用中控制器的目录
					define("PATH_TPL",PATH_APP."/tpl"); //应用中模板的目录
					
			}
			
			//运行应用
			static private function appRun(){
					$controlFile = PATH_APP."/control/".CONTROL.'Control.class.php';//控制器文件
					if(!is_file($controlFile)){die('控制器文件不存在!');}
					include $controlFile; //控制器文件存在的话就包含进来
					
					
					$controlClass = CONTROL."Control";//控制器的类名
					if(!class_exists($controlClass)){die("控制器类:{$controlClass}不存在");}
					$controlObj = new $controlClass;//实例化出控制器对象
					
					$fun_name = METHOD;
					if(!method_exists($controlObj,$fun_name)){die("方法{$fun_name}()不存在!");}
					$controlObj->$fun_name();//执行控制器方法
			}
			
	}

?>
