<?php
class Common {
	public static function include_all($folder) {
		foreach ( glob ( "{$folder}/*.php" ) as $filename ) {
			require_once $filename;
		}
	}
	
	// Pattern to simple array structure 
	public static function convertPattern($pattern) {
		$ptnDto = array();
// 		$ptnDto['header'] = $pattern->header;
		$ptnDto['info'] = $pattern->info;
		$ptnDto['data'] = array();
		
		// Header
		for ($i = 0; $i < count($pattern->header); $i++) {
			$ptnDto['header'][] = $pattern->header[$i]->header;
		}
		
		// Data
		$limit =  count($pattern->data) / $pattern->info->columnsize;
		for ($i = 0; $i < $limit; $i++) {
			$tmp = array();
			for($j = 0; $j < $pattern->info->columnsize; $j++) {
				$tmp[] = $pattern->data[$i * $pattern->info->columnsize + $j]->value;
			}
			$ptnDto['data'][] = $tmp;
		}
		return $ptnDto;
	}
	
	public static function getTitle($title) {
		return $title. ' | ' . UI_TITLE ;
	}
	
}
?>