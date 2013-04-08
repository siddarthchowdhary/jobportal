<?php

//@author    : Siddarth Chowdhary
//created on :  17 march 2013
//@todo - change name abc using refactor

require_once 'DBConnect.php';
class updatejobseekerModel extends DBConnect{
    /* Documentation
     * this function is used to get the personal id from personal details table
     * i/p - id of users table
     */
    public function getPersonalId($id){
		$db = $this->common();
		$data				= array();

		$data['tables']		= 'jobseeker_personal_details';
		$data['columns']	= array('jobseeker_personal_details.id');
		$data['joins']		= null;
		//Add the joins
		$data['joins'][] = array(
								'table' => 'users', 
								'conditions' => array('jobseeker_personal_details.user_id' => 'users.id')
								);
		$data['conditions']		= array('users.id' => $id);
		$result = $db->select($data);

		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			return $row['id'];
		}
	
	}
    public function validatePersonal($arrPersonal){              #add some more validations here
    /* Documentation
     * this function is used to validate the Personal details
     * i/p - Personal details array
     * o/p - Validations array is some validations failed
     */
		if (require_once 'library/serverValidation.class.php'){
			$arrValidationMessages='';
			$obj = new serverValidation();
				if ($arrPersonal['firstname']!=''){
					if(($obj->alphabeticValidation($arrPersonal['firstname']))==0){	
						$arrValidationMessages[]='Firstname is not alphabetic';
					}
				}
				if ($arrPersonal['middlename']!=''){
					if(($obj->alphabeticValidation($arrPersonal['middlename']))==0){	
						$arrValidationMessages[]='Middlename is not alphabetic';
					}
				}
				if ($arrPersonal['lastname']!=''){
					if(($obj->alphabeticValidation($arrPersonal['lastname']))==0){	
						$arrValidationMessages[]='Lastname is not alphabetic';
					}
				}
				if ($arrPersonal['dob']!=''){
					if(($obj->dateValidator($arrPersonal['dob']))==0){	
						$arrValidationMessages[]='Please Check the Date';
					}
				}
				if ($arrPersonal['phno']!=''){
					if(($obj->numericValidation($arrPersonal['phno']))==0){	
						$arrValidationMessages[]='Phone number is not numeric';
					}
				}
				if ($arrPersonal['pincode']!=''){
					if(($obj->numericValidation($arrPersonal['pincode']))==0){	
						$arrValidationMessages[]='Pincode is not numeric';
					}
				}
				
				$tempDataHolder = '';
				$tempDataHolder = $arrPersonal['paddress'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('-','',$tempDataHolder);
				$tempDataHolder = str_replace(',','',$tempDataHolder);
				$tempDataHolder = str_replace('/','',$tempDataHolder);
		
				if ($arrPersonal['paddress']!=''){
					if(($obj->alphaNumericValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='Permanent Address should be Alpha numeric only';
					}
				}
				$tempDataHolder = '';
				$tempDataHolder = $arrPersonal['caddress'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('-','',$tempDataHolder);
				$tempDataHolder = str_replace(',','',$tempDataHolder);
				$tempDataHolder = str_replace('/','',$tempDataHolder);
				
				if ($arrPersonal['caddress']!=''){
					if(($obj->alphaNumericValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='Current Address should be Alpha numeric only';
					}
				}
				$tempDataHolder = '';
				$tempDataHolder = $arrPersonal['city'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				if ($arrPersonal['city']!=''){
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='City is not alphabetic';
					}
				}
				$tempDataHolder = '';
				$tempDataHolder = $arrPersonal['state'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				if ($arrPersonal['state']!=''){
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='State is not alphabetic';
					}
				}
				$tempDataHolder = '';
				$tempDataHolder = $arrPersonal['country'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				if ($arrPersonal['country']!=''){
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='Country is not alphabetic';
					}
				}
				
		} else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
		
		return $arrValidationMessages;
    }
    
    
    /*documentation -
         *the array that has been passed conatins $firstname,$lastname,$middlename,$gender,$dob,$phno,$paddress,$caddress,$city,$state,$pincode,$country
         *of the personal details table 
         *user id is fetched from session
         *firstname is checked in personal details table for insert/update condition check
         *dataArray is prepared for final insert/update
         *then the respective query is executed on the basis of condition
    */
    public function injectPersonal($arrPersonal){
		
        $db = $this->common();
        $user_id = $_SESSION['ID_USERS_SESSION']; //id of users table
        //select query to check if firstname is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_personal_details';
		$dataS['conditions']		= array('user_id' => $user_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$firstname=$row['firstname'];
		}
		if ($arrPersonal['gender'] == 'FEMALE') {$gender='11';} else {$gender='10';}
		//$data conatins form data - will be used in insert or update
		$data = array('user_id' =>$user_id,'firstname' => $arrPersonal['firstname'],'middlename' => $arrPersonal['middlename'],
        'lastname' => $arrPersonal['lastname'],'gender' => $gender,'date_of_birth' => $arrPersonal['dob'],
        'permanent_address' => $arrPersonal['paddress'],'current_address' => $arrPersonal['caddress'], 
        'current_city' => $arrPersonal['city'],'current_state' => $arrPersonal['state'],'country'=>$arrPersonal['country'],
        'pincode' =>$arrPersonal['pincode'],'contact_number'=>$arrPersonal['phno']);
		if($firstname==''){
				//insert query
				$result = $db->insert('jobseeker_personal_details', $data);            //first arg is tablename and second is data in the array
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			$where = array('user_id' => $user_id);			
			$result = $db->update('jobseeker_personal_details', $data, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		        
    }
    /* Documentation
     * this function is used to validate the Educational details
     * i/p - Educational details array
     * o/p - Validations array is some validations failed
     */    
    public function validateEducational($arrEducational){   
		if (require_once 'library/serverValidation.class.php'){
			
			$arrValidationMessages='';
			$obj = new serverValidation();	
			
				if ($arrEducational['post_graduation_degree']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrEducational['post_graduation_degree'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('.','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='Post Grad is not alphabetic';
					}
				}
				
				if ($arrEducational['PhD']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrEducational['PhD'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('.','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='Phd is not alphabetic';
					}
				}
				
				if ($arrEducational['other_degree']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrEducational['other_degree'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('.','',$tempDataHolder);
				$tempDataHolder = str_replace('(','',$tempDataHolder);
				$tempDataHolder = str_replace(')','',$tempDataHolder);
				$tempDataHolder = str_replace('-','',$tempDataHolder);
				$tempDataHolder = str_replace('/','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$arrValidationMessages[]='please check other qualifications';
					}
				}
				
		} else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
        return $arrValidationMessages;
	}
	
	/*documentation -
         *the array that has been passed conatins all the details of the educational_details table
         * we have checked if graduation is empty,if it is insert query is executed else update query
    */
	public function injectEducational($arrEducational){
        
        
        $db = $this->common();
        $personal_id = $arrEducational['personal_id']; //id of users table
        #select query to check if graduation is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_educational_details';
		$dataS['conditions']		= array('personal_id' => $personal_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$graduation_degree=$row['graduation_degree'];
		}
		
		if($graduation_degree==''){
				//insert query
				$result = $db->insert('jobseeker_educational_details', $arrEducational);            //first arg is tablename and second is data in the array
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_educational_details', $arrEducational, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		     
    }
    /* Documentation
     * this function is used to validate the Professional details
     * i/p - Professional details array
     * o/p - Validations array is some validations failed
     */
    public function validateProfessional($arrProfessional){   
		if (require_once 'library/serverValidation.class.php'){
			$arrValidationMessages='';
			$obj = new serverValidation();	
			
			if ($arrProfessional['experience']!=''){      #apply validation only if some values are passed to us
				if(($obj->numericValidation($arrProfessional['experience']))==0){	
						$arrValidationMessages[]='Experience should be in no of years only';
				}
			}
			
			if ($arrProfessional['keyskills']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrProfessional['keyskills'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace(',','',$tempDataHolder);
				if(($obj->alphabeticValidation($tempDataHolder))==0){	
					$arrValidationMessages[]='Keyskills is not alphabetic';
				}
			}
			if ($arrProfessional['functional_area']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrProfessional['functional_area'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace(',','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
					$arrValidationMessages[]='Functional Area is not alphabetic';
				}
			}
		 } else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
        return $arrValidationMessages;
	}
		/*documentation -
         *the array that has been passed conatins all the details of the educational_details table
         * we have checked if experience is empty,if it is insert query is executed else update query
         */
	public function injectProfessional($arrProfessional){
        $db = $this->common();
        $personal_id = $arrProfessional['personal_id']; //id of users table
        //select query to check if graduation is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_professional_details';
		$dataS['conditions']		= array('personal_id' => $personal_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$experience=$row['experience'];
		}
		
		if($experience==''){
				//insert query
				$result = $db->insert('jobseeker_professional_details', $arrProfessional);            //first arg is tablename and second is data in the array
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_professional_details', $arrProfessional, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		     
        
    }
    /*Documentation
     * find the extension of the file that is passed as arguement
     * */
    public function findexts ($filename) 
	 {  
		 $filename = strtolower($filename) ; 
		 $exts = split("[/\\.]", $filename) ; 
		 $n = count($exts)-1; 
		 $exts = $exts[$n];
		 //echo $exts;die("model"); 
		 return $exts; 
	 } 
	 
	/*Documentation
     * store the extension of the file that is passed as arguement with thepersonal details array.
     * */
     
	 public function storeExtension($arrInfo)
	 {
		$db = $this->common();
		$data				= array();

		$data['tables']		= 'jobseeker_resume';
		$data['columns']	= array('extension');
									
		$data['joins']		= null;
		//join 1
		$data['joins'][] = array(
			'table' => 'jobseeker_personal_details', 
			'conditions' => array('jobseeker_resume.personal_id' =>'jobseeker_personal_details.id')
		);
		//join 2
		$data['joins'][] = array(
			'table' => 'users', 
			'conditions' => array('jobseeker_personal_details.user_id' =>'users.id')
		);
		$data['conditions']		= array('users.id' => $arrInfo['id']);
		$result = $db->select($data);
		$ext_db='';
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$ext_db=$row['extension'];
		}
		$personal_id =$this->getPersonalId($arrInfo['id']); 
		if ($ext_db) {
			$values=array("extension"=>$arrInfo['extension']);
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_resume', $values, $where);
			if ($result){
					return true;
			} else {
					return false;
			}
			
		} else {
			$values=array("extension"=>$arrInfo['extension'],"personal_id"=>$personal_id);
			$result = $db->insert('jobseeker_resume', $values);
			if ($result){
					return true;
			} else {
					return false;
			}
		} 
	 }
}
?>
