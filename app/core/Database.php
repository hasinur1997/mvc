<?php 

class Database
{
	private $host = 'localhost';

	private $dbname = 'jobsite';

	private $user = 'root';

	private $password = '';

	private static $instance = null;

	public function __construct()
	{
		try{

			new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);

			echo "Conected";

		}catch(PDOException $e){

			$e->getMessage();
		}
	}


	public static function getInstance()
	{
		if(!isset(self::$instance)){

			self::$instance = new Database;
		}

		return self::$instance;
	}
}