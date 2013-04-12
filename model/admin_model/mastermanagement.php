<?php
/* @author 		: Prince
 * @date   		: 29-03-2013
 * @description : mastermanagement Model 
 * @module		: Admin 
 * @modified on : 30-03-2013
*/

ini_set ( 'display_errors', true );
class mastermanagementModel 
{
	private $codeType;
	private $codeValue;


	public function getDatabaseHandler()
    {
		include 'library/pdo/pdo_config.php';
		include 'library/pdo/cxpdo.php';
        $db = dbclass::instance($config);
		return $db;
       
   	 }
					
	public function search()
    {

   	 	$db = $this->getDatabaseHandler();
   	    $data = array();
        $data['tables']="master_table";
       
		$data['columns']=array("codetype");
    	$result=$db->select($data);
        $value['company']=array();
     	while( $abc=$result->fetch(PDO::FETCH_ASSOC)) {
			$value[]=$abc['codetype'];
	    }	 
        return $value;
   	 }
	
   public function dbinsert($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
        echo $data['tables'];
		print_r($data1);
        
		$this->codeType=$data1['select'];
		$this->codeValue=$data1['value'];
	
        $data['columns'] = array("codetype"=>$data1['select'],"codevalue"=>$data1['value']);
     	
		$result = $db->insert($data['tables'],$data['columns']);
    }

    public function dbdelete($data1=array())
    {
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
        echo $data['tables'];
		print_r($data1);
        
		$this->codeType=$data1['type'];
		$this->codeValue=$data1['value'];
	
        $data['conditions'] = array("codetype"=>$data1['type'],"codevalue"=>$data1['value']);
		$result = $db->delete($data['tables'],$data['conditions']);
    }
    
   function dbupdate($data1=array())
    {
    
        $db = $this->getDatabaseHandler();
        $data = array();
        $data['tables']="master_table";
        echo $data['tables'];
		print_r($data1);
        
		$this->codeType=$data1['type'];
		$this->codeValue=$data1['value'];
	
     	$data['columns'] = array("codevalue"=>$data1['newvalue']);
        $data['conditions'] = array("codetype"=>$data1['type'],"codevalue"=>$data1['value']);
		$result = $db->update($data['tables'],$data['columns'],$data['conditions']);
    

    }
}
?>
