<?php
/*	
*	@author      	: Siddarth Chowdhary
* 	@description 	: this model is used to give initial values in the select box.
*	created on   	:  8 april 2013
*   @fileName		: SelectValues.php
*	@className		: SelectValuesModel
*   @modified on 	: 11-04-2013 by Ashwani Singh for Admin module
*/

class SelectValuesModel 
{
	/*Documentation
	 * this method is used to return all the industry type values from the master table.
	 * */
public function industryType()
	{
		
		$db 			    = $this->dbConnect();
		$data['tables']		= 'master_table';						#selecting master_able from database
		$data['columns']	= array('master_table.codevalue');		#selecting codevalue column from master_table
		$data['conditions'] = array("codetype ='industry_type'");
		$result = $db->select($data);								# query => SELECT `master_table`.`codevalue` FROM `master_table` WHERE codetype ='industry_type' )
		$row = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$res[]=$row['codevalue'];
		}
		
		return $res;
		
		
	}	
	
	/*Documentation
	 * this method is used to return all the industry type values from the master table.
	 * */
	public function companyName()
       {
          $db	   		   = $this->dbConnect();
          $data            = array();
          $data['tables']  = 'company_details';							#selecting company_details from database
          $data['columns'] = array('company_details.company_name');     #selecting company_name column from company_details
          $result = $db->select($data);									# query =>SELECT `company_details`.`company_name` FROM `company_details`                  
          $res=array();
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$res[]=$row['company_name'];
          }
               
          return $res;
       }

 

	
	
	
}
