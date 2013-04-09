<?php
require_once 'DBConnect.php';
class selectValuesModel extends DBConnect
{
	
	public function industryType()
	{
		$db=$this->common();
		$data				= array();
		$data['tables']		= 'master_table';
		$data['columns'] = 'codevalue';
		$data['conditions']		= array('codetype' => 'industry_type'); 
		//~ echo '<pre>';
		$result = $db->select($data);
		//~ print_r($result);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    $res[]=$row['codevalue'];
		}
		unset($db);
		return $res;
	}	
	
}
