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
	
	private function checkNewPatternStep1(){
		
	}
	
	public function newPatternStep1(){
		
	}
}
?>