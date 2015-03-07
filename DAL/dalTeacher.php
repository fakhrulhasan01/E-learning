<?php
	class Teacher extends DB{
		public $Id;
		public $Name;
		public $Email;
		public $Password;
		public $Country;
		public $Address;
		public $Gender;
		public $DesignationId;
		public $DepartmentId;
		public $CourseId;
		public $Picture;
		public $Verification;

		public function Insert() {
		$this->Connect();
		$sql = "insert into teacher 
		(name, email, password, country, address, gender, designationid, departmentid, picture, verification)
								values(
										'".MS($this->Name)."',
										'".MS($this->Email)."',
										'".MS($this->Password)."',
										'".MS($this->Country)."',
										'".MS($this->Address)."',
										'".MS($this->Gender)."',
										'".MS($this->DesignationId)."',
										'".MS($this->DepartmentId)."',
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
			$sql = "update teacher
						set
							name = '".MS($this->Name)."',							
							email = '".MS($this->Email)."',
							password = '".MS($this->Password)."',
							country = '".MS($this->Country)."',
							address = '".MS($this->Address)."',
							designationid = '".MS($this->DesignationId)."',
							departmentid = '".MS($this->DepartmentId)."',
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
		

		

		public function Login()
		{
			$this->Connect();
			$sql = "select * from teacher 
								where
									email = '".MS($this->Email)."' AND
									password = '".MS($this->Password)."'";
			$sql = mysql_query($sql);
			if(mysql_num_rows($sql) > 0) {
				while($d = mysql_fetch_row($sql)) {
					$this->Id = $d[0];
					$this->Verification=$d[10];
					return true;
				}				
			}	
			return false;						
		}

		
		
		public function Delete() {
			$this->Connect();
			$sql = "delete from teacher
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
			$sql = "select * from teacher where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Name= $d[1];
				$this->Email = $d[2];
				$this->Password=$d[3];
				$this->Country=$d[4];
				$this->Address=$d[5];
				$this->Gender=$d[6];
				$this->DesignationId=$d[7];
				$this->DepartmentId=$d[8];
				$this->Picture=$d[9];
				$this->Verification = $d[10];
			}
		}	
		
		public function SelectByEmail() {
			$this->Connect();
			$sql = "select * from teacher where email = '".MS($this->Email)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Id = $d[0];
				$this->Name= $d[1];
				$this->Email = $d[2];
				$this->Password=$d[3];
				$this->Country=$d[4];
				$this->Address=$d[5];
				$this->Gender=$d[6];
				$this->DesignationId=$d[7];
				$this->DepartmentId=$d[8];
				$this->Picture=$d[9];
				$this->Verification = $d[10];
			}
		}	
		
		public function SelectByVerification() {
			$this->Connect();
			$sql = "select * from teacher where verification = '".MS($this->Verification)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Id = $d[0];
				$this->Name = $d[1];
				$this->Email = $d[2];
				$this->Password=$d[3];
				$this->Country=$d[4];
				$this->Address=$d[5];
				$this->Gender=$d[6];
				$this->DesignationId=$d[7];
				$this->DepartmentId=$d[8];
				$this->Picture=$d[9];
				$this->Verification=$d[10];
			}
		}	
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select * from teacher where id = id";
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
		
		
	
		
		
		
	}

?>