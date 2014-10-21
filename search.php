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
	
	$db = DP::getInstant();
	
	$title = "test";
	$patternSrv = new PatternService($db);
// 	$rs = $patternSrv->search($title, 2, 1);
	$rs = $patternSrv->searchNew("");
	$jsonData = ["result" => "OK", "count"];
	PLog::out(json_encode($rs));
?>