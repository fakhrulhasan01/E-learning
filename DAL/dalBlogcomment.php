<?php
	class BlogComment extends DB{
		public $Id;
		public $Description;
		public $BlogId;
		public $TeacherId;
		public $StudentId;
		public $Cdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into blogcomment (description, blogid, teacherid, studentid, cdate)
								values(
										'".MS($this->Description)."',
										'".MS($this->BlogId)."',
										'".MS($this->TeacherId)."',
										'".MS($this->StudentId)."',
										'".MS($this->Cdate)."')";
								//echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update blogcomment
						set
							description = '".MS($this->Description)."',							
							blogid = '".MS($this->BlogId)."',
							teacherid = '".MS($this->TeacherId)."',
							studentid = '".MS($this->StudentId)."',
							cdate = '".MS($this->Cdate)."'
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
			$sql = "delete from blogcomment
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
			$sql = "select * from blogcomment where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Description = $d[1];
				$this->BlogId= $d[2];
				$this->TeacherId = $d[3];
				$this->StudentId = $d[4];
				$this->Cdate = $d[5];
			}
		}	
		
		
		public function Select(){
			$a = "";
			$sql = "select * from blogcomment where id = id";
			if($this->BlogId != ""){
				$sql .= " and blogid = '".$this->BlogId."'";
			}
			$sql .= " order by id desc";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
	}

?>