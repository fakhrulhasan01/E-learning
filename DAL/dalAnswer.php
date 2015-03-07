<?php
	class Answer extends DB{
		public $QuestionId;
		public $StudentId;
		public $Answer;
		public $Marks;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into answer (questionid, studentid, answer)
								values(
									    '".MS($this->QuestionId)."',
										'".MS($this->StudentId)."',
										'".MS($this->Answer)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update answer
						set
							questionid = '".MS($this->QuestionId)."',
							studentid = '".MS($this->StudentId)."',
							answer = '".MS($this->Answer)."',
							marks = '".MS($this->Marks)."'
						where
							questionid = '".MS($this->QuestionId)."'
							and
							studentid = '".MS($this->StudentId)."'";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from answer
						where
						      questionid = '".MS($this->QuestionId)."'
							  and
							  studentid = '".MS($this->StudentId)."'";
			if(mysql_query($sql)){
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}
		

		
		public function SelectById(){
			$this->Connect();
			$sql = "select * from answer where questionid = '".MS($this->QuestionId)."'";
			if($this->StudentId != ""){
				$sql .= " and studentid = '".MS($this->StudentId)."'";
			}
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->QuestionId = $d[0];
				$this->StudentId=$d[1];
				$this->Answer = $d[2];
				$this->Marks = $d[3];
			}
		}	
		
				
/*		
		public function SelectQuestionByCourse(){
			$this->Connect();
			$a = "";
		  	$sql = "select question.id, course.id, teacher.id, question.question, teacher.name, course.name
					from question, teacher, course, student
					where
					question.teacherid = teacher.id
					and 
					question.courseid = course.id
					and
					student.courseid = course.id
					and
					student.id = '".$_SESSION['sid']."'
					and
					student.teacherid = teacher.id";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;

		}
		
		public function SelectAnswerByStudent(){
			$this->Connect();
			$a = "";
			$sql = "select answer from answer
					where 
					questionid = '".$_GET['id']."'
					and
					studentid = '".$_SESSION['sid']."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}*/
		
		
		
		public function Select(){
			$a = "";
			$this->Connect();
			$sql = "select question.id, student.id, question.question, answer.answer, question.mark, student.name, answer.marks
				from question, answer, student
				where
				answer.questionid = question.id
				and 
				answer.studentid = student.id";
				if(MS($this->QuestionId) > 0){
				$sql .= " and answer.questionid = '".MS($this->QuestionId)."'";
				}if(MS($this->StudentId != "")){
					$sql .= " and answer.studentid = '".MS($this->StudentId)."'";
				}
				$sql .= " order by question.id desc";
				$sql = mysql_query($sql);
				while($d = mysql_fetch_row($sql)){
						$a[] = $d;
				}
			return $a;
		}
		
		public function SelectMarks(){
			$this->Connect();
			$sql = "select sum(marks) from answer where studentid = '".MS($this->StudentId)."'";
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$this->Marks = $d[0];
			}
			
		}
		
		
	}

?>