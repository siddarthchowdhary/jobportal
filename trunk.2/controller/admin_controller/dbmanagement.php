<?php
	
	
	class dbmanagementController extends common {
	

		
			public function companyedit(){
                         
				
			 $this->loadView ( 'companymanagementadmin');
                         }public function employeredit(){
		
			   $this->loadView ( 'employerdetail' );
			}public function usersedit(){
		
			  $this->loadView ('usersmamagement');
			}public function masteredit(){
			 
			$arr=array("search");
			$boolResu = $this->loadModel ( 'mastermanagement',$arr[0]);
			
			  $this->loadView ( 'mastermanagement',$boolResu);
		
			
			}public function jobseekeredit(){
		
		          $this->loadView ( 'jobseekerprofessionaldetails');
			}public function jobapplyedit(){
		
			  $this->loadView ('jobapplied');
			}public function jobavailableedit(){
		
			  $this->loadView ( 'jobavailable');
			}public function addJob(){
		
			  $this->loadView ('addjobhome');
			}
			
		
	   
	}

	
 ?>
