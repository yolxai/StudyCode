<?php

	for($i=1;$i<=9;$i++){ //创造9行
		for($j=1;$j<=$i;$j++){ //创造9列
			echo "$j*$i=".$i * $j."&nbsp;&nbsp;&nbsp;";
		}
		echo "<br/>";
	}

?>
