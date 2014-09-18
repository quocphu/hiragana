<?php
	require 'dao/DP.php';
	require 'dao/Student.php';
	require 'dao/StudentDao.php';

	echo "<h1>Hello DB</h1>";
	$db = DP::getInstant();
	$stDao = new StudentDao($db);
	
	
// 	echo $stDao->get(10)->getName();
// 	$arr = $stDao->getAll();
	
// 	for($i=0; $i < count($arr); $i++){
// 		echo $arr[$i]->getName()."<br>";		
// 	}
	
	
// 	$st = new Student();
// 	$st->name="Java";
// 	$st->address="insert java";
// 	$id = $stDao->insert($st);
// 	echo 'id='.$id;
	
// 	$sql = "select count(*) from student where name like ?";
// 	$count = $db->selectScalar($sql, array("%JAVA%"));
// 	echo 'count: '.$count;
	$sql = $db->readTextFile("dao/StudentDao_insert.sql");
	
	$st = new Student();
		$st->name="Java2";
		$st->address="insert java";
		
		$id1 = $db->insertAndGetLastId2($sql, $st);
		echo "id2 = " .$id1;
	
	echo "end";
?>