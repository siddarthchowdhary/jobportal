<?php
/*
   PDO databases class
   date : 9-3-13


*/
ini_set("display_errors", "1");
require_once '../config/constants.php';
class DBConnection 
{

	private static $instance;
	private static $_host	= DB_HOST;
	private static $_user	= DB_USER;
	private static $_password	= DB_PASSWORD;
	private static $_database	= DB_DATABASE;
	private $_tableName		= "";
	private $_join 		    = "";
	private $_where 		= "";
	private $_having 		= "";
	private $_between 		= "";
	private $_orderBy 		= "";
	private $_groupBy 		= "";
	private $_keys 		    = array();
	private $_values 		= array();
	private $_insertId;
	private $_errorLog 		= "";
	private $_query 		= "";
	private $_result 		= "";

	# connect to database
	
	public static function connect() 
	{
		if (is_null(DBConnection::$instance)) {
	
			$db = new PDO("mysql:host=localhost; dbname=job_portal", self::$_user, self::$_password);
			if ($db) {
				
				self::$instance = new DBConnection();
				echo "db connected";
			}
		}
		return self::$instance;
	}
	
	# checks is connection is valid 
	
	private function validConnection()
	{
		if (is_null(DBConnection::$instance)) {
			echo "Could not connected!";
			exit();
		}
	}
	public function Fields($data = array()) 
	{
		$count = count($data);
		if ($count > 0) {
	
			foreach ($data as $key => $value) {
	
				if (!empty($value)) {
					$this->_keys[] = $key;
					$this->_values[] = $value;
				}
			}
		}
		return $this;
	}
	public function insert($tableName="",$data=array())
	{
		if($tableName=="")
			$this->
	
	}
	public function select()
	{
		
	}
}




?>
