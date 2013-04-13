<?php
	//ini_set("display_errors","1");

	class search1Controller extends common {
	
	   	 public function displayView() {
		
		    $this->loadView('search1');
		}
        
		
		public function location() {
		
		    $this->loadView('locationsearch');
		}
		public function category() {
		
		    $this->loadView('categorysearch');
		}
		public function company() {   
		
		    $this->loadView('companysearch');
		}
	}
?>
