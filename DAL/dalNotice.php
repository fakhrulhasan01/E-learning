<?php
	class Notice extends DB{
		public $Id;
		public $Name;
		public $Description;
		public $Ndate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into notice (name, description, ndate)
								values('".MS($this->Name)."',
										'".MS($this->Description)."',
										'".MS($this->Ndate)."'
											 )";
								//echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update notice
						set							
							name = '".MS($this->Name)."',
							description = '".MS($this->Description)."',
							ndate = '".MS($this->Ndate)."'
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
			$sql = "delete from notice
						where
						      id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}
		

		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from notice where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Description = $d[2];
				$this->Ndate = $d[3];
			}
		}	
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select * from notice";
			if(MS($this->Ndate) != ""){
				$sql .= " WHERE ndate > NOW() -  INTERVAL '".MS($this->Ndate)."' DAY order by id desc";
			}
			$sql .= " order by id desc";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		

		public function SelectForDelete(){
			$this->Connect();
			$a = "";
			$sql = "select * from notice WHERE ndate < NOW() -  INTERVAL 380 DAY order by id desc";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		public function AutoDeleteNotice(){
			$this->Connect();
			$sql = "delete from notice WHERE ndate < NOW() - interval 380 day";
			if(mysql_query($sql)){
				return true;
			}
			$this->Err = mysql_error();
			return false;
		}



		
	}

?>