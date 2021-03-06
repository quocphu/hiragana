<?php 
class Validator{
	public static function checkLength($input, $length){
		$len = strlen($input);
		return $len===$length;
	}
	public static function checkLengthMin($input, $min){
		$len = strlen($input);
		return $len >= $min;
	}
	public static function checkLengthMax($input, $max){
		$len = strlen($input);
		return $len <= $max;
	}
	
	public static function checkLengthMinMax($input, $min, $max){
		$len = strlen($input);
		return $len <= $max && $len >= $min;
	}
	public static  function isNumber($input){
		return filter_var($input, FILTER_VALIDATE_FLOAT) || filter_var($input, FILTER_VALIDATE_INT);
	}
	public static  function isEmail($input){
		return filter_var($input, FILTER_VALIDATE_EMAIL);
	}
	public static function regex($input, $pattern){
		return filter_var($input, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$pattern)));
	}
	public static function isEmpty($input) {
		if(!isset($input) || trim($input) != "") {
			return true;
		}
		return false;
	}
	
	public static function validMessage($arg, $message) {
		for ($i = 0; $i < sizeof($arg); $i++) {
			$message = str_replace("{".$i."}", $arg[$i], $message);
		}
		return $message;
	}
	
	public static function normalize($data){
		if(!isset($data)){
			return "";
		}
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}
?>