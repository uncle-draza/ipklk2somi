<?php
require_once 'db.php';

class DAO {
	private $db;

	private $STUDENTPOSTOJI="SELECT * FROM student WHERE id=?";
	private $UPDATESTUDENT="UPDATE student SET ime=?, prezime=?, brIndexa=? WHERE id=?";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getStudent($id)
	{

		
		// 2. nacin
		
		$statement = $this->db->prepare($this->STUDENTPOSTOJI);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}

	public function update($ime, $prezime, $brIndexa, $id)
	{
		
		// 2. nacin
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $brIndexa);
		$statement->bindValue(4, $id);
		
		$statement->execute();
	}


	public function getStudentById($id)
	{
		
		// 2. nacin
		$statement = $this->db->prepare($this->STUDENTPOSTOJI);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		if($result = $statement->fetch()){
			return true;
		}else{
			return false;
		}
	}
}
?>
