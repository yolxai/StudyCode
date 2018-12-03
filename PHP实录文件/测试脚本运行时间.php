<?php
header("Content-type:text/html;charset=utf-8");
$start = microtime(true);
$str = '';
for($i=0;$i<500000;$i++){
	$str .= $i;
}
$end = microtime(true);

echo "脚本运行时间：".($end-$start);

?>
