<?php
	class Student extends DB{
		public $Id;
		public $Name;
		public $Email;
		public $Password;
		public $FatherName;
		public $MotherName;
		public $Gender;
		public $Country;
		public $Address;
		public $JoinDate;
		public $DOB;
		public $CourseId;
		public $TeacherId;
		public $Picture;
		public $Verification;

		public function Insert() {
		$this->Connect();
		$sql = "insert into student (name, email, password, fathername, mothername, gender, country, address, joindate, dob, courseid, teacherid, picture, verification)
								values(
										'".MS($this->Name)."',
										'".MS($this->Email)."',
										'".MS($this->Password)."',
										'".MS($this->FatherName)."',
										'".MS($this->MotherName)."',
										'".MS($this->Gender)."',
										'".MS($this->Country)."',
										'".MS($this->Address)."',
										'".MS($this->JoinDate)."',
										'".MS($this->DOB)."',
										'".MS($this->CourseId)."',
										'".MS($this->TeacherId)."',
										'".MS($this->Picture)."',
										'".MS($this->Verification)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update student
						set
							name = '".MS($this->Name)."',							
							email = '".MS($this->Email)."',
							password = '".MS($this->Password)."',
							fathername = '".MS($this->FatherName)."',
							mothername = '".MS($this->MotherName)."',
							gender = '".MS($this->Gender)."',
							country = '".MS($this->Country)."',
							address = '".MS($this->Address)."',
							joindate = '".MS($this->JoinDate)."',
							dob = '".MS($this->DOB)."',
							courseid = '".MS($this->CourseId)."',
							teacherid = '".MS($this->TeacherId)."',
							picture = '".MS($this->Picture)."',
							verification = '".MS($this->Verification)."'
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
			$sql = "delete from student
						where
						      id = '".MS($this->Id)."'";
			if(mysql_query($sql)) {
				return true;			
			}
			$this->Err = mysql_error();
			return false;			
		}
		
		public function Login(){
			$this->Connect();
			$sql = "select * from student 
								where
									email = '".MS($this->Email)."' AND
									password = '".MS($this->Password)."'";
									//echo $sql;
									$sql = mysql_query($sql);
			if(mysql_num_rows($sql) > 0) {
				while($d = mysql_fetch_row($sql)) {
					$this->Id = $d[0];
					$this->Verification = $d[14];
					return true;
				}				
			}	
			return false;						
		}

		
		public function SelectById() {
			$this->Connect();
			$sql = "select * from student where id = '".MS($this->Id)."'";
			//echo $sql;
			$sql = mysql_query($sql);
			
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->Password = $d[3];
				$this->FatherName = $d[4];
				$this->MotherName = $d[5];
				$this->Gender = $d[6];
				$this->Country = $d[7];
				$this->Address = $d[8];
				$this->JoinDate = $d[9];
				$this->DOB = $d[10];
				$this->CourseId = $d[11];
				$this->TeacherId = $d[12];
				$this->Picture = $d[13];
				$this->Verification = $d[14];
			}
		}	
		
		
		public function SelectByEmail() {
			$this->Connect();
			$sql = "select * from student where email = '".MS($this->Email)."'";
			$sql = mysql_query($sql);
			//echo $sql;
			while($d = mysql_fetch_row($sql)) {
				$this->Id = $d[0];
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->Password = $d[3];
				$this->FatherName = $d[4];
				$this->MotherName = $d[5];
				$this->Gender = $d[6];
				$this->Country = $d[7];
				$this->Address = $d[8];
				$this->JoinDate = $d[9];
				$this->DOB = $d[10];
				$this->CourseId = $d[11];
				$this->TeacherId = $d[12];
				$this->Picture = $d[13];
				$this->Verification = $d[14];
			}
		}	
		
		
		public function SelectByVerification(){
			$this->Connect();
			$sql = "select * from student where verification = '".MS($this->Verification)."'";
			$sql = mysql_query($sql);
			//echo $sql;
			while($d = mysql_fetch_row($sql)) {
				$this->Id = $d[0];
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->Password = $d[3];
				$this->FatherName = $d[4];
				$this->MotherName = $d[5];
				$this->Gender = $d[6];
				$this->Country = $d[7];
				$this->Address = $d[8];
				$this->JoinDate = $d[9];
				$this->DOB = $d[10];
				$this->CourseId = $d[11];
				$this->TeacherId = $d[12];
				$this->Picture = $d[13];
				$this->Verification = $d[14];
			}			
		}
		
		
		
		public function SelectByStatus() {
			$this->Connect();
			$sql = "select * from student where email = '".MS($this->Email)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->Password = $d[3];
				$this->FatherName = $d[4];
				$this->MotherName = $d[5];
				$this->Gender = $d[6];
				$this->Country = $d[7];
				$this->Address = $d[8];
				$this->JoinDate = $d[9];
				$this->DOB = $d[10];
				$this->CourseId = $d[11];
				$this->TeacherId = $d[12];
				$this->Picture = $d[13];
				$this->Verification = $d[14];
			}
		}
		


		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select * from student where id = id";
			if($this->Email != ""){
				$sql .= " and email = '".MS($this->Email)."'";
			}
			$sql .= " order by id desc";
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		


		
		public function CountCourseStudent(){
			$this->Connect();
			$a = "";
			$sql = "select count(id) from student where id = id";
			if($this->CourseId != ""){
				$sql .= " and courseid = '".$this->CourseId."'";
			}
			if($this->TeacherId != ""){
				$sql .= " and teacherid = '".$this->TeacherId."'";
			}
			//echo $sql;
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$this->CourseId = $d[0];
			}
		}
		
		
		

}

?>