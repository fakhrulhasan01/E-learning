<?php
	class Homepage extends DB{
		public $Id;
		public $Title;
		public $Description;
		public $Picture;
		public $Location;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into homepage (title, description, picture, location)
								values(
										'".MS($this->Title)."',
										'".MS($this->Description)."',
										'".MS($this->Picture)."',
										'".MS($this->Location)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update homepage
						set
							title = '".MS($this->Title)."',
							description = '".MS($this->Description)."',
							picture = '".MS($this->Picture)."',
							location = '".MS($this->Location)."'
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
			$sql = "delete from homepage
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
			$sql = "select * from homepage where id = '".MS($this->Id)."'"; //echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Title = $d[1];
				$this->Description = $d[2];
				$this->Picture = $d[3];
				$this->Location = $d[4];
				}
		}	
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select * from homepage";
			if($this->Location == "h"){
				$sql .= " where location = '".MS($this->Location)."'";
			}else if($this->Location == "a"){
				$sql .= " where location = '".MS($this->Location)."'";
			}else if($this->Location == "noh"){
				$sql .= " where location = 'noh' or location = 'h'";
			}else{
				$sql .= " where location != 'h' and location != 'noh'";
			}
			$sql .= " order by id DESC";
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
	}

?>