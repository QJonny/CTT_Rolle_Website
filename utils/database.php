<?php

class DatabaseManager
{
	public function Connect($db_config)
	{
		// on se connecte à MySQL
		$this->db = new mysqli($db_config->host, $db_config->username, $db_config->password, $db_config->db_name);

		// check connection
		if ($this->db->connect_error) {
			trigger_error('Database connection failed: '  . $this->db->connect_error, E_USER_ERROR);
		}
	}


	public function ApplyQuery($query)
	{
		if(!is_null($this->response))
		{
			$this->response->free();
		}

		$this->response = $this->db->query($query);
 
		if($this->response === false) {
			trigger_error('Wrong SQL: ' . $query . ' Error: ' . $this->db->error, E_USER_ERROR);
		}
		else 
		{
			$this->response->data_seek(0);
		}
	}

	public function ApplyCommand($query)
	{
		$this->db->query($query);
	}

	
	public function GetNext()
	{
		return $this->response->fetch_assoc();
	}

	public function Close()
	{
	  $this->db->close();
	}

	private $db;
	private $response;
}

?>
