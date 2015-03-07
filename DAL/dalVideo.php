<?php
	class Video extends DB{
		public $Id;
		public $Title;
		public $Video;
		public $TeacherId;
		public $CourseId;
		public $Vdate;
		
		public function Insert() {
			$this->Connect();
			$sql = "insert into video (title, video, teacherid, courseid, vdate)
								values(
										'".MS($this->Title)."',									   
										'".MS($this->Video)."',
										'".MS($this->TeacherId)."',
										'".MS($this->CourseId)."',
										'".MS($this->Vdate)."')";
								//echo $sql;
			if(mysql_query($sql)) {
				return true;				
			}
			$this->Err = mysql_error();
			return false;			
		}		
		
		public function Update() {
			$this->Connect();
			$sql = "update video
						set
							title = '".MS($this->Title)."',
							video = '".MS($this->Video)."',							
							teacherid = '".MS($this->TeacherId)."',
							courseid = '".MS($this->CourseId)."',
							vdate = '".MS($this->Vdate)."'
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
			$sql = "delete from video
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
			$sql = "select * from video where id = '".MS($this->Id)."'";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)) {
				$this->Title = $d[1];
				$this->Video = $d[2];
				$this->TeacherId = $d[3];
				$this->CourseId = $d[4];
				$this->Vdate = $d[5];
			}
		}	
		
		
		public function SelectForTeacher(){
			$this->Connect();
			$a = "";
			$sql = "Select video.id, video.title, video.video, course.name, teacher.name
							from video, course, teacher
									where 
									video.teacherid = teacher.id
									and
									video.courseid = course.id
									and
									teacherid = '".MS($this->TeacherId)."'
									order by id desc";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		
		public function SelectForStudent(){
			$this->Connect();
			$a = "";
			$sql = "Select video.id, video.video, course.title, teacher.title 
							from video, teacher, course, student
								where
								video.courseid = course.id
								and 
								video.teacherid = teacher.id
								and
								video.teacherid = student.teacherid
								order by id desc";
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		public function SelectForDelete(){
			$this->Connect();
			$a = "";
			$sql = "select * from video WHERE vdate < NOW() -  INTERVAL 380 DAY order by id desc";
			
			$sql = mysql_query($sql);
			while($d = mysql_fetch_row($sql)){
				$a[] = $d;
			}
			return $a;
		}
		
		
		public function AutoDeleteVideo(){
			$this->Connect();
			$sql = "delete from video WHERE vdate < NOW() - interval 380 day";
			if(mysql_query($sql)){
				return true;
			}
			$this->Err = mysql_error();
			return false;
		}
		
		
		
	}

?>