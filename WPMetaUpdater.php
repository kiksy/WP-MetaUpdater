<?php

class WPMetaUpdater
{
	private $db_host     = 'localhost';
	private $db_user     = 'root';
	private $db_pass     = '';
	private $db_database = 'wordpress';
	
	 
	private $DBH;
	
	function __construct()
	{
		try
		{
			$DBH = new PDO("mysql:host=$this->db_host;dbname=$this->db_database", $this->db_user, $this->db_pass);
			$this->DBH = $DBH;
			return $DBH;
		}
		catch (PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
			return false;
		}
	}
	
	public function createStatement($id, $metaKey , $metaValue)
	{
		$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		
		$sql = "INSERT INTO wp_usermeta (umeta_id,user_id,meta_key,meta_value) VALUES (NULL,:id,:metakey,:metavalue )";
		$statement = $this->DBH->prepare($sql);
		
		$statement->execute(array(':id' => $id , ':metakey' => $metaKey , 'metavalue' => $metaValue));	
		print_r($statement->errorCode());		
	}

}

?>