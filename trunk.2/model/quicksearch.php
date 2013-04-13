<?php

class quicksearchModel
{
	private $Keywords;
	private $Experience;
	private $Location;
	private $Job_Category;
	private $Expected_Salary;
	private $Industries;
	private $str="";
	
	 function getDatabaseHandler()
    	  {
   	
        include 'library/pdo/pdo_config.php';
  	include 'library/pdo/cxpdo_modified.php';
        $db = dbclass::instance($config);
	return $db;
       
   	 }
				
				
	public function quicksearch($data1=array())
     	 {
					$this->Keywords=$data1['Keywords'];
					$this->Experience=$data1["Experience"];
				        $this->Location=$data1["Location"];
					$this->Job_Category=$data1["JobCategory"];
				        $this->Expected_Salary=$data1["Salary"];
					$this->Industries=$data1["Industry"];
	   
		

		
        $db = $this->getDatabaseHandler();
        $data = array();
      	
	
        $data['columns'] = array(
                                "company_details.company_name",
                                "company_details.city",
			        "jobs_available.name_of_post",
                                "jobs_available.job_category",
                                
                                );
            $data['tables']    = 'company_details';
           
            $data['joins']    = null;
        
            $data['joins'][] = array(
                                'table' => 'jobs_available',
                                'type'=>'inner',
                                'conditions' => array(
                                'company_details.id' => 'jobs_available.employer_id')
                                );
           
	  
	  $condition=array();
		array_push($condition,'company_details.key_functional_area=\''.$data1["Keywords"].'\' or ');
		array_push($condition,'jobs_available.experience_required=\''.$data1['Experience'].'\' or ');
		array_push($condition,'company_details.city=\''.$data1['Location'].'\' or ');
		array_push($condition,'jobs_available.name_of_post=\''.$data1['JobCategory'].'\' or ');
		array_push($condition,'jobs_available.expected_salary=\''.$data1['Salary'].'\' or ');
                array_push($condition,'company_details.company_name=\''.$data1['Industry'].'\'');
               
		$data['conditions']=$condition;
                $result = $db->select($data);
	            $colcount = $result->columnCount();
	            
             
				$tmp='';
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	
					$tmp[]=$row;
                }
               
                return $tmp;

   	 }
	
   }
?>
					









