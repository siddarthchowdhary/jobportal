<?php
   ini_set("dispaly_errors",true);
class princeController extends common  
{
   public function show()
    {
     $var=$_POST['field1'];
     $var2=$_POST['field2'];
      echo $var;
      echo $var2;
      $name=array("name"=>"prince");
     //$this->loadView('princeview',$name);
     $this->loadView ( 'companymanagementadmin');
      
    }	
	

}
?>
