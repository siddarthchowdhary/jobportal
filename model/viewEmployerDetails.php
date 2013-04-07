<?php
class viewEmployerDetailsModel
{
	public function common(){
		$config='';
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
		
	}

	public function display_data()
	{	
		$db = $this->common();
		$data				= array();
		
		$data['tables']		= 'employer_details';
		$data['columns']	= array('employer_details.id','users.displayname',
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
		$data['conditions']		= array('users.id' => $_SESSION['SESS_ID']);
		$result = $db->select($data);
		return $result->fetch(PDO::FETCH_ASSOC);	
	}
}
?>
