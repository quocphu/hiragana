<?php
	require 'config/config.properties';
	
	if(!isset($_FILES['upload_field'])) {
		return;
	}
	
	$type = $_FILES['upload_field']['type'];
	$size = $_FILES['upload_field']['size'];
	$tmpName = $_FILES['upload_field']['tmp_name'];
	$rs = array('valid'=>1);
	// Check mimetype 
	if(strcmp($type ,'text/csv') != 0 && strcmp($type ,'text/plain') != 0) {
		//error here
		$rs['valid'] = 0;
		$rs['error']= 'File type';
	// Check size
	} elseif($size > MAX_FILE_SIZE) { 
		$rs['valid'] = 0;
		$rs['error'] = 'File size';
	// Check data
	} else {
		$fh = fopen($tmpName,'r');
		$count = 0;
		$data = '';
		while ($line = fgets($fh)) {
			if(trim($line) == ''){
				continue;
			}
			$data = $data.$line;
			$count++;
			if($count > MAX_FILE_ROW_NUM) {
				break;
			}
		}
		fclose($fh);
		
		if($count > MAX_FILE_ROW_NUM) {
			$rs['valid'] = 0;
			$rs['error']= 'row number';
		} else {
			$rs['valid'] = 1;
			$rs['data'] = $data;
		}
	}
	
	echo json_encode($rs);

?>
