
<?php
class resumeSearchModel
{
	
	public function getDatabaseHandler()
	{
		require_once 'library/pdo/pdo_config.php';
		//Include the CXPDO Class
		require_once('library/pdo/cxpdo_modified.php');
		
		//Create/GET the instance - pass the config values
		$db = dbclass::instance($config);
		return $db;
	}
	
	function retrieve($arrCriteria)
	{
		//return $arrCriteria;
		$arrKeyword=explode(",",$arrCriteria['keywords']);
		//var_dump($arrCriteria['highestEducation']);die();
		$db = $this->getDatabaseHandler();
		$data = array();
		$data['columns'] = array(
								"users.id",
								"users.displayname",
								"jobseeker_educational_details.highest_degree",
								"jobseeker_professional_details.experience",
								"jobseeker_professional_details.keyskills",
								"jobseeker_professional_details.functional_area",
								"jobseeker_personal_details.gender",
								"jobseeker_personal_details.contact_number",
								);
							
			$data['tables']	= 'users';
			//join 1
			$data['joins']	= null;
		
			$data['joins'][] = array(
								'table' => 'jobseeker_personal_details', 
								'conditions' => array(
									'users.id' => 'jobseeker_personal_details.user_id')
								);
			//join 2		
			$data['joins'][] = array(
								'table' => 'jobseeker_educational_details', 
								'conditions' => array(
									'jobseeker_personal_details.id' => 'jobseeker_educational_details.personal_id')
								);
			$data['joins'][] = array(
								'table' => 'jobseeker_professional_details', 
								'conditions' => array(
									'jobseeker_personal_details.id' => 'jobseeker_professional_details.personal_id')
								);
			/*$data['joins'][] = array(
								'table' => 'master_table', 
								'conditions' => array('jobseeker_personal_details.id' => 'jobseeker_professional_details.personal_id')
								);
			
				*/				
			$arrConditions=array();
			//push where conditions in array here
			if(!empty ($arrKeyword)){
				
				foreach($arrKeyword as $value) {
					if (!empty($value)) {
						array_push($arrConditions,'jobseeker_professional_details.keyskills LIKE \'%'. $value."%' or ");
						array_push($arrConditions,'jobseeker_professional_details.functional_area LIKE \'%'. $value."%' or ");
					}
				}
			}
			
			if (!empty($arrCriteria['location'])){
				array_push($arrConditions,'jobseeker_personal_details.current_city = \'' . $arrCriteria['location'] .'\' or ');
			}
			if (!empty($arrCriteria['skill'])){
				array_push($arrConditions,'jobseeker_professional_details.keyskills = \'' . $arrCriteria['skill'] .'\' or ');
			}
			if (!empty($arrCriteria['highestEducation'])){
				array_push($arrConditions,'jobseeker_educational_details.highest_degree = \'' . $arrCriteria['highestEducation'] .'\' or ');
			}
			if (!empty($arrCriteria['experience'])){
				array_push($arrConditions,'jobseeker_professional_details.experience <= \'' . $arrCriteria['experience'] .'\' or ');
			}
			//return $arrConditions;
			//echo "<pre>";
			//print_r($arrKeyword);//die();
			
			$count=count($arrConditions);
			if($count>0){
				$arrConditions[$count-1] = rtrim($arrConditions[$count-1], " or ");
				$data['conditions']	= $arrConditions;//array(rtrim ($test[0], "" ) => $test[0]);
				//print_r($data['conditions']);die("<br>here");
				$result = $db->select($data);
				//echo 
				//return $result;//->queryString;
				$alljobs = array();
				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$alljobs[]=$row; 
				}
				//~ echo "<pre>";
				//~ print_r($alljobs);
					//~ die("i am here");
				return $alljobs;
			} else {
			 return 0;
			}
	}
}
?>
