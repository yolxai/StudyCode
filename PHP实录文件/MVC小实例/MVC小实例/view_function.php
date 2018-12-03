<?php
	
	function assign($name=null,$value=null){
		static $_result = array();
		
		if( is_null($name) ){
			return $_result;
		}
		
		if( !is_null($name) && is_null($value) ){
			if (isset($_result[$name]) ){
					return $_result[$name];
			}else{
					return false;
			}
		}
		
		if( !is_null($name) && !is_null($value) ){
			$_result[$name] = $value;
			return true;
		}
		
		
		
		
	}
	
	function display($template=null){
			
			if(is_null($template)){
				return false;
			}
		
			$context = file_get_contents($template);
			
			$result = assign();
			
			foreach($result as $key=>$value){
					
					$preg = '/\{var:\$'.$key.'\}/';
					
					$context = preg_replace($preg,$value,$context);
					
			}
			
			echo $context;

	}


?>
