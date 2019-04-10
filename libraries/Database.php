<?php
class Database{
	public $host=DB_HOST;
	public $username=DB_USER;
	public $password=DB_PASS;
	Public $db_name=DB_NAME;
	
	public $link;
	public $error;
	//Parameterize constructor
	public function __construct()
	{
		$this->connect();
	}
	
	private function connect()
	{
		$this->link=new mysqli($this->host,$this->username,$this->password,$this->db_name);
		if(!$this->link)
		{
			$this->error="connection failed :".$this->link->connect_error;
			return false;
		}
	}
	
	//Select 
	public function select($query)
	{
		$result=$this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows>0)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}
	
	//Insert 
	public function insert($query)
	{
		$insert_row=$this->link->query($query) or die($this->link->error);
		if($insert_row)
		{
			header("Location:index.php?msg=".urlencode ('Record Added'));
			exit();
		}
		else
		{
			die('Error: {'.$this->link->errno.'}'.$this->link->error);
		}
	}
	
	//update
	public function update($query)
	{
		$update_row=$this->link->query($query) or die($this->link->error);
		if($update_row)
		{
			header("Location:index.php?msg=".urlencode ('Record Updated'));
			exit();
		}
		else
		{
			die('Error: {'.$this->link->errno.'}'.$this->link->error);
		}
	}
	
	//delete
	
	public function remove($query)
	{
		$delete_row = $this->link->query($query) or die($this->link->error);
		if($delete_row)
		{
			header("Location:index.php?msg=".urlencode ('Record Deleted'));
			exit();
		}
		else
		{
			die('Error: {'.$this->link->errno.'}'.$this->link->error);
		}
	}
	
}
	?>
