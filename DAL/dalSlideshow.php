<?php
	class SlideShow extends DB{
		public $Id;
		public $Images;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into slideshow (images)
								values('".MS($this->Images)."')";
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update slideshow
						set							
							images = '".MS($this->Images)."'
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
			$sql = "delete from slideshow
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
			$sql = "select * from slideshow where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Images= $d[1];
			}
		}	
		
		public function Select(){
			$this->Connect();
			$a = "";
			$sql = "select * from slideshow";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}



		
	}

?>