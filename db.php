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
	
	echo "<h1>Hello DB</h1>";
	$db = DP::getInstant();
	$srv = new AccountService($db);
	$ac = $srv->getByFbId('123123');
	PLog::log($ac);
?>