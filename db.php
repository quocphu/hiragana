<?php
	$classesDir = array (
	    'dao/',
	    'dao/Pattern/',
	    'dao/PatternColumn/',
	    'dao/PatternDetail/',
		'dto/',
		'entities/',
		'common/',
		'services/'
	);
	function __autoload($class_name) {
	    global $classesDir;
	    foreach ($classesDir as $directory) {
	        if (file_exists($directory . $class_name . '.php')) {
	            require_once ($directory . $class_name . '.php');
	            return;
	        }
	    }
	}
	
	echo "<h1>Hello DB</h1>";
	$db = DP::getInstant();
//	$stDao = new StudentDao($db);
	
	
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
// 	$sv = new PatternService ($db);
// 	$sv->insert();
// 	$ptDao = new PatternDao($db);
// 	$pt = $ptDao->getById("2");
	
// 	print_r($pt);
// 	$pt->columnsize=10;
// 	$pt->description="des";
// 	$pt->accountid=10;
// 	$pt->status=100;
// 	$pt->title="new title";
// 	$pt->votes=10;
	
// 	$ptDao->update($pt);
	
// 	$ptColumnDao = new PatternColumnDao($db);
// 	$ptColumn = new PatternColumn();
// 	$ptColumn->header="v3";
// 	$ptColumn->patternid=1;
// 	$ptColumn->priority=2;
	
// 	$ptColumnDao->insert($ptColumn);
	//$ptColumnList = $ptColumnDao->getAll();
	//logger($ptColumnDao->getByPatternId(1));
// 	$pdtDao = new PatternDetailDao($db);
// 	$pdt = new PatternDetail();

// 	$pdt->id=1;
// 	$pdt->columnid = 1;
// 	$pdt->patternid=10;
// 	$pdt->priority=111;
// 	$pdt->value="went update";
// 	$pdtDao->insert($pdt);
// 	logger($pdtDao->getByPatternId(1));
// 	$pdtDao->update($pdt);

	$patternSrv = new PatternService($db);
	
	$pt = $patternSrv->getById(39);
	//PLog::out($pt);
	
	$ptDto = new PatternDto();
	$ptEn = new Pattern();
	$ptEn->accountid=1;
	$ptEn->columnsize=2;
	$ptEn->description="Test insert";
	$ptEn->title="Test title";
	
	$ptDto->info = $ptEn;
	
	for($i=0; $i<2; $i++){
		$column = new PatternColumn();
		$column->header = "column ".$i;
		$column->priority=$i;
		$ptDto->header[]=$column;
	}
	for($i=0; $i<10; $i++){
		$detail = new PatternDetail();
		$detail->priority=$i;
		$detail->value="value ".$i;
		$ptDto->data[]=$detail;
	}
	$rs = Validator::regex("あいうえお",'/\w/');
	if($rs){
		echo "OK";
	}else{
		echo "FAIL";
	}
	//logger($ptDto);
	
//  $ptId =	$patternSrv->insert($ptDto);

//  PLog::out("ID=".$ptId);
	
?>