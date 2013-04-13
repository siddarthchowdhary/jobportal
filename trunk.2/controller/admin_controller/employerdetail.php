<?php
ini_set ( "display_errors", true );


class employerdetailController extends common {
       	public function displayView()
	{
	  $this->loadView('employerdetail.php');
	}
	public function save() {
		 if (isset ( $_POST )) {
			echo '<pre>';
			

		        $userId		       = $_POST['user1'] ;
    			$companyId	       = $_POST['comp1'] ;
    			$contactNo	       = $_POST['num1']  ;
    			$gender	               = $_POST['gen1']  ;
    			$userId2               = $_POST['user2'] ;
    			$userId3	       = $_POST['user3'] ;
    		        $companyId2             = $_POST['comp2'] ; 
    			$contactNo2             = $_POST['num2']  ;  
    			$gender2                = $_POST['gen2']  ;  
    					
   
	
			$arrInfo       =array(
		        		'userid'=>$userId,		       
    					'companyid'=>$companyId,	       
    					'num'=>$contactNo,	       
    					'gend'=>$gender);
			print_r($arrInfo );
		        $arrInfo2       =array(
		        		'userid'=>$userId3,		       
    					'companyid'=>$companyId2,	       
    					'num'=>$contactNo2,	       
    					'gend'=>$gender2);

			$arrInfo3      =array('userid'=>$userId2,);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $userId;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'employerdetail',$methodName[0] , $arrInfo );
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'employerdetail', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'employerdetail', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
				
				
		
				
			
		}
	}
}

?>
