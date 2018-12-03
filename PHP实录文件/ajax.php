<?php

	$array = array("admin","admin1","admin2","admin888","root","xiaoning");
	
	$name = $_POST['name'];
	
	if(in_array($name,$array)){
			echo "error!exists!";
	}else{
			echo "sucssce!";
	}

?>
