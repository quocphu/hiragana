<?php
	require 'flight/Flight.php';
	require 'libs/Smarty.class.php';
	require_once 'common/Common.php';
	require_once 'common/Plog.php';
	require_once 'common/Validator.php';
	require_once 'config/message.properties';
	Common::include_all('dao');
	Common::include_all('dao/Pattern/');
	Common::include_all('dao/PatternDetail/');
	Common::include_all('dao/PatternColumn/');
	Common::include_all('services/');
	Common::include_all('api/');
	Common::include_all('entities/');
	Common::include_all('dto/');
	session_start();
	// Register Smarty as the view class
	// Also pass a callback function to configure Smarty on load
	Flight::register('view', 'Smarty', array(), function($smarty){
	    $smarty->template_dir = './templates/';
	    $smarty->compile_dir = './templates_c/';
	    $smarty->config_dir = './config/';
	    $smarty->cache_dir = './cache/';
	});
	
	// Override render method
	Flight::map('render', function($template, $data){
	    Flight::view()->assign($data);
	    Flight::view()->display($template);
	
	});
	
	// Page
	// root
	Flight::route ('/', function() {
		Flight::render('./views/index.php', array('title' => "trang chu", 'url' => '/api/pattern/getNew', 'param' => ''));
	});
	
	// Detail
	Flight::route ('/detail/@id', function($id) {
		
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$pattern = $patternSrv->getById($id, true);
		$ptnDto = array();
		$ptnDto['header'] = $pattern->header;
		$ptnDto['info'] = $pattern->info;
		$ptnDto['data'] = array();
		
		$limit =  count($pattern->data) / $pattern->info->columnsize;
		
		for ($i = 0; $i < $limit; $i++) {
			$tmp = array();
			for($j = 0; $j < $pattern->info->columnsize; $j++) {
				$tmp[] = $pattern->data[$i * $pattern->info->columnsize + $j]->value;
			}
			$ptnDto['data'][] = $tmp;
		}
		Flight::render('./views/detail.php', array('title' => "Detail", 'pattern'=>json_encode($ptnDto)));
	});
	
	// Create new pattern step 1
	Flight::route ('/new/1', function() {
		Flight::render('./views/new1.php', array('title' => "Step1"));
	});
	
	// Create new pattern step 2
	Flight::route ('/new/2', function() {
		Flight::render('./views/new2.php', array('title' => "Step2",'rowNum' => $_SESSION[STEP1]->info->columnsize));
	});
	
	// Create new pattern step 3
	Flight::route ('/new/3', function() {
		$step1Data = $_SESSION[STEP1];
		$json = json_encode($step1Data);
		Flight::render('./views/new3.php', array('title' => "Step3", 'data'=>$json, 'rowNum' => $_SESSION[STEP1]->info->columnsize));
	});
	
	// Create new pattern step 4
	Flight::route ('/new/4', function() {
		$step1Data = $_SESSION[STEP1];
		$json = json_encode($step1Data);
		
		// Insert data
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$patternSrv->insert($step1Data);
		
		// Empty session
		$_SESSION[STEP1] = null;
		
		Flight::render('./views/new4.php', array('title' => "Step4", 'data'=>$json));
		
	});
	
	// Search
	Flight::route ('/search', function() {
		$param =  $_GET['title'];
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$limit = 10;
		$offset = 0;
		$rs = $patternSrv->search($param, $limit, $offset);
		Flight::render('./views/search.php', array('title' => "Tim kiem", 'searchResult'=>$rs['data'], 'param' => $param));
	});
	
	// API
	// Api Get new pattern
	Flight::route ('/api/pattern/getNew', function() {
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$api = new PatternApi($patternSrv);
		echo $api->getNewPattern();
	});
	
	// Api Check step1
	Flight::route ('/api/pattern/checkStep1', function() {
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$api = new PatternApi($patternSrv);
		$rs = $api->newPatternStep1($_POST);
		
		echo json_encode($rs);
	});
	
	// Api Check step2
	Flight::route ('/api/pattern/checkStep2', function() {
// 		$db = DP::getInstant();
// 		$patternSrv = new PatternService($db);
// 		$api = new PatternApi($patternSrv);
// 		$rs = $api->newPatternStep1($_POST);
// 	print_r($_POST);
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$api = new PatternApi($patternSrv);
		$rs = $api->newPatternStep2($_POST);
		echo json_encode($rs);
	});
	
	// Search
	Flight::route ('/api/pattern/search', function() {
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$limit = 10;
		$offset = 0;
		$title = $_POST['title'];
		$rs = $patternSrv->search($title, $limit, $offset);
// 		echo json_encode($rs);
	});
	
	Flight::start();
?>