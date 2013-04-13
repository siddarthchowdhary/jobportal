<?php
ini_set ( "display_errors", true );
class companysearchController extends common{

	public function save() {
		
		$boolResu = $this->loadModel ( 'companysearch',"search");
		$this->loadView ( 'companysearch.php',$boolResu);
	}
		public function searchJobinAdobe() {	
		$arr=array("location"=>"adobe");
		$boolResu = $this->loadModel ( 'companysearch',"search",$arr);
		$this->loadView ( 'companysearchview.php',$boolResu);
		}
		public function searchJobinAccenture() {
		$arr=array("location"=>"accenture");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'companysearch.php',$boolResu);
		}
	public function searchJobinAricent() {	
		$arr=array("location"=>"aricent");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
	
		$this->loadView ( 'companysearch.php',$boolResu);
		}
	
	public function searchJobinTcs() {	
		$arr=array("location"=>"tcs");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinWipro() {	
		$arr=array("location"=>"banglore");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobGrepcity() {	
		$arr=array("location"=>"gerpcity");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinTechnohigh() {	
		$arr=array("location"=>"technohigh");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinThinkinc() {	
		$arr=array("location"=>"thinkink");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinOsscobe() {	
		$arr=array("location"=>"osscube");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinInfosys() {	
		$arr=array("location"=>"infosys");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
		
	public function searchJobinCapetown() {
		$arr=array("location"=>"capetown");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinBeging() {	
		$arr=array("location"=>"beging");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
  }
?>
