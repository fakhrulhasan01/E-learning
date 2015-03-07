<?php
	class DB{
		public $Err;
		
		protected function Connect()
		{
			mysql_connect("localhost", "root", "");
			mysql_select_db("elearning");
		}
	}
?>