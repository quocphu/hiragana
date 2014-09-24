<?php 
class PLog {
	public static function out($object){
		echo "<pre>";
		print_r($object);
		echo "</pre>";
	}
}
?>