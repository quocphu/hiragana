<?php 

class AccountService {
	private $accountDao;
	private $dp;
	
	public function __construct($dp) {
		$this->accountDao = new AccountDao ( $dp );
		$this->dp = $dp;
	}
	
	function getByFbId($fbId){
		return $this->accountDao->getByFbId($fbId);
	}
	
	function getById($fbId){
		return $this->accountDao->getById($fbId);
	}
	
	function insert($account) {
		return $this->accountDao->insert($account);
	}
}
?>