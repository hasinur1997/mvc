<?php
class Model
{
	private $db;
	
	private $query;
	
	private $result;
	
	private $count;

	public function __construct()
	{
		$this->db = Database::getInstance();
	}


	public static function query($sql, $params = [])
	{
		if($this->query = $this->db->prepare($sql)){
			
			if(count($params)){
				
				$x = 1;
				
				foreach($params as $param){
					
					$this->query->bindValue($x, $param);
					
					$x++;
				}
			}
		}
		
		
		if($this->query->execute()){
			
			$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
			
			$this->count = $this->query->rowCount();
			
		}else{
			return false;
		}
	}
	
	
	
	
	public function result()
	{
		return $this->result;
	}
	
	public function count()
	{
		return $this->count;
	}
}