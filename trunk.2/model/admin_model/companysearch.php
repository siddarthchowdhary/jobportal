<?php
class companysearchModel
{
	
	 function getDatabaseHandler()
    	  {
   	
        include 'library/pdo/pdo_config.php';
  	include 'library/pdo/cxpdo.php';
        $db = dbclass::instance($config);
	return $db;
       
   	 }
				
				
	public function search($data1=array())
     	 {
					
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="company_details";
       
	   
	$data['conditions']=array("company_name"=>$data1['location']);
		
        $data['columns'] = array(
                                "company_details.company_name",
                                "company_details.city",
				"jobs_available.name_of_post",
			        "jobs_available.job_description",
                                );

            $data['tables']    = 'company_details';
           
            $data['joins']    = null;
        
            $data['joins'][] = array(
                                'table' => 'jobs_available',
                                'type'=>'inner',
                                'conditions' => array(
                                    'company_details.id' => 'jobs_available.employer_id')
                                );
	$result = $db->select($data);
		
	        $tmp='';
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	
		   $tmp[]=$row;
                }
               	return $tmp;
   	 }
	
   }
?>
