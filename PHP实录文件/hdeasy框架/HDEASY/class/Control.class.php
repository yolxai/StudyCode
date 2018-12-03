<?php

	class Control{
		
			protected $__vars=array(); 
			protected function display($tpl=null){
					if(is_null($tpl)){
							$tpl = METHOD.".html";
					}
				
					$tpl = str_replace(".html",'',$tpl).".html";
					$tpl_path = PATH_TPL."/".$tpl;
					
					extract($this->__vars);
					include $tpl_path;
			}
			
			protected function assign($name,$value){
					$this->__vars[$name] = $value;
			}
			
	}

?>
