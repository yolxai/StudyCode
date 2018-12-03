<?php
	
	header("Content-type:text/html;charset=utf-8");
	
	$control = isset($_GET['control'])?$_GET['control']:'index'; //分配控制器
	$action = isset($_GET['action'])?$_GET['action']:'index'; // 处理动作
	
	function __autoload($class_name){
		include "./control/".$class_name.".class.php";
	}
	
	define('CONTROL',$control);
	include "control/control.class.php";	
	$control_name = $control."Control"; //获取控制器的名称
	$obj = new $control_name; //实例化对象
	$obj->$action(); //执行对象中的函数
	
?>
