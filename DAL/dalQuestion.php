<?php
	class Question extends DB{
		public $Id;
		public $Question;
		public $Mark;
		public $CourseId;
		public $TeacherId;
		public $FromDate;
		public $ToDate;
		
		
		public function Insert() {
			$this->Connect();
			$sql = "INSERT INTO question(question, mark, courseid, teacherid, fromdate, todate) 
															VALUES 
													('".MS($this->Question)."', 
													 '".MS($this->Mark)."', 
													 '".MS($this->CourseId)."', 
													 '".MS($this->TeacherId)."', 
													 '".MS($this->FromDate)."', 
													 '".MS($this->ToDate)."')";
									echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update question
						set
							question = '".MS($this->Question)."',							
							mark = '".MS($this->Mark)."',							
							courseid = '".MS($this->CourseId)."',							
							teacherid = '".MS($this->TeacherId)."',
							fromdate = '".MS($this->FromDate)."',
							todate = '".MS($this->ToDate)."'
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
			$sql = "delete from question
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
			$sql = "select * from question where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Question = $d[1];
				$this->Mark = $d[2];
				$this->CourseId = $d[3];
				$this->TeacherId = $d[4];
				$this->FromDate = $d[5];
				$this->ToDate = $d[6];
			}
		}	
		
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select question.id, question.question, course.name, question.mark, teacher.name, question.fromdate, question.todate 
					from 
					question, course, teacher
					where 
					question.courseid = course.id
					and question.teacherid = teacher.id";
					
				if($this->TeacherId > 0){
					$sql .= " and teacher.id = '".MS($this->TeacherId)."'";
				}
				if($this->CourseId > 0){
					$sql .= " and course.id = '".MS($this->CourseId)."'";
				}
				if($this->FromDate != ""){
					$sql .= " and fromdate < now() and todate > now()";
				}
				$sql .= " order by question.id desc";
				//echo $sql;
				$sql = mysql_query($sql);
				while($d = mysql_fetch_row($sql)){
					$a[] = $d;
			}
			return $a;	
		}
		
		
		
		
		
		public function SelectMark(){
			$this->Connect();
			$a = "";
			$sql = "select mark from question where courseid = '".MS($this->CourseId)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$this->Mark = $d[0];
			}
			return $a;
		}
		
/*		public function SelectTotalMarksTeacher(){
			$this->Connect();
//			$a = "";
			$sql = "select sum(mark) from question where courseid = '".MS($this->CourseId)."' and teacherid = '".MS($this->TeacherId)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				return $d[0];
			}
		}
*/		
		
	}

?>