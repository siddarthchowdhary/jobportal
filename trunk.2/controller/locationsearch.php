<?php
ini_set ( "display_errors", true );
class locationsearchController extends common{

	public function searchJobinDelhi() {
		$arr=array("location"=>"delhi");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
		$this->loadView ( 'locationsearchview',$boolResu);
		}
	public function searchJobinNoida() {	
		$arr=array("location"=>"noida");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
	
		$this->loadView ( 'locationsearchview.php',$boolResu);
		}
	
	public function searchJobinNoida1() {	
		$arr=array("location"=>"noida","limit"=>"3");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
	
		$this->loadView ( 'locationsearchview',$boolResu);
		}
	
	public function searchJobinNoida2() {	
		$arr=array("location"=>"noida","limit"=>"3");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
	
		$this->loadView ( 'locationsearchview.php',$boolResu);
		}
	public function searchJobinPatna() {	
		$arr=array("location"=>"patna");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinMumbai() {	
		$arr=array("location"=>"mumbai");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinBanglore() {	
		$arr=array("location"=>"banglore");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobHaiddrabad() {	
		$arr=array("location"=>"haidrabad");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinCalcutta() {	
		$arr=array("location"=>"calcutta");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinPune() {	
		$arr=array("location"=>"pune");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinIndore() {	
		$arr=array("location"=>"indore");
		$boolResu = $this->loadModel ( 'locationsearch',"search",$arr);
			print_r($boolResu);
		$this->loadView ( 'locationsearch.php',$boolResu);
		}
	public function searchJobinNewyork() {	
		$arr=array("location"=>"newyork");
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
