<?php
	echo "<div style='text-align:center'>";
	$str = '';
	for($i=6;$i>0;$i--){
			$str = '';
			for($n=0;$n<$i;$n++){
				$str.= '*';
			}
			echo $str."<br/>";
			if($i==1){
				for($j=2;$j<=6;$j++){
						$str = '';
						for($m=0;$m<$j;$m++){
							$str .= '*';
						}
						echo $str."<br/>";
				}
			}
	}

echo "</div>";

?>
