<?php
ini_set ( "display_errors", true );

print_r ( $_POST );
class jobappliedController extends common {
	
	public function displayView()
	{
	  $this->loadView('jobapplied.php');
	}
	public function save() {
		if (isset ( $_POST )) {
			echo '<pre>';
			print_r ( $_POST );
			 $jobid =  	$_POST ['job1'];
    			$userid	=	$_POST ['user1']; 
    			$jobid3	=	$_POST ['job3'] ;
    			$userid3=       $_POST ['user3'] ;
    			$jobid2	=	$_POST ['job2'] ;
    			$userid2=	$_POST ['user2'] ;
    					
		
	
			$arrInfo       =array("jobid"=>$jobid ,"userid"=>$userid);
			
		        $arrInfo2       =array("jobid"=>$jobid2 ,"userid"=>$userid2);
			$arrInfo3      =array("jobid"=>$jobid3 ,"userid"=>$userid3);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $jobid;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'jobapplied',$methodName[0] , $arrInfo );
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'jobapplied', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'jobapplied', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
		
				
		
				
			
		}
	}
}

?>
