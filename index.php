<?php

	require 'flight/Flight.php';
	require 'libs/Smarty.class.php';
	require_once 'common/Common.php';
	require_once 'common/Plog.php';
	require_once 'common/Validator.php';
	require_once 'config/message.properties';
	Common::include_all('dto/');
	Common::include_all('entities/');
	Common::include_all('dao');
	Common::include_all('dao/Pattern/');
	Common::include_all('dao/PatternDetail/');
	Common::include_all('dao/PatternColumn/');
	Common::include_all('dao/Account/');
	Common::include_all('services/');
	Common::include_all('api/');
	
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookJavaScriptLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
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
		
		// Set init value
		FacebookSession::setDefaultApplication(FBID, FBS);
		$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);
		$data['loginUrl']= $helper->getLoginUrl();
		$data['appId']= FBID;
		$data['logo']= UI_LOGO;
		$data['uiTitle']= UI_TITLE;
		$data['MAX_FILE_ROW_NUM']= MAX_FILE_ROW_NUM;

		// Override render
	    Flight::view()->assign($data);
	    Flight::view()->display($template);
	
	});
	
	// Page
	// root
	Flight::route ('/', function() {
		Flight::render('./views/index.php', array('title' => Common::getTitle("Trang chủ") , 'url' => '/api/pattern/getNew', 'param' => ''));
	});
	
	// Detail
	Flight::route ('/detail/@id', function($id) {
// 		if(Validator::isNumber($id)){
			$db = DP::getInstant();
			$patternSrv = new PatternService($db);
			$pattern = $patternSrv->getById($id, true);
			if(is_null($pattern)){
				$error = array();
				$error[] = Validator::validMessage([$id], PTN_NOT_EXIST);
				$_SESSION[ERROR] = $error;
				Flight::redirect('/error');
				
			}
			$ptnDto = Common::convertPattern($pattern);
			
			Flight::render('./views/detail.php', array('title' =>Common::getTitle($pattern->info->title), 'pattern'=>json_encode($ptnDto)));
// 		}
	});
	
	// Create new pattern step 1
	Flight::route ('/new/1', function() {
		// Check login status
		if(!isset($_SESSION[FB_TOKEN]) || is_null($_SESSION[FB_TOKEN])) {
			$error = array();
			$error[] = NOT_LOGIN;
			$_SESSION[ERROR] = $error;
			$_SESSION['PREV_URL1'] = '/new/1';
			Flight::redirect('/error');
		}
		
		Flight::render('./views/new1.php', array('title' => Common::getTitle("Bước 1")));
	});
	
	// Create new pattern step 2
	Flight::route ('/new/2', function() {
		if(!isset($_SESSION[STEP1])) {
			Flight::redirect('/new/1');
		}
		
		Flight::render('./views/new2.php', array('title' => Common::getTitle("Bước 2 - Tạo bằng file"),'rowNum' => $_SESSION[STEP1]->info->columnsize));
	});
	
	// Create new pattern step 3
	Flight::route ('/new/3', function() {
		if(!isset($_SESSION[STEP1])) {
			Flight::redirect('/new/1');
		}
		
		$step1Data = $_SESSION[STEP1];
		$json = json_encode($step1Data);
		Flight::render('./views/new3.php', array('title' => Common::getTitle("Bước 2 - Tạo bằng tay"), 'data'=>$json, 'rowNum' => $_SESSION[STEP1]->info->columnsize));
	});
	
	// Create new pattern step 4
	Flight::route ('/new/4', function() {
		if(!isset($_SESSION[STEP1])) {
			Flight::redirect('/new/1');
		}
		
		$step1Data = $_SESSION[STEP1];
		
		// Insert data
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$id = $patternSrv->insert($step1Data);
		$_SESSION['PTN_ID'] = $id;
		
		Flight::redirect('/new/5');
	});
	
	Flight::route ('/new/5', function() {
		if(!isset($_SESSION['PTN_ID'])) {
			Flight::redirect('/new/1');
		}
		
		$id = $_SESSION['PTN_ID'];
		
		// Insert data
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$pattern = $patternSrv->getById($id, true);
		$ptnDto = Common::convertPattern($pattern);
		
		// Empty session
		$_SESSION[STEP1] = null;

		Flight::render('./views/new4.php', array('title' => 'Bước 3 - Thành công', 'id' => $id, 'data' => json_encode( $ptnDto)));
	});
	// Edit
	Flight::route ('/edit/@id', function($id) {
		$valid = 1;
		
		// Check data
		if(!Validator::isNumber($id)){
			throw new Exception('id ko dung', 500, null);
		}
		
		// Check login status
		if(!isset($_SESSION[FB_TOKEN]) || is_null($_SESSION[FB_TOKEN])) {
			$error = array();
			$error[] = NOT_LOGIN;
			$_SESSION[ERROR] = $error;
			$_SESSION['PREV_URL1'] = '/edit/'.$id;
			Flight::redirect('/error');
		}
		
		// DB info
		$dp = DP::getInstant();
		$patternSrv = new PatternService($dp);
		$ptn = $patternSrv->getById($id, true);
		
		$accountSrv = new AccountService($dp);
		$account = $accountSrv->getByFbId($_SESSION[FB_UID]); 
		
		if(is_null($account) || is_null($ptn) || $account->id != $ptn->info->accountid) {
			$error = array();
			$error[] = NOT_AUTHORIZE;
			$_SESSION[ERROR] = $error;
			Flight::redirect('/error');
			
		}
		
		if(!is_null($ptn)) {
			$_SESSION[CURRENT_EDIT] = $ptn;
			$json = json_encode(Common::convertPattern($ptn));
			$para = array (
						'title' => "Step3",
						'data' => $json, 
						'rowNum' => $ptn->info->columnsize, 
						'id' => $ptn->info->id,
						'patternTitle' => $ptn->info->title,
						'updateTime' => $ptn->info->update_date
					);
			
			Flight::render('./views/edit.php', $para);
		}
	});
	
	// Search
	Flight::route ('/search', function() {
		$param = '';
		$offset = 0;
		$page = 1;
		if(isset($_GET['title'])){
			$param =  $_GET['title'];
		}
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}

		if (!Validator::isNumber($page) || $page < 1) {
			$page = 1;
		}
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$limit = 10;
		$offset = ($page -1) * $limit;

		$rs = $patternSrv->search($param, $limit, $offset);
		$totalPage = ceil($rs['count']/$limit);
		$nextPage = -1;
		if($totalPage > $page) {
			$nextPage = $page + 1;
		}
		Flight::render('./views/search.php', array('title' => Common::getTitle($param . " | Tìm kiếm") , 'searchResult'=>$rs['data'], 'param' => $param, 'nextPage'=>$nextPage, 'count'=>$rs['count']));
	});
	
	// FB handler
	Flight::route ('/fb/login', function() {
		//echo 'FB login';
		FacebookSession::setDefaultApplication(FBID, FBS);
		
		$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);
		$session = null;
		try {
			$session = $helper->getSessionFromRedirect();
		} catch(Exception $ex) {
			// When validation fails or other local issues
			PLog::log($ex);
		}
		
		if (!is_null($session)) {
		
			// Get fb information
			$userProfile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
		
			$fbName = $userProfile->getName();
			$fbId = $userProfile->getId();

			// Get account from database
			$db = DP::getInstant();
			$accountSrv = new AccountService($db);
			$account = $accountSrv->getByFbId($fbId);
			
			// Insert into database If account not exist
			if(is_null($account)){
				$account = new Account();
				$account->fbId = $fbId;
				$account->fbName = $fbName;
				$accountSrv->insert($account);
			}
			
			$_SESSION[FB_TOKEN] = $session->getToken();
			$_SESSION[FB_UID] = $fbId;
		}
		
		// Redirect to specified page
		if(isset($_SESSION['PREV_URL1'])) {
			$url = $_SESSION['PREV_URL1'];
			$_SESSION['PREV_URL1'] = null;
			Flight::redirect($url);
		}
		
		if(isset($_SESSION['PREV_URL'])){
			Flight::redirect($_SESSION['PREV_URL']);
		} else {
			Flight::redirect('/');
		}
	});
	
	// Page info
	Flight::route ('/info', function() {
		Flight::render('./views/info.php', array('title' => "Thông tin"));
	});
	
	// Page contact
	Flight::route ('/contact', function() {
		Flight::render('./views/contact.php', array('title' => "Liên hệ"));
	});
	
	//====================================================
	
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
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$api = new PatternApi($patternSrv);
		$rs = $api->newPatternStep2($_POST);
		echo json_encode($rs);
	});
	
	// Search
	Flight::route ('/api/pattern/search', function() {
		$param = '';
		$offset = 0;
		$page = 1;
		if(isset($_POST['title'])){
			$param =  $_POST['title'];
		}
		if(isset($_POST['page'])){
			$page = $_POST['page'];
		}

		if (!Validator::isNumber($page) || $page < 1) {
			$page = 1;
		}
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$limit = 10;
		$offset = ($page -1) * $limit;

		$rs = $patternSrv->search($param, $limit, $offset);
		$totalPage = ceil($rs['count']/$limit);
		$nextPage = -1;
		if($totalPage > $page) {
			$nextPage = $page + 1;
		}
		
		$rs ['title'] = $param;
		$rs['nextPage'] = $nextPage;
		echo json_encode($rs);
	});
	
	// Edit
	Flight::route ('/api/pattern/edit', function() {
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$api = new PatternApi($patternSrv);
		$rs = $api->edit($_POST);
// 		PLog::log($rs);
		echo json_encode($rs);
	});
	
	// Global var
	Flight::route ('/api/globalvar', function() {
		$name = $_POST['name'];
		$value = $_POST['value'];
		if($name == 'PREV_URL') {
			$_SESSION[$name] = $value;
			echo Flight::get('PREV_URL');
		}
	});
	
	// Global var
	Flight::route ('/api/checkToken', function() {
		
		$valid = 1;
		
		// Check parameter
		$token = null;
		if(isset($_POST['token'])){
			$token = $_POST['token'];
		}
		
		if(is_null($token)){
			$valid = 0;
			echo $valid;
			return;
		}
		
		FacebookSession::setDefaultApplication(FBID, FBS);
		$session = new FacebookSession($token);
		try {
			$session->validate();
			$valid = 1;
		} catch (Exception $ex) {
			$valid = 0;
		}
		
		if($valid == 1) {
			// Get fb information
			$userProfile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
			$fbId = $userProfile->getId();
			
			// Session
			$_SESSION[FB_TOKEN] = $token;
			$_SESSION[FB_UID] = $fbId;
		} else {
			$_SESSION[FB_TOKEN] = null;
			$_SESSION[FB_UID] = null;
		}
		
		echo 'token '.$_SESSION[FB_TOKEN];
		echo $valid;
	});
	
	// Error page
	Flight::route ('/error', function() {
		$error = [];
		if(isset($_SESSION[ERROR])){
			$error = $_SESSION[ERROR];
			$_SESSION[ERROR] = null;
		} else {
			$error[] = SYSTEM_ERROR;
		}
		Flight::render('./views/error.php', array('title' => Common::getTitle('Lỗi'), 'error' => $error));
	
	});
	
	
	// Update like, view, report of pattern
	Flight::route ('/api/view', function() {
		$type = $_POST['type'];
		$url = $_POST['url'];
		$db = DP::getInstant();
		$patternSrv = new PatternService($db);
		$id = explode('/', $url)[2];
// 		PLog::log(explode('/', $url));
// 		return;

		switch ($type){
			case '0':
				//updateView
					$patternSrv->updateView($id, 1);
				break;
			case '1':
				// report
					$patternSrv->report($id, 1);
				break;
			case '2':
				// view
				echo 2;
				break;
			case '3':
				// report
				echo 3;
				break;
		}
	});
	
	// 404 not found Handling
	Flight::map('notFound', function(){
		$error = array();
		$error[] =  ERROR_404;
		$_SESSION[ERROR] = $error;
		Flight::redirect('/error');
	});
	// Error Handling
// 	Flight::map('error', function(Exception $ex){
// 		// Handle error
		
// 		$error = array();
// 		$error[] = SYSTEM_ERROR;
// 		if(OUT_ERROR) {
// 			$error[] = '<pre>'.$ex->getTraceAsString().'</pre>';
// 		}
		
// 		$_SESSION[ERROR] = $error;
// 		Flight::redirect('/error');
// 	});

		Flight::route ('/create', function() {
// 			echo 'create';
// 			$db = DP::getInstant();
// 			$patternDao= new PatternDao($db);
// 			$ptn = new Pattern();
// 			for($i = 0; $i< 10000000; $i++) {
// 				$ptn->title = 'title ' . $i;
				
// 				$ptn->accountid = 1;
// 				$ptn->columnsize = 2;
// 				$ptn->tag = 'tag';
// 				$patternDao->insert($ptn);
// // 				echo $i .'<br>';
// 			}
			
			
		});
		
	Flight::start();
?>