<?php
	/**
	 * 
	 */
	class Database
	{
		public $con;
		function __construct()
		{
			$this->con = mysqli_connect("localhost","root","","oop");

		}
	}

	$obj = new Database();

?>