<?php

class DatabaseConfiguration
{
	function DatabaseConfiguration($host_, $username_, $password_, $db_name_)
	{
		$this->host = $host_;
		$this->username = $username_;
		$this->password = $password_;
		$this->db_name = $db_name_;
	}

	public $host;
	public $username;
	public $password;
	public $db_name;
}


class MailConfiguration
{
	function MailConfiguration($server_, $port_, $username_, $password_, $encryption_)
	{
		$this->server = $server_;
		$this->port = $port_;
		$this->username = $username_;
		$this->password = $password_;
		$this->encryption = $encryption_;
	}

	public $server;
	public $port;
	public $username;
	public $password;
	public $encryption;
}

?>
