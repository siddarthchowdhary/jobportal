<?php 
class princehomeController extends common {
	 public function load(){
		$var=$_POST['abc'];
		$arr=array("name"=>"prince");
		$this->loadView('princehomeview.php',$arr);
		}
          }
?>
