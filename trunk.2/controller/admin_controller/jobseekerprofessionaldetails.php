
<?php
ini_set ( "display_errors", true );

print_r ( $_POST );
class jobseekerprofessionaldetailsController extends common {
      	public function displayView()
	{
	  $this->loadView('jobseekerprofessionaldetails.php');
	}
	public function save() {
		if (isset ( $_POST )) {
			echo '<pre>';
			print_r ( $_POST );
				$personalId    =$_POST['person1']; 
    				$experience    =$_POST['exp1']; 
    				$keys   =$_POST['key1']; 
    				$industry =$_POST ['indus1']; 
    				$functionaArea=$_POST['func1'];
    				$personalId2 =$_POST['person2']; 
    				$experience2  =$_POST['exp2']; 
    				$keys2 =$_POST['key2'];
    				$industry2 =$_POST['indus2']; 
    			        $functionaArea2 =$_POST['func2']; 
				$personalId3 =$_POST['person3'];
    				    
	
			$arrInfo       =array(
				'personalid'=>$personalId ,    
    				'experience'=>$experience, 
    				'keys'=>$keys ,
    				'industry'=>$industry ,
    				'functionalarea'=>$functionaArea);
			print_r($arrInfo );
		        $arrInfo2       =array(
				'personalid'=>$personalId2 ,    
    				'experience'=>$experience2, 
    				'keys'=>$keys2 ,
    				'industry'=>$industry2 ,
    				'functionalarea'=>$functionaArea2);

			$arrInfo3      =array('personalid'=>$personalId3);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $keys;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'jobseekerprofessionaldetails',$methodName[0] , $arrInfo );
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'jobseekerprofessionaldetails', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'jobseekerprofessionaldetails', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
				
				
		
			
				
				
		
				
			
		}
	}
}

?>
