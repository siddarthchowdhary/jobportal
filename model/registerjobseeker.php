<?php
//@fileName: registerjobseeker.php
//@className: registerjobseekerModel
//@description:this model is used to register the jobseeker.
//@author    : Siddarth Chowdhary
//created on :  15 march 2013

require_once 'DBConnect.php';
class registerjobseekerModel extends DBConnect
{
	/*Documentation
	 * i/p - array of details to be registered
	 * o/p - array of validation messages that are failed.
	 * */
	public function validate($arrValues)
	{
		if (require_once 'library/serverValidation.class.php'){
			
			$abc='';
			$obj = new serverValidation();
			
			$tempDataHolder = '';
			$tempDataHolder = $arrValues['displayname'];
			$tempDataHolder = str_replace(' ','',$tempDataHolder);
			if(($obj->alphabeticValidation($tempDataHolder))==0){	
					$abc[]='First name or last name is not alphabetic';
			}
			
			if ($arrValues['password'] != $arrValues['confirmPassword'] ) {
				$abc[]='password and confirm password are not same';
			}
			
			
			if(($obj->emailValidation($arrValues['email']))==0){	
					$abc[]='Email is not correct.';
			}
		return $abc;	
			
		} else {
			return 0;
		}
        
	}
		
	/*Documentation
	 * i/p - array of details to be inserted in the database
	 * o/p - true if inserted into db else false.
	 * */	
	public function inject($arrValues)
	{
		$db = $this->common();
		$password=md5($arrValues['password']);
		$data = array('password' => $password, 'displayname' => $arrValues['displayname'],
						'email'=>$arrValues['email'],'usertype'=>2,'creation_date'=>date('Y-m-d H:i:s'));
		$result = $db->insert('users', $data);    #first arg is tablename and second is data in the array
		if ($result){
			return true;
		} else {
			return false;
		}
	}//function  inject ends here
} //class ends here
?>
