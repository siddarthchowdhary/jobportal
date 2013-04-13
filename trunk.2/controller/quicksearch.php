<?php
ini_set ( "display_errors", true );
class quicksearchController extends common {
	   
	public function displayView()
	{
	   $this->loadView('quicksearch.php');
	}
	public function search() {
		if (isset($_POST)) {
		
		
		 $var="/^[a-zA-Z]+$/";
		 $var2="/^[A-Za-z0-9_]+$/";

		/*if(isset($_POST['keywords'])){
                   if(preg_match($var,$_POST ['keywords'])){
		       $searchData1=$_POST ['keywords'];
		         }else{
			    echo "not correct keyword";
			     return false;
			  }
                       }		
		  
		if(isset($_POST['experience'])){
	          if(filter_var($_POST['experience'],FILTER_VALIDATE_INT)){
		    $searchData2=$_POST ['experience'];
		 }else{
		 echo "enter  experience in int ";
		}
	     }

		if(isset($_POST['salary'])){
		  if(filter_var($_POST['salary'],FILTER_VALIDATE_INT)){
		    $searchData6=$_POST['salary'];
                    echo "correct salary";
		  }else{
		    echo "enter salary in int ";
		 }
		}
	       
  
		if(isset($_POST ['location'])){
		  if(preg_match($var,$_POST['location'])){
		      $searchData5=$_POST['location'];
		      echo "dfgbh";
		  }else{
		     echo "enter alphabetic location";
		     return false;
		  }
                }
		   
		   
		if(isset($_POST['category'])){
		    if(preg_match($var,$_POST ['category'])){
		       $searchData4=$_POST ['category'];
			  }else{
			    echo "enter alphabetic category ";
			     return false;
			  }
                   
		}
		   
		if(isset($_POST ['companyname'])){
		  if(preg_match($var,$_POST['companyname'])){
		      $searchData5=$_POST['companyname'];
		      
		  }else{
		     echo "enter alphabetic company";
		     return false;
		  }
                }*/
	      
								 
			$searchData1=$_POST ['keywords'];
			$searchData2=$_POST ['experience'];			
			$searchData5=$_POST['location'];
			$searchData6=$_POST['salary'];
			$searchData5=$_POST['companyname'];
			$searchData4=$_POST ['category'];					   
							          
		 $arrInfo=array(
			  "Keywords"=>$searchData1,
			  "Experience"=>$searchData2,
			  "Location"=>$searchData3,
			  "JobCategory"=>$searchData4,
			  "Industry"=>$searchData5,
			  "Salary"=>$searchData6);
		
		$boolResu = $this->loadModel ( 'quicksearch',"quicksearch" , $arrInfo );
		
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
				  
			
		
		}
	    }
	}
?>















			 
