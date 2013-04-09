<?php
class employerDetailsModel
{
		public function getDatabaseHandler()
		{
			$config='';
			require_once 'library/pdo/pdo_config.php';
			//Include the CXPDO Class
			require_once('library/pdo/cxpdo.php');
			
			//Create/GET the instance - pass the config values
			$db = dbclass::instance($config);
			return $db;
		}
		
		function updateDetails($dataFromUser)
		{
			//return $dataFromUser;
			$errMsg=array();
			if (require_once 'library/serverValidation.class.php')
			{
				$obj = new serverValidation();
				$tempDataHolder = '';
				$tempDataHolder = str_replace(' ','',$dataFromUser['displayName']);
				if(($obj->alphabeticValidation($tempDataHolder))==0)
					$errMsg[]='First name or last name should be alphabetic only.';
			
				if(($obj->emailValidation($dataFromUser['email']))==0)
					$errMsg[]='Email is not correct.';
			
				$tempDataHolder = str_replace(' ','',$dataFromUser['companyName']);
				if(($obj->alphabeticValidation($tempDataHolder))==0)	
					$errMsg[]='Company name should be alphabetic only.';
			
				$tempDataHolder = str_replace('-','',$dataFromUser['contactNumber']);
				if(($obj->numericValidation($tempDataHolder))==0)	
					$errMsg[]='Contact Number should be numeric only.';	
			}
			else
			{
				$errMsg[]="File not found";
			}
			//return $errMsg;
			if(empty($errMsg))
			{		
				session_start();
				//echo "<pre>";print_r($dataFromUser);die();//</pre>
				$data = array(
						"displayname"=>$dataFromUser['displayName'],
						"email"=>$dataFromUser['email']
						);
				$where = array("id"=>$_SESSION['ID_USERS_SESSION']);
				$db = $this->getDatabaseHandler();
			
				$result = $db->update('users',$data,$where);
			
				$data = array();
				$data['tables']='company_details';
				$data['conditions']=array("company_name"=>$dataFromUser['companyName']);
				$data['columns']=array('company_details.id');
				$result=$db->select($data);
				$companyId = $result->fetch(PDO::FETCH_NUM);
				//print_r($companyId);die();
				$data = array(
						"contact_number"=>$dataFromUser['contactNumber'],
						"gender"=>$dataFromUser['gender'],
						"company_id"=>$companyId[0]
						);
				$where = array("user_id"=>$_SESSION['ID_USERS_SESSION']);
				$result = $db->update('employer_details',$data,$where);
				
				if ($result)
					return 1;
				else
					return 0;
				//var_dump($result);die("here in updateDetails employerDetailsModel");
			}
			else
			{
				$errString='';
				foreach ($errMsg as $key => $val) 
				{
					$errString .= $val.'  ';
				}
				return $errString;
			}
		
			
		}
			
			
		/*function fetchAll()
		{
			//$_SESSION['id']=3;
			
			session_start();
			//$_SESSION['SESS_ID']=7;
			$db = $this->getDatabaseHandler();
			$data				= array();
			$data['tables']		= 'employer_details';
			$data['columns']	= array('users.displayname','company_details.company_name',
								'employer_details.contact_number','employer_details.gender',
								'users.email',
								);
			$data['joins']		= null;
			//Add the joins
			$data['joins'][] = array(
								'table' => 'users', 
								'conditions' => array('employer_details.user_id' => 'users.id')
								);
			$data['joins'][] = array(
								'table' => 'company_details', 
								'conditions' => array('employer_details.company_id' => 'company_details.id')
								);
			$data['conditions']		= array('users.id' => $_SESSION['EMAIL_SESSION']);
			$result = $db->select($data);
			$db->queryString;die("here22");
			return $result->fetch(PDO::FETCH_ASSOC);
		}
		*/
		function fetchAll()
		{
		
			//db queries to retrieve personal details of the job seeker with id
			$db = $this->getDatabaseHandler();
			session_start();
			$data				= array();
		
			$data['tables']		= 'employer_details';
			$data['columns']	= array('employer_details.id','users.displayname',
									'users.email',
									'company_details.company_name',
									'employer_details.contact_number','employer_details.gender',
									);
			$data['joins']		= null;
			//Add the joins
			$data['joins'][] = array(
									'table' => 'users', 
									'conditions' => array('employer_details.user_id' => 'users.id')
									);
			
			$data['joins'][] = array(
									'table' => 'company_details', 
									'conditions' => array('employer_details.company_id' => 'company_details.id')
									);
			$data['conditions']		= array('users.id' => $_SESSION['ID_USERS_SESSION']);
			$result = $db->select($data);
			return $result->fetch(PDO::FETCH_ASSOC);
		}
}

?>
