<?php

function jieCheng($n){
	if($n > 1){
			return $n*jieCheng($n-1);
	}else{
			return 1;
	}
}

echo jieCheng(5);

?>
