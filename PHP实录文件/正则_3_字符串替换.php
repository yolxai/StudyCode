<?php

header("Content-type:text/html;charset=utf-8");
$str = "我喜欢上taobaO.com购物，特别是衣服之类的，我推荐http://www.taobao.com";

$preg = '/(http:\/\/)?(www\.)?taobao\.com/i';

$result = preg_replace($preg,"<a href='http://360buy.com'>360buy</a>",$str);
echo $result;
echo "<br/>";


$str1 = "abc";
$preg1 = '/abc/e';//e = eval
$result1 = preg_replace($preg1,'strtoupper("\0")',$str1);
echo $result1;

?>
