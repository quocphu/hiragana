<?php
	require 'dao/DP.php';
	require 'dao/Student.php';
	require 'dao/StudentDao.php';
	require 'dao/BaseDao.php';
	require 'dao/PatternDao.php';
	require 'dto/Pattern.php';
	require 'services/PatternService.php';
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
// 	$sql = $db->readTextFile("dao/StudentDao_insert.sql");
	
// 		$st = new Student();
// 		$st->name="Java1";
// 		$st->address="insert java";
		
// 		$id1 = $db->insertAndGetLastId($sql, $st);
// 		echo "id1 = " .$id1;
// 		$b = new BaseDao($db);
// 		$p = new PatternDao($db);
		
// 		$patterns = $p->getAll();
// 		print_r($patterns);
// 		$pt = new Pattern();
// 		$pt->title = "test insert";
// 		$p_id = $p->insert($pt);
// 		echo $p_id;
	$sv = new PatternService ($db);
	$sv->insert();
	echo "end";
?>