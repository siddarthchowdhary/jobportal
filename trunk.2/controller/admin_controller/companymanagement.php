<?php
ini_set ( "display_errors", true );
require_once(PRINCE_LANG);
class companymanagementController extends common {

	public function displayView(){
	  $this->loadView('companymanagementadmin.php');
        }
        
	public function save() {
                   if (isset ( $_POST )) {
		       $opr=$_POST['txtActionValue'];
			
			if(isset($_POST ['company_name1'])){
			$var="/^[a-zA-Z]+$/";
			if(preg_match($var,$_POST ['company_name1'])){
			    $companyName1=$_POST ['company_name1'];
			  }else{
			  	 	echo NO_CORRECT_VALUE_MSG;
					return false;
			  	    }
                   }
			  	
			  	
			  
		        $companyName2 = $_POST ['company_name2'];
		        $companyName3 = $_POST ['company_name3'];
			$website       = $_POST ['website'];
			$website2       = $_POST ['website2'];
			$industrytype   = $_POST ['industry_type'];
			$industrytype2  = $_POST ['industry_type2'];
			$keyFuntionalArea = $_POST ['key_functional_area'];
			$status         = $_POST ['status'];
		        $keyFuntionalArea2 = $_POST ['key_functional_area2'];
			$creationalDate = $_POST ['creational_date'];
			$city           = $_POST ['city'];
			$city2          = $_POST ['city2'];
			$country        = $_POST ['country'];
			
			
			
		
			$methodName = array("dbinsert","dbdelete","dbupdate");
		        $arrInfo = array ("companyName" => $companyName1,
				   "website"   =>$website,
				   "indus"     =>$industrytype,
				   "fuc"       =>$keyFuntionalArea,
				   "stau"      =>$status,
				   "ctdate"    =>$creationalDate,
				   "city"      =>$city,
				   "con"       =>$country);
			$arrInfo2 = array (
				    "companyName"    => $companyName3,
                                    "website"        =>$website2,
	   			    "indus"          =>$industrytype2,
				    "fuc"            =>$keyFuntionalArea2,
				    "city"           =>$city2);
                       $arrInfo3 = array("companyName"=>$companyName2);
			
		         
		
			
			
			if($opr == 1){
				
				$boolResu = $this->loadModel ( 'companymanagement',$methodName[0] , $arrInfo );
				echo $boolResu;
		        
			}elseif($opr == 2){
				$boolResu = $this->loadModel ( 'companymanagement', $methodName[1], $arrInfo3 );

			}elseif($opr == 3){
				$boolResu = $this->loadModel ( 'companymanagement', $methodName[2], $arrInfo2 );

			}else{
			 echo "msg";
			}
		
		
	          }
	        }	
	      }

?>














