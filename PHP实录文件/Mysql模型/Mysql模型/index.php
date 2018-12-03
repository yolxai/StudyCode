<?php
	include "./functions.php";
	include "./Model.class.php";
	C(include 'config.inc.php');
	
	charset();
	$db = M('study');
	//var_dump($db);
	//print_r($db->query('SELECT * FROM study'));
	//print_r($db->exe('update study set sex=1 where id=88'));
	//print_r($db->find(88));
	//$db->find(88);
	include "Debug.class.php";
	$debug = new Debug();
	//print_r($db->where("id<88")->order("age desc")->select());
	
	//print_r($debug->showSql());
	//$arr = array("name"=>'大红','sex'=>1,'age'=>18,'asda'=>123);
	//p($db->update($arr,'id=1'));
	//var_dump($db->delete('id=2'));
	
	$arr = array("name"=>'大红','sex'=>1,'age'=>18);
	//var_dump($db->insert($arr));
	
	//var_dump($db->query('select * from study'));
	//var_dump($db->find(88));
	var_dump($db->order('id')->select());
	var_dump($db->where('id>2')->limit("1,5")->select());
	var_dump($db->order('id')->select());
	print_r($debug->showSql());
	
	
	
	
	?>
