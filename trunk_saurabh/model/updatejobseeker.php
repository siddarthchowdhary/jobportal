<?php

//@author    : Siddarth Chowdhary
//created on :  17 march 2013
//@todo - make return false comment uncomment in two validate()

require_once 'DBConnect.php';
class updatejobseekerModel extends DBConnect{
    
    public function __construct() {
        
    }
    
    /*public function common(){
		$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}*/
    
    
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
		//print_r($row);die("i am here");
		return $row['id'];
		}
	
	}
    public function validatePersonal($arrPersonal){              //add some more validations here
		if (require_once 'library/serverValidation.class.php'){
			$obj = new serverValidation();
			//echo"<pre>in validate method<br>";print_r($arrPersonal);
				if(($obj->lengthValidator($arrPersonal['firstname'],1))==0){	
					echo "<br>Firstname is required"; 
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['lastname'],1))==0){	
					echo "<br>Lastname is required"; 
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['gender'],1))==0){	
					echo "<br>Gender is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['phno'],10))==0){	
					//echo "<br>Phone number should be less than 10 digits"; 
					//return false;
				}
				//echo " , i am here with a problem";              //put right validation in validation class
				if(($obj->lengthValidator($arrPersonal['paddress'],1))==0){	
					echo "<br>Permanent Address is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['caddress'],1))==0){	
					echo "<br>Current Address is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['city'],1))==0){	
					echo "<br>City is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['state'],1))==0){	
					echo "<br>State is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['pincode'],1))==0){	
					echo "<br>Pincode is required";
					//return false;
				}
				if(($obj->lengthValidator($arrPersonal['country'],1))==0){	
					echo "<br>Country is required";
					//return false;
				}
				
		} else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
		//echo"<pre>out of validate method here<br>";
        return true;
    }
    
    public function injectPersonal($arrPersonal){
		/*documentation -
         *the array that has been passed conatins $firstname,$lastname,$middlename,$gender,$dob,$phno,$paddress,$caddress,$city,$state,$pincode,$country
         *of the personal details table 
         *user id is fetched from session
         *firstname is checked in personal details table for insert/update condition check
         *dataArray is prepared for final insert/update
         *then the respective query is executed on the basis of condition
         */
        //print_r($arrPersonal);die("here");
        $db = $this->common();
        $user_id = $_SESSION['ID_USERS_SESSION']; //id of users table
        
        
        //select query to check if firstname is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_personal_details';
		$dataS['conditions']		= array('user_id' => $user_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		//print_r($row); 
		$firstname=$row['firstname'];
		}
		if ($arrPersonal['gender'] == 'FEMALE') {$gender='11';} else {$gender='10';}
		//echo  "hi".$firstname;die("here");		
		//$data conatins form data - will be used in insert or update
		$data = array('user_id' =>$user_id,'firstname' => $arrPersonal['firstname'],'middlename' => $arrPersonal['middlename'],
        'lastname' => $arrPersonal['lastname'],'gender' => $gender,'date_of_birth' => $arrPersonal['dob'],
        'permanent_address' => $arrPersonal['paddress'],'current_address' => $arrPersonal['caddress'], 
        'current_city' => $arrPersonal['city'],'current_state' => $arrPersonal['state'],'country'=>$arrPersonal['country'],
        'pincode' =>$arrPersonal['pincode'],'contact_number'=>$arrPersonal['phno']);
        //print_r($data);die("here");
        
		if($firstname==''){
				//echo "insert query executed , make this comment";
				//insert query
				$result = $db->insert('jobseeker_personal_details', $data);            //first arg is tablename and second is data in the array
				//print 'Created row '. $db->lastInsertId(). ' in the table "jobseeker_personal_details"<br /> change message';
				
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			//echo "update query executed , make this comment";
			$where = array('user_id' => $user_id);			
			$result = $db->update('jobseeker_personal_details', $data, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		        
    }
    
    public function validateEducational($arrEducational){   
		//echo "from model <br> validate method<pre>";print_r($arrEducational);
		if (require_once 'library/serverValidation.class.php'){
			$obj = new serverValidation();
			//print_r($arrEducational);die();
				if(($obj->lengthValidator($arrEducational['highest_degree'],1))==0){	
					echo "<br>Highest Degree is required"; 
					//return false;
				}
				if(($obj->lengthValidator($arrEducational['graduation_degree'],1))==0){	
					echo "<br>Graduation Degree is required"; 
					//return false;
				}
				
		} else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
        return true;
	}
	
	public function injectEducational($arrEducational){
        
        /*documentation -
         *the array that has been passed conatins all the details of the educational_details table
         * we have checked if graduation is empty,if it is insert query is executed else update query
         */
        //echo "<br><br>now insert into db here inject educational<br><pre>";
        //print_r($arrEducational);
        $db = $this->common();
        $personal_id = $arrEducational['personal_id']; //id of users table
        //select query to check if graduation is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_educational_details';
		$dataS['conditions']		= array('personal_id' => $personal_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		//print_r($row); 
		$graduation_degree=$row['graduation_degree'];
		}
		
		if($graduation_degree==''){
				//echo "insert query executed , make this comment";
				//insert query
				$result = $db->insert('jobseeker_educational_details', $arrEducational);            //first arg is tablename and second is data in the array
				//print 'Created row '. $db->lastInsertId(). ' in the table "jobseeker_educational_details"<br /> change message';
				
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			//echo "update query executed , make this comment";
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_educational_details', $arrEducational, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		     
    }
    
    public function validateProfessional($arrProfessional){   
		//echo "from model <br> validate method<pre>";print_r($arrProfessional);
		if (require_once 'library/serverValidation.class.php'){
			$obj = new serverValidation();
			//print_r($arrEducational);die();
				if(($obj->lengthValidator($arrProfessional['experience'],1))==0){	
					echo "<br>Experience is required if fresher enter 0 years"; 
					//return false;
				}
		 } else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
        return true;
	}
	
	public function injectProfessional($arrProfessional){
        /*documentation -
         *the array that has been passed conatins all the details of the educational_details table
         * we have checked if experience is empty,if it is insert query is executed else update query
         */
        
        //echo "<br>inject method<pre>";print_r($arrProfessional);die("here");
        $db = $this->common();
        $personal_id = $arrProfessional['personal_id']; //id of users table
        //select query to check if graduation is empty
		$dataS				= array();
		$dataS['tables']		= 'jobseeker_professional_details';
		$dataS['conditions']		= array('personal_id' => $personal_id);
		$result = $db->select($dataS);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		//print_r($row);die("here"); 
		$experience=$row['experience'];
		}
		
		if($experience==''){
				//echo "insert query executed , make this comment";
				//insert query
				$result = $db->insert('jobseeker_professional_details', $arrProfessional);            //first arg is tablename and second is data in the array
				//print 'Created row '. $db->lastInsertId(). ' in the table "jobseeker_professional_details"<br /> change message';
				
				if ($result){
					return true;
				} else {
					return false;
				}
		}
		
		else{
			//echo "update query executed , make this comment";
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_professional_details', $arrProfessional, $where);
			if ($result){
					return true;
			} else {
					return false;
				}
		}		     
        
    }
    
    public function findexts ($filename) 
	 {  
		 $filename = strtolower($filename) ; 
		 $exts = split("[/\\.]", $filename) ; 
		 $n = count($exts)-1; 
		 $exts = $exts[$n];
		 //echo $exts;die("model"); 
		 return $exts; 
	 } 
	 
	 
	 public function storeExtension($arrInfo)
	 {
		//~ echo $id;die("here");
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
		//~ print_r($result);die("i am here");
		$ext_db='';
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		//~ print_r($row);die("here"); 
		$ext_db=$row['extension'];
		}
		$personal_id =$this->getPersonalId($arrInfo['id']); //echo $personal_id;die("i am here");
		if ($ext_db) {
			//~ echo 'update' ;die;
			$values=array("extension"=>$arrInfo['extension']);
			$where = array('personal_id' => $personal_id);			
			$result = $db->update('jobseeker_resume', $values, $where);
			if ($result){
					return true;
			} else {
					return false;
			}
			
		} else {
			//~ echo 'insert';die;
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
