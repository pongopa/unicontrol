<?php
class DATABASE_CONFIG {

    public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'unicon',
		'password' => 'unicon',
		'database' => 'unicon',
	);
	public $test = array(
		'datasource' => 'Database/Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
	);


	function __construct() {
		/*$server = env('HTTP_HOST');
		if ($server == 'localhost:8091') {
			$this->default   = $this->local;
		} else {
			$this->default = $this->default;
		}*/

		$this->default = $this->default;
	} //fin _construct

    function DATABASE_CONFIG() {
		$this->__construct();
	}
}
