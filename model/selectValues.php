<?php
//@fileName: selectValues.php
//@className: selectValuesModel
//@description:this model is used to give initial values in the select box.
//@author    : Siddarth Chowdhary
//created on :  8 april 2013

require_once 'DBConnect.php';
class selectValuesModel extends DBConnect
{
	/*Documentation
	 * this method is used to return all the industry type values from the master table.
	 * */
	public function industryType()
	{
		$db=$this->common();
		$data				= array();
		$data['tables']		= 'master_table';
		$data['columns'] = 'codevalue';
		$data['conditions']		= array('codetype' => 'industry_type'); 
		$result = $db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	    $res[]=$row['codevalue'];
		}
		unset($db);
		return $res;
	}
	
	public function companyName()
	{
		$db=$this->common();
		$data				= array();
		$data['tables']		= 'company_details';
		$data['columns'] = 'company_name';
		
		$result = $db->select($data);
		$res=array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$res[]=$row['company_name'];
		}
		unset($db);
		return $res;
	}	
	
}
