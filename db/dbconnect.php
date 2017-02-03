<?php
class dbconnect
{
	var $dbtype = "mysql"; //type of database, can be either MYSQL, MS Access. Oracle DB or SQL
	var $dbhost = "localhost"; //it is usually localhost anytime, anyday
	var $dbuser = ""; //that is the universal username for any local server. Mind you not the same on the internet servers.
	var $dbpassword = ""; //the database password. Incase you you think it is open
	/*Database path for microsoft access files
	var $dbpath = "C:\\xampp\htdocs\works\pdotest\database.mdb";*/
	var $dbname = ""; //if you are not using access then this is the database name
	var $dbconn = ""; // connection string value
	public $db;
    
	
	public function __construct()
	{
		try
		{
			switch($this->dbtype)
			{
				case "sqlite":
					$this->dbconn="sqlite:".$this->dbpath;
					break;
					
				case "mysql":
					$this->dbconn="mysql:host=".$this->dbhost."; dbname=".$this->dbname;
					break;
					
				case "postgresql":
					$this->dbconn="postg:host=".$this->dbhost." dbname=".$this->dbname;
					break;
					
				case "odbc":
					$this->dbconn="odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=".$this->dbpath.";Uid=Admin";
					break;
			}
			
			$this->db = new PDO($this->dbconn,$this->dbuser,$this->dbpassword);
		}
		catch(PDOException $error)
		{
			$response["status"] = "error";
		    $response["message"] = 'Connection failed: ' . $e->getMessage();
		    $response["data"] = null;
		    // echo "Cannot connect. Connection failed: " . $e->getMessage();
		    // exit;
			die("There was an error connecting to database, Reason: ".$error->getMessage());
		}
	}
}

