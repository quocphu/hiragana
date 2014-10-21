<?php

class PatternApi {
	private $service;
	public function __construct($service){
		$this->service = $service;
	}
	public function getNewPattern() {
		$jsonData = [ 
				"result" => "FAIL" 
		];
		try {
			$rs = $this->service->searchNew ( "" );
			$jsonData = [ 
					"result" => "OK",
					"data" => $rs 
			];
		} catch ( Exception $ex ) {
			PLog::log ( $ex );
		}
		return json_encode ( $jsonData );
	}
	
	// Check data when create new pattern
	private function checkStep1($data) {
		$title = Validator::normalize($data["title"]);
		$columnNumber = $data["column_number"];
		$column1 = $data["column1"];
		$column2 = $data["column2"];
		$column3 = $data["column3"];
		$column4 = $data["column4"];
		$column5 = $data["column5"];

		$valid = 1;
		$result["valid"] = $valid;
		
		// Check title
		if(!Validator::checkLengthMinMax($title, 5, 200)) {
			Validator::validMessage(array(5, 200), TITLE_LENGTH);
			$result["title"]=Validator::validMessage(array(5, 200), TITLE_LENGTH);
			$valid = 0;
		}
		
		if(!Validator::isNumber($columnNumber)){
			$result["column_number"] = COLUMN_NUMBER_TYPE;
			$valid = 0;
		} else if(!($columnNumber >= 2 && $columnNumber <= 5)){
			$result["column_number"] = COLUMN_NUMBER_VALUE;
			$valid = 0;
		}
		
		if($valid == 0) {
			$result["valid"] = $valid;
			return $result;
		}
		
		$columnTitleLength = array(1, 50);
		
		// Check column1
		if(!Validator::checkLengthMinMax($column1, 1, 50)) {
			Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$result["column1"] = Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$valid = 0;
		}
		
		// Check column2
		if(!Validator::checkLengthMinMax($column2, 1, 50)) {
			Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$result["column2"] = Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$valid = 0;
		}
		
		// Check column3
		if($columnNumber > 2 && !Validator::checkLengthMinMax($column3, 1, 50)) {
			Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$result["column3"] = Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$valid = 0;
		}
		
		// Check column4
		if($columnNumber > 3 && !Validator::checkLengthMinMax($column4, 1, 50)) {
			Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$result["column4"] = Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$valid = 0;
		}
		
		// Check column5
		if($columnNumber > 4 && !Validator::checkLengthMinMax($column5, 1, 50)) {
			Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$result["column5"] = Validator::validMessage($columnTitleLength, COLUMN_TITLE_LENGTH);
			$valid = 0;
		}
		
		$result["valid"] = $valid;
		
		return $result;
	}

	public function newPatternStep1($data) {
		if($this->checkStep1($data)["valid"] == 0) {
			return $this->checkStep1($data);
		} else {
			// Set session
			
			$patternDto = new PatternDto();
			
			// Set author information
			$info = new Pattern();
			$info->accountid = '1';
			$info->columnsize = $data['column_number'];
			$info->title = $data['title'];
			
					
			// Set column header data
			$header = array();
			for($i = 0; $i < $data['column_number']; $i++){
				$column = new PatternColumn();
				$column->header = $data['column'.($i+1)];
				$column->priority = $i;
				$header[] = $column;
			}
			
			$patternDto->info = $info;
			$patternDto->header = $header;
// 			$patternDto->data = [$header];
			
			$_SESSION[STEP1] = $patternDto;
			
			$result["valid"] = 1;
			return $result;
		}
	}
	
	public function newPatternStep2($data) {
		$size = $data['columnSize'];
		$rowNum = (count($data)-2) / $size;
		$error = array();
		$detail = array();
		$result = array();
		$valid = 1;
		
		for($i = 0; $i < $rowNum; $i++){
			for($j = 0 ; $j < $size; $j++) {
				$name = 'column'.$i.$j;
				$val = $data['column'.$i.$j];
				// Data length
				if(!Validator::checkLengthMinMax($val, MIN_COLUMN_DATA_LENGTH, MAX_COLUMN_DATA_LENGTH)){
					$error[$name] = "length";
					$valid = 0;
				}else{
					$columnDetail = new PatternDetail();
					$columnDetail->value = Validator::normalize($val);
					$columnDetail->priority = $j;
					$detail[] = $columnDetail;
				}
			}
		
		}

		if ($valid == 1) {
			$pattern = $_SESSION[STEP1];
			$pattern->data = $detail;
			$_SESSION[STEP1] = $pattern;
		}
		
		$result['valid'] = $valid;
		$result['error'] = $error;
		return $result;
	}
}
?>