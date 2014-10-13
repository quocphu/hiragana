<?php
class Common {
	public static function include_all($folder) {
		foreach ( glob ( "{$folder}/*.php" ) as $filename ) {
			include $filename;
		}
	}
}
?>