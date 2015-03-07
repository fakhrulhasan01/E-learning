<?php
	class File extends DB{
		public $Id;
		public $Name;
		public $File;
		public $TeacherId;
		public $CourseId;
		public $Fdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into file (name, file, teacherid, courseid, fdate)
								values(
										'".MS($this->Name)."',									   
										'".MS($this->File)."',
										'".MS($this->TeacherId)."',
										'".MS($this->CourseId)."',
										'".MS($this->Fdate)."')";
								echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update file
						set
							name = '".MS($this->Name)."',
							file = '".MS($this->File)."',							
							teacherid = '".MS($this->TeacherId)."',
							courseid = '".MS($this->CourseId)."',
							fdate = '".MS($this->Fdate)."'
						where
							id = '".MS($this->Id)."'";
			echo $sql;				
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from file
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
			$sql = "select * from file where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->File = $d[2];
				$this->TeacherId = $d[3];
				$this->CourseId = $d[4];
				$this->Fdate = $d[5];
			}
		}	
		
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "Select file.id, file.name, file.file, course.name, teacher.name
							from file, course, teacher
									where 
									file.teacherid = teacher.id
									and
									file.courseid = course.id";
			if($this->TeacherId != ""){
				$sql .= " and file.teacherid = '".MS($this->TeacherId)."'";
			}
			if($this->CourseId != ""){
				$sql .= " and file.courseid = '".MS($this->CourseId)."'";
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
			$sql = "select * from file WHERE fdate < NOW() -  INTERVAL 380 DAY order by id desc";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		
		public function AutoDeleteFile(){
			$this->Connect();
			$sql = "delete from file WHERE fdate < NOW() - interval 380 day";
			if(mysql_query($sql)){
				return true;
			}
			$this->Err = mysql_error();
			return false;
		}
		
		
	}

?>