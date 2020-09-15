<?php

	class connection
	{

		public $hostAddress="localhost";
		public $userName="root";
		public $password="";

		public $dbcon="estore";

		public $link;
		public $sms;
		public $table;


		public function __construct()
		{
			$this->database();
		}

		public function database() 
		{
			$this->link=new mysqli($this->hostAddress,$this->userName,$this->password,$this->dbcon)
			or die("Connection Faild".$this->link->error."(".$this->link->errno.")");
			if(!$this->link)
			{
				$this->sms="Data Base Not Connected";
			}
			else
			{
				//$this->sms="Data Base Connected";
			}
		}
		public function __destruct()
		{
			$this->link->close();
		}
	}
?>