<?php
//include_once '/JobPortal/view/dummy/header.html';
class advancesearchModel
{
	private $Keywords="";
	private $Experience;
	private $Location="";
	private $Job_Category;
	private $Expected_Salary;
	private $Industries;
	
	private $Freshness;
	
	private $str="";
	
	 function getDatabaseHandler()
    	  {
   	
        include 'library/pdo/pdo_config.php';
  	include 'library/pdo/cxpdo_modified.php';
        $db = dbclass::instance($config);
	return $db;
       
   	 }
	  				
	public function jobsearchcat()
     	 {
					
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="jobs_available";
       
		$data['columns']=array("job_category");
    		$result=$db->select($data);
         	$value=array();
		

       		 while( $abc=$result->fetch(PDO::FETCH_ASSOC))
         	 {
           	$value[]=$abc['job_category'];
		
	         }
       
      		 
        return $value;
   	 }
				
				
	public function jobsearch($data1=array())
     	 {
					$this->Keywords=$data1['key'];
					$this->Experience=$data1["experience"];
				        $this->Location=$data1["location"];
					$this->Job_Category=$data1["category"];
				        $this->Expected_Salary=$data1["salary"];
					$this->Industries=$data1["multiple"];
					$this->Freshness=$data1["frns"];
						
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
		array_push($condition,'company_details.key_functional_area=\''.$data1["key"].'\' and ');
		array_push($condition,'jobs_available.experience_required=\''.$data1['experience'].'\' and ');
		array_push($condition,'company_details.city=\''.$data1['location'].'\' and ');
		array_push($condition,'jobs_available.name_of_post=\''.$data1['category'].'\' and ');
		array_push($condition,'jobs_available.expected_salary=\''.$data1['salary'].'\' and ');
                array_push($condition,'company_details.company_name=\''.$data1['multiple'].'\'');
               
		$data['conditions']=$condition;
       
               
                $result = $db->select($data);
	        	
		
	        $tmp='';
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	
					$tmp[]=$row;
                }
		return $tmp;





	}
}
