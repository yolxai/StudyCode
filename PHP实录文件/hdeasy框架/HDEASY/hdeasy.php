<?php

	final class HDeasy{
		
			//框架初始化[框架初始化]
			static public function run(){
				self::setConst(); //定义常量的函数
				self::CreateCoreDir(); //创建网站临时文件的目录
				self::loadCoreFile();//加载核心文件
				
				Application::run();//执行Application类中的run方法
			}
			
			//定义常量[初始化常量]
			static private function setConst(){
					define("NOW",$_SERVER['REQUEST_TIME']);//当前的时间
					define("HDEASY_ROOT",dirname(__FILE__));//框架的目录
					define("PATH_ROOT",dirname($_SERVER['SCRIPT_FILENAME'])); //网站的目录
					define("PATH_TEMP",PATH_ROOT."/temp");//临时文件夹目录
					if(!defined("PATH_APP")){ //判断是否设置了PATH_APP
							define("PATH_APP",PATH_ROOT."/".APP);//设置PATH_APP(APP是用户在文件中定义的应用名称)
					}
					
			}
			
			//创建网站基本目录
			static private function CreateCoreDir(){
				//判断临时文件夹是否存在
				if(!is_dir(PATH_TEMP)){
						@mkdir(PATH_TEMP,0777) || die("目录创建失败,请修改权限!");
				}
			
			}
			
			//加载核心文件
			static private function loadCoreFile(){
					include HDEASY_ROOT."/core/functions.php";//包含核心文件
					include HDEASY_ROOT."/core/Application.class.php";//包含应用处理类
			}
			
	}
	HDeasy::run();//执行框架初始化

?>
