<?php
ini_set ( "display_errors", true);
	class advancesearchController extends common
	 {
	    
	public function displayView()
	{	
		
		//$arr=array("search","sd");
		//$boolResu = $this->loadModel ( 'advancesearch',$arr[0]);
		
		
		$this->loadView('advancesearch.php');	
	}
	public function search() {
		if (isset ( $_POST)) {
			
		
			

			$key = $_POST ['key'];
		        $experience = $_POST ['exp'];
		        $location = $_POST ['loc'];
			$category = $_POST ['cat'];
			$salary = $_POST ['sal'];
			$frns = $_POST ['frns'];
			$multiple = $_POST ['indus'];

			$methodName=array("jobsearch");
		        $arrInfo = array (
				   "key"       => $key,
				   "experience"=>$experience,
				   "location" =>$location,
				   "category" =>$category,
				   "salary"   =>$salary,
				   "frns"     =>$frns,
				   "multiple"     =>$multiple	);
	
			$boolResu = $this->loadModel ( 'advancesearch',"jobsearch" , $arrInfo );
			
			
		$str="";
		  $str.= "<table >";
		   $str.= "<tr>"."<th>"."Company"."</th>"."<th>"."City"."</th>"."<th>"."Designation"."</th>"."<th>"."Category"."</th>"."</tr>";
		  foreach ($boolResu as $key =>$value){
	            $str.= "<tr>";
		    foreach($value as $value1=>$val1){
		       $str.= "<td>".$val1."</td>";
		      
		    }
		     $str.= "</tr>";
		  }
	          $str.= "</table>";
		  echo $str;

			//$this->loadView('advanceview.php',$boolResu);
			}
		}
	 }
?>
