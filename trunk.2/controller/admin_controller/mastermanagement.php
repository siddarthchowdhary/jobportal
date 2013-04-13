<?php

ini_set ( "display_errors", true );
require_once(PRINCE_LANG);

class mastermanagementController extends common {
    	public function displayView()
	{
	
			
		//$arr=array("search","sd");
		$boolResu = $this->loadModel ('mastermanagement',"search");
		$boolRes = $this->loadView ( 'mastermanagement.php',$boolResu);

	}
	public function save() {
	  if (isset ( $_POST )) {
			
			   
			$type=  $_POST['type1'] ;
			
			if(isset($_POST['value1'])){
			  $var="/^[a-zA-Z]+$/";
			  if(preg_match($var,$_POST['value1'])){
			    $value   =	$_POST['value1'];
			    
			  }else{
			     echo NO_CORRECT_VALUE_MSG;
				return false;
			  	}
                           }
    			//$value=	$_POST['value1']; 
    			$type3=	$_POST['type3']; 
    			$value3=$_POST['value3']; 
    			$type2=$_POST['type2']; 
    			$value2=$_POST['value2'];
		        $value4=$_POST['value4'];
			$code=$_POST['select'];  
    				 
    					
		
	
			$arrInfo       =array("select"=>$code ,"value"=>$value);
			
		    $arrInfo2       =array("type"=>$type2 ,"value"=>$value2,"newvalue"=>$value4);
			$arrInfo3      =array("type"=>$type3 ,"value"=>$value3);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $value;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'mastermanagement',$methodName[0] , $arrInfo );
			echo $boolResu;
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'mastermanagement', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'mastermanagement', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
				
				
		
				
			
		}
	}
}

