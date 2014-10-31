<?php


class PatternService {
	private $patternDao;
	private $patternDetailDao;
	private $patternHeaderDao;
	private $dp;
	
	public function __construct($dp) {
		$this->patternDao = new PatternDao ( $dp );
		$this->patternDetailDao = new PatternDetailDao($dp);
		$this->patternHeaderDao = new PatternColumnDao ( $dp );
		$this->dp = $dp;
	}
	/**
	 * Get pattern by Id
	 * @param string $id
	 * @param bool $detail
	 * @return PatternDto
	 */
	public function getById($id, $detail = false){
		$result = new PatternDto();
		
		$info = $this->patternDao->getById($id);
		
		if($info == null) {
			return null;
		}
		
		$result->info = $info;
		
		if($detail){
			$header = $this->patternHeaderDao->getByPatternId($id);
			$data = $this->patternDetailDao->getByPatternId($id);
			$result->header=$header;
			$result->data=$data;		
		}

		return $result;
	}
	/**
	 * Insert pattern
	 * @param PatternDto $pattern
	 * @return number
	 */
	public function insert($pattern){
		$patternId = -1;
		try {
			$this->dp->getDB ()->beginTransaction ();
			
			// Change tag of pattern (all column name)
			$tag = '';
			foreach ( $pattern->header as $key => $column ) {
				$tag .= $column->header . ' ';
			}
			// Insert pattern;
			$pattern->info->tag = $tag;
			$patternId = $this->patternDao->insert ( $pattern->info );
			$columnIdArr = array ();
			
			foreach ( $pattern->header as $key => $column ) {
				$column->patternid = $patternId;
				$columnId = $this->patternHeaderDao->insert ( $column );
				$columnIdArr [] = $columnId;
			}
			
			for($i = 0; $i < count ( $pattern->data ); $i ++) {
				$detail = $pattern->data [$i];
				
				$detail->patternid = $patternId;
				
				$detail->columnid = $columnIdArr [($i % $pattern->info->columnsize)];
				$this->patternDetailDao->insert ( $detail );
			}
			
			$this->dp->getDB()->commit();
		} catch ( Exception $ex ) {
			// Something went wrong rollback!
			$this->dp->getDB ()->rollBack ();
			Plog::log($ex->getMessage ());
		}
		return $patternId;
	}
	
	/**
	 * Search by title or tab
	 * @param String $title Data search
	 * @param Number $limit Number of result
	 * @param Number $offset 
	 * @return multitype: all->count all row(no limit), data->current data(limit)
	 */
	public function search($title, $limit, $offset){
		$count =  $this->patternDao->searchCount($title);
		if($count <= $offset){
			$data = [];
		}else {
			$data = $this->patternDao->search($title, $limit, $offset, "id");
		}
		return ["count"=>$count, "data"=>$data];
	}
	
	/**
	 * Search by title or tab
	 * @param String $title Data search
	 * @param Number $limit Number of result
	 * @param Number $offset
	 * @return multitype: all->count all row(no limit), data->current data(limit)
	 */
	public function searchNew($title){
		$data = $this->patternDao->search($title, 3, 0, "create_date", "desc");
		return $data;
	}
	
	/**
	 * Update pattern
	 * @param PatternDto $ptn
	 * @return Number: > 0 : ok, = 0 : fail, < 0 : data input is same current data
	 */
	public function update($ptn, $old) {
		$updated = 0;
		$isUpdPattern = false;
		$isUpdHeader = false;
		$isUpdDetail = false;
		$headerUpd = [];
		$detailIns = [];
		$detailUpd = [];
		$detailDel = [];
		
		// Compare title
		if($ptn->info->title != $old->info->title){
			$isUpdPattern = true;
		}
		
		// Compare header
		for($i = 0; $i < $ptn->info->columnsize; $i++){
			if($ptn->header[$i]->header != $old->header[$i]->header){
				$headerUpd[] = $i;
				$isUpdHeader = true;
			}
		}
		
		// Compare data
		if(count($ptn->data) > count($old->data)){
			for($i = 0; $i < count($ptn->data); $i++) {
				if($i > count($old->data)) {
					$detailIns[] = $i;
				} else {
					if($ptn->data[$i]->value != $old->data[$i]->value) {
						$detailUpd[] = $i;
					}
				}
			}
			
		} else {
			for($i = 0; $i < count($old->data); $i++) {
				if($i > count($ptn->data)) {
					$detailDel[] =$i;
					$isUpdDetail = true;
				} else {
					if($ptn->data[$i]->value != $old->data[$i]->value) {
						
						$detailUpd[] = $i;
						$isUpdDetail = true;
					}
				}
			}
		}
		// Update database
		if($isUpdPattern || $isUpdHeader || $isUpdDetail) {
			try{
				$this->dp->getDB ()->beginTransaction ();
				// Update pattern
				$updated = $this->patternDao->update($ptn->info);
				if($updated != 0) {
					// Update header
					for($i = 0; $i < count($headerUpd); $i++) {
						$this->patternHeaderDao->update($ptn->header[$headerUpd[$i]]);
					}
				
					// Delete detail
					for($i = 0; $i < count($detailDel); $i++) {
						$this->patternDetailDao->delete($old->data[$detailDel[$i]]->id);
					}
				
					// Update detail
					for($i = 0; $i < count($detailUpd); $i++) {
						 $old->data[$detailUpd[$i]]->value = $ptn->data[$detailUpd[$i]]->value;
						$this->patternDetailDao->update($old->data[$detailUpd[$i]]);
					}
				
					// Insert detail
					for($i = 0; $i < count($detailIns); $i++) {
						$this->patternDetailDao->insert($ptn->data[$detailIns[$i]]);
					}
				}
				
				$this->dp->getDB()->commit();
				$updated = 1;
			}catch (Exception $ex){
				$this->dp->getDB()->rollBack();
				$updated = 0;
				PLog::log($ex);
			}
		} else {
			$updated = -1;
		}	
		
		return $updated;
	}
	
	/**
	 * Check pattern is created by user
	 * @param Number $patternId
	 * @param Number $fbId
	 * @return Number 0 --> no, 1 --> yes
	 */
	public function checkAccountPattern($patternId, $fbId) {
		$ptn = $this->patternDao->getById($patternId);
		$accountSrv = new AccountService($this->dp);
		$account = $accountSrv->getByFbId($fbId);
		
		if(is_null($ptn) || is_null($account)) {
			return 0;
		}
		
		if($ptn->accountid == $account->id){
			return 1;
		}

		return 0;
	}
	
	// Update views value
	public function updateView($id, $count) {
		return $this->patternDao->updateView($id, $count);
	}
	
	// Update views value
	public function report($id, $count) {
		return $this->patternDao->report($id, $count);
	}
}
?>