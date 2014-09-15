<?php
require 'flight/Flight.php';
require 'libs/Smarty.class.php';

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

Flight::route('/', function(){
	$name='phu';
	Flight::render('index_content.php',array('title' => "trang chu"));
});

Flight::route('/home/', function(){
	$name='phu';
	Flight::render('home_content.php',array('title' => "trang chu"));
});

Flight::route('/@name/@id', function($name, $id){
    Flight::render('hello.php', array('name' => $name));
});
Flight::start();
?>