<?php
require_once 'DBConnect.php';
class registerjobseekerModel extends DBConnect
{
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
			//echo "Could not find validate data page (class) at server , Please try again !";
			//die();
			return 0;
		}
        
	}
		
		
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
/*
 public function validateEducational($arrEducational){   
		if (require_once 'library/serverValidation.class.php'){
			
			$abc='';
			$obj = new serverValidation();	
			
				if ($arrEducational['post_graduation_degree']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrEducational['post_graduation_degree'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('.','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$abc[]='Post Grad is not alphabetic';
					}
				}
				
				if ($arrEducational['PhD']!=''){       #apply validation only if some values are passed to us
				$tempDataHolder = '';
				$tempDataHolder = $arrEducational['PhD'];
				$tempDataHolder = str_replace(' ','',$tempDataHolder);
				$tempDataHolder = str_replace('.','',$tempDataHolder);
					if(($obj->alphabeticValidation($tempDataHolder))==0){	
						$abc[]='Phd is not alphabetic';
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
						$abc[]='please check other qualifications';
					}
				}
				
		} else {
			echo "Could not find validate data page (class) at server , Please try again !";
			die();
		}
        return $abc;
	}
 */
?>
