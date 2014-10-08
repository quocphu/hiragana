
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
	
	echo "Split";
	function spit($data, $separator){
		$rows =  preg_split("/\r\n|\n|\r/", $data);
		$result;
		
		for($i = 0; $i < count($rows); $i++){
			$result[] = explode( $separator, $rows[$i]);
		}
		return $result;
	}
	
	$data = "Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05
Data 01	Data 02	Data 03	Data 04	Data 05";
	//PLog::out($data);
	$out = spit($data, "\t");
	PLog::out($out);
?>