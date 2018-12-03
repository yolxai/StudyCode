<?php
	
	class indexControl extends Control{ // [ index control ]
		
		function index(){ // [ index control -> index() ] -> default 显示首页
			$this->display("index.html");
		}
		
		function view(){ //[ index control -> view() ] -> 显示单个ID的文章
			$this->display("view.html");
		}
		
		function apply(){ // [ index control -> apply() ] -> 申请岗位
			$this->display("apply.html");
		}
		
		
	}

?>
