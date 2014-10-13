<?php
require 'flight/Flight.php';
require 'libs/Smarty.class.php';
require_once 'common/Common.php';
Common::include_all('dao');
Common::include_all('dao/Pattern/');
Common::include_all('dao/PatternDetail/');
Common::include_all('dao/PatternColumn/');
Common::include_all('services/');
Common::include_all('api/');
Common::include_all('entities/');
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
	Flight::render('./views/index.php', array('title' => "trang chu"));
});

// Detail
Flight::route ('/detail/@id', function($id) {
	Flight::render('./views/detail.php', array('title' => "Detail"));
});

// Create new pattern step 1
Flight::route ('/new/1', function() {
	Flight::render('./views/new1.php', array('title' => "Step1"));
});

// Create new pattern step 2
Flight::route ('/new/2', function() {
	Flight::render('./views/new2.php', array('title' => "Step2"));
});

// Create new pattern step 3
Flight::route ('/new/3', function() {
	Flight::render('./views/new3.php', array('title' => "Step3"));
});
// API
// Api Get new pattern
Flight::route ('/api/pattern/getNew', function() {
	$db = DP::getInstant();
	$patternSrv = new PatternService($db);
	$api = new PatternApi($patternSrv);
	echo $api->getNewPattern();
});

Flight::start();
?>