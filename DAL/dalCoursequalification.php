<?php
	class CourseQualification extends DB{
		public $StudentId;
		public $ExamTitleId;
		public $PassingYear;
		public $Result;
		
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into coursequalification (studentid, examtitleid, passingyear, result)
								values(
										'".MS($this->StudentId)."',
										'".MS($this->ExamTitleId)."',
										'".MS($this->PassingYear)."',
										'".MS($this->Result)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update coursequalification
						set
							passingyear = '".MS($this->PassingYear)."',
							result = '".MS($this->Result)."'
						where
							studentid = '".MS($this->StudentId)."' 
							AND
							examtitleid = '".MS($this->ExamTitleId)."'";
			//echo $sql;				
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from coursequalification
						where
						      studentid = '".MS($this->StudentId)."'
							  AND
							  examtitleid = '".MS($this->ExamTitleId)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from coursequalification where studentid = '".MS($this->StudentId)."'
														  AND examtitleid = '".MS($this->ExamTitleId)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->PassingYear = $d[3];
				$this->Result = $d[4];
			}
		}	
		
	}

?>