<?php
class mysql_config {
	var $link;
	var $dbConfig = array(
					  'hostname' => NULL,
					  'username' => NULL,
					  'password' => NULL,
					  'database' => NULL,
					  'charecter_set' => NULL);
	function setHostname($value) {
		$this->dbConfig['hostname'] = $value;
		return $this->dbConfig['hostname'];
	}
	function setUsername($value) {
		$this->dbConfig['username'] = $value;
		return $this->dbConfig['username'];
	}
	function setPassword($value) {
		$this->dbConfig['password'] = $value;
		return $this->dbConfig['password'];		
	}
	function setDatabase($value) {
		$this->dbConfig['database'] = $value;
		return $this->dbConfig['database'];
	}
	function setCharecterSet($value) {
		$this->dbConfig['charecter_set'] = $value;
		return $this->dbConfig['charecter_set'];
	}	
	function getConnection() {
		return $link = mysql_connect($this->dbConfig['hostname'], 
									 $this->dbConfig['username'], 
									 $this->dbConfig['password']);
	}
}
?>