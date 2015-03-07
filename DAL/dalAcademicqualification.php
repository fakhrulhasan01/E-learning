<?php
	class AcademicQualification extends DB{
		public $StudentId;
		public $ExamTitleId;
		public $InstituteName;
		public $PassingYear;
		public $Result;
		
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into academicqualification (studentid, examtitleid, institutename, passingyear, result)
								values(
										'".MS($this->StudentId)."',
										'".MS($this->ExamTitleId)."',
										'".MS($this->InstituteName)."',
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
			$sql = "update academicqualification
						set
							studentid = '".MS($this->StudentId)."',
							examtitleid = '".MS($this->ExamTitleId)."',
							institutename = '".MS($this->InstituteName)."',
							passingyear = '".MS($this->PassingYear)."',
							result = '".MS($this->Result)."'
						where
							studentid = '".MS($this->StudentId)."' AND
							examtitleid = '".MS($this->ExamTitleId)."'";
							
							echo $sql;
							
							
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from academicqualification
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
			$sql = "select * from academicqualification where	studentid = '".MS($this->StudentId)."' AND examtitleid = '".MS($this->ExamTitleId)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->ExamTitleId = $d[1];
				$this->InstituteName = $d[2];	
				$this->PassingYear = $d[3];
				$this->Result = $d[4];	
			}
		}	
		
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select a.examtitleid, e.name, a.institutename, a.result, a.passingyear
						from academicqualification as a, 
							 examtitle as e							 
						where 
							a.examtitleid = e.id";
			if($this->StudentId != ""){
				$sql .= " AND a.studentid = '".$this->StudentId."'";
			}
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		
		
	
		
	}

?>