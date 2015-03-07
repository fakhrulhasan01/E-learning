<?php
	class Blog extends DB{
		public $Id;
		public $Description;
		public $TeacherId;
		public $StudentId;
		public $Pdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into blog (description, teacherid, studentid, pdate)
								values(
										'".MS($this->Description)."',
										'".MS($this->TeacherId)."',
										'".MS($this->StudentId)."',
										'".MS($this->Pdate)."')";
								echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update blog
						set
							description = '".MS($this->Description)."',							
							teacherid='".MS($this->TeacherId)."',
							studentid='".MS($this->StudentId)."',
							pdate = '".MS($this->Pdate)."'
						where
							id = '".MS($this->Id)."'";
			//echo $sql;				
			echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from blog
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
			$sql = "select * from blog where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Description = $d[1];
				$this->TeacherId = $d[2];
				$this->StudentId = $d[3];
				$this->Pdate = $d[4];
			}
		}	
		
		
		public function Select(){
			$a = "";
			$sql = "select * from blog";
			$sql .= " order by id desc";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
	}

?>