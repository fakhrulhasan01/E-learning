<?php
	class Management extends DB{
		public $Id;
		public $Email;
		public $Password;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into management (email, password)
								values(
										'".MS($this->Email)."',
										'".MS($this->Password)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update management
						set
							email = '".MS($this->Email)."',							
							password = '".MS($this->Password)."'
						where
							id = '".MS($this->Id)."'";
			//echo $sql;				
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from management
						where
						      id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		public function Login()
		{
			$this->Connect();
			$sql = "select * from management 
								where
									email = '".MS($this->Email)."' AND
									password = '".MS($this->Password)."'";
			$sql = mysql_query($sql);
			if(mysql_num_rows($sql) > 0) {
				while($d = mysql_fetch_row($sql)) {
					$this->Id = $d[0];
					return true;
				}				
			}	
			return false;						
		}
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from management where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Email = $d[1];
				$this->Password = $d[2];
			}
		}	
		
	}

?>