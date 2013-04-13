<?php
ini_set ( "display_errors", true );
class categorysearchController extends common{

	public function save() {

		
		
		$boolResu = $this->loadModel ( 'categorysearch',"search");
		$this->loadView ( 'categorysearch',$boolResu);
		}
       		public function searchJobinIt() {	
		$arr=array("category"=>"it");
		$boolResu = $this->loadModel ( 'categorysearch',"search",$arr);
	
		$this->loadView ( 'categorysearchview',$boolResu);
		}
		public function searchJobinBpo() {
		$arr=array("location"=>"bpo");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'companysearch.php',$boolResu);
		}
	public function searchJobinAccount() {	
		$arr=array("location"=>"account");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
	
		$this->loadView ( 'companysearch.php',$boolResu);
		}
	
	public function searchJobinFinance() {	
		$arr=array("location"=>"finanace");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinHr() {	
		$arr=array("location"=>"hr");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobNetwork() {	
		$arr=array("location"=>"network");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinDba() {	
		$arr=array("location"=>"dba");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinTester() {	
		$arr=array("location"=>"tester");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinDesiner() {	
		$arr=array("location"=>"desiner");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
  }
?>
