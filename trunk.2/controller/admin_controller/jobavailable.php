<?php
ini_set ( "display_errors", true );

class jobavailableController extends common {
	
	public function displayView()
	{
	  $this->loadView('jobavailable.php');
	}
	public function save() {
		   if (isset ( $_POST )) {
			echo '<pre>';
			
			$nameofpost      = $_POST ['name1'];
		        $jobdescp        = $_POST ['job1'];
		        $experience      = $_POST ['exp1'];
			$salary          = $_POST ['sal1'];
		        $empid          = $_POST ['emp1'];
			$nameofpost2     = $_POST ['name2'];
		        $jobdescp2       = $_POST ['job2'];
		        $experience2     = $_POST ['exp2'];
			$salary2         = $_POST ['sal2'];
			$sal3            = $_POST ['sal3'];
	
			$arrInfo       =array("nameofpost"=>$nameofpost,"jobdescp"=>$jobdescp,"experience"=>$experience,"salary"=>$salary,"empid"=>$empid);
			print_r($arrInfo );
		        $arrInfo2       =array("nameofpost"=>$nameofpost2,"jobdescp"=>$jobdescp2,"experience"=>$experience2,"salary"=>$salary2);
			$arrInfo3      =array("salary"=>$sal3);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $jobdescp;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'jobavailable',$methodName[0] , $arrInfo );
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'jobavailable', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'jobavailable', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
				
				
		
				
			
		}
	}
}

?>
