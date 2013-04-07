<?php
class updateEmployerDetailsModel
{
		function fetchDetails($dataFromUser)
		{
			
		}
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
		function fetchAll()
		{
			//$_SESSION['id']=3;
			
			session_start();
			//$_SESSION['SESS_ID']=7;
			$db = $this->getDatabaseHandler();
			$data				= array();
			$data['tables']		= 'employer_details';
			$data['columns']	= array('users.displayname','company_details.company_name',
								'employer_details.contact_number','employer_details.gender','users.email',
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
}
?>
