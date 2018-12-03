<?php
	//文章管理 
	//查看首页 查看文章 增加文章 删除文章
	
	header("Content-type:text/html;charset=utf-8");
	
	$action = isset($_GET['action'])?$_GET['action']:false; //接受get中的action
	$id = isset($_GET['id'])?$_GET['id']:1; //接受get中的id
	
	class arc{
			
			public function __construct($action,$id){
				
				if($action==false){
					echo "没有找到GET方式中的action !";
					exit;
				}
				
				switch($action){
					case "index":
						$this->index();
					break;
					case "view":
						if($id){$this->view($id);}
					break;
					case "add":
						$this->add();
					break;
					case "del":
						if($id){$this->del($id);}
					break;
					default:
					echo "请执行正确的操作!";
					break;
				}
				
			}
			
			public function index(){ //查看首页方法
					echo "查看首页";
			}
			
			public function view($id){  //查看文章方法
					echo "查看ID为{$id}的文章";
			}
			
			public function add(){ //添加文章方法
					echo "添加文章";
			}
			
			public function del($id){ //删除文章方法
					echo "删除ID为{$id}的文章";
			}
			
	}
	
	
	$acr = new arc($action,$id); //实例化对象
?>
