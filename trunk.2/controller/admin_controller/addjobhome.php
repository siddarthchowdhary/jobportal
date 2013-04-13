<?php
	
	class addjobhomeController extends common {
		public function update(){
		 $companyName=$_POST['company'];
		 $location   =$_POST['location'];
		 $category   =$_POST['category'];
		 $actionValue=$_POST['actionValue'];
		  
		if($actionValue == 1){
			echo "fd";
		 $company    =array($companyName);
		 $this->loadView ( '../../view/companysearch',$company);
		}elseif($actionValue == 2){
		  

		 $jobLocation=array($location);
		 $this->loadView ( 'locationsearch.php',$jobLocation );
		}elseif($actionValue == 3){

		 $categoryType=array($cgategory);
		 $this->loadView ( 'categorysearch.php',$categoryType );
                }else{
		  echo "msd";
		}
		   

		}
	     }
?>
