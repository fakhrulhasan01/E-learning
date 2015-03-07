<?php
	class CourseTeacher extends DB{
		public $TeacherId;
		public $CourseId;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into courseteacher (teacherid, courseid)
								values('".MS($this->TeacherId)."',
										'".MS($this->CourseId)."')";
								echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update courseteacher
						set							
							teacherid = '".MS($this->TeacherId)."',
							courseid = '".MS($this->CourseID)."'
						where
							teacherid = '".MS($this->TeacherId)."',
							courseid = '".MS($this->CourseID)."'";
			//echo $sql;				
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		

		public function Delete() {
			$this->Connect();
			$sql = "delete from courseteacher
						where
							teacherid = '".MS($this->TeacherId)."' AND 
							courseid = '".MS($this->CourseId)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}
		

		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from courseteacher 
								where 
							teacherid = '".MS($this->TeacherId)."' and
							courseid = '".MS($this->CourseID)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->TeacherId = $d[0];
				$this->CourseId = $d[1];
			}
		}	
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select courseteacher.teacherid, courseteacher.courseid, course.name, teacher.name
								from 
								courseteacher, course, teacher
								where
								courseteacher.courseid = course.id 
								and 
								courseteacher.teacherid = teacher.id";
			if($this->TeacherId != ""){
				$sql .= " and courseteacher.teacherid = '".$this->TeacherId."'";
			}
			if($this->CourseId != ""){
			    $sql .= " and courseteacher.courseid = '".$this->CourseId."'";
			}
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		



}

?>