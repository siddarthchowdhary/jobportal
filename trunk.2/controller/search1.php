<?php
	//ini_set("display_errors","1");

	class search1Controller extends common {
	
	   	 public function displayView() {
		
		    $this->loadView('search1.php');
		}
                 
	   	 public function advance() {
		     $arr=$this->loadModel ( 'advancesearch',"jobsearchcat");
		    
		    $this->loadView('advancesearch.php',$arr);
		}
		public function quick() {
		
		    $this->loadView('quicksearch.php');
		}
		
		public function location() {
		
		    $this->loadView('locationsearch.php');
		}
		public function category() {
		
		    $this->loadView('categorysearch.php');
		}
		public function company() {   
		
		    $this->loadView('companysearch.php');
		}
	}
?>
