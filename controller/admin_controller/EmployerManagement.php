<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-13
 * @description : JobPortal Employer Management Controller
 * @module		: Admin
 * @modified on : 08-04-2013 : server side validation added by Ashwani Singh
 * 				  12-04-2013 : company management functionality added by Ashwani Singh
*/

ini_set("display_errors","1");
class EmployerManagementController extends common  #extends /classes/common which contains model and view loader methods
{	
	
	/* Employer managment */
	
	#method to display Employer management page
	public function display()
	{
		$this->loadView('EmployerManagement');
	}
	
	#method to display employer statistics 
	function employerStatistics()									
	{  
		$result=$this->loadModel('EmployerManagement','employerStatistics');
		$this->loadView('EmployerStatistics',$result);		
	}
	
	#method to load employer activate/deactivate main page
	function employerMain()									
	{  	
		$this->loadView('EmployerActivateDeactivate');		#loads employer main page
		
	}
	
	
	#method to activate employer
	function employerActivate()
	{    
		$email=$_REQUEST['email'];

		$result=$this->loadModel('EmployerManagement','employerActivate',$email);	
		if($result) {
			echo EMPLOYER_ACTIVATED_MSG;
		} else {
			echo OPERATION_FAILED;
		} 
	
	}
	
	#method to deactivate employer
	function employerDeactivate()								
	{  
		$email=$_REQUEST['email'];

		$result=$this->loadModel('EmployerManagement','employerDeactivate',$email);	
		if($result) {
			echo EMPLOYER_DEACTIVATED_MSG;
		} else {
			echo OPERATION_FAILED;
		}
	}
	
	#method to search employer
	function employerSearch()
	{   
		$email=htmlentities($_REQUEST['email']);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
			$result=$this->loadModel('EmployerManagement','employerSearch',$email);	
			if($result['status']=='0') {
				$status = 'Active';
				$button = '<input type="button" class="btn" value="Deactivate" onclick="deactivateEmployer(\''.$result['email'].'\')"/>';
			} else {
				$status = 'Inactive';
				$button = '<input type="button" class="btn" value="Activate" onclick="activateEmployer(\''.$result['email'].'\')"/>';
			}	
			if($result['usertype']=='3') {		
				/* generating response in form of table */
				$response="";
				$response.="<table id='datatables'>";
				$response.='<tr>';	
				$response.='<td>';
				$response.="<br>"."<b>".EMP_NAME.$result['displayname'];
				$response.= "<br>"."<b>".EMAIL.$result['email'];
				$response.= "<br>"."<b>".STATUS.$status;
				$response.= '</td>';
				$response.='</tr>';
				$response.='<tr>';
				$response.='<td>';
				$response.= $button;
				$response.= '</td>';
				$response.='</tr>';
				$response.= '</table>';
				echo $response;
			} else {
				echo NO_RESULT_MSG;
			}					 
		} else { 
			echo INVALID_EMAIL_MSG;    
		} 
						
				
				
	}
	
	/* company management */
	
	
	#method to display Employer management page
	public function displayCompany()
	{
		$this->loadView('CompanyManagement');
	}
	
	#method to display company statistics 
	function companyStatistics()									
	{  
		$result=$this->loadModel('EmployerManagement','companyStatistics');
		$this->loadView('CompanyStatistics',$result);		
	}
	
	#method to load company activate/deactivate main page
	function companyMain()									
	{  	
		$this->loadView('CompanyActivateDeactivate');		#loads company main page
		
	}
	
	
	#method to activate company
	function companyActivate()
	{    
		$companyName=$_REQUEST['companyName'];

		$result=$this->loadModel('EmployerManagement','companyActivate',$companyName);	
		if($result) {
			echo COMPANY_ACTIVATED_MSG;
		} else {
			echo OPERATION_FAILED;
		} 
	
	}
	
	#method to deactivate company
	function companyDeactivate()								
	{  
		$companyName=$_REQUEST['companyName'];

		$result=$this->loadModel('EmployerManagement','companyDeactivate',$companyName);	
			
		if($result) {
			echo COMPANY_DEACTIVATED_MSG;
		} else {
			echo OPERATION_FAILED;
		}
	}
	
	#method to search company
	function companySearch()
	{   
		$companyName=htmlentities($_REQUEST['companyName']);
		if (eregi('^[A-Za-z0-9 ]{3,20}$',$companyName)) {				#validating company name min 3 max 20 characters
			$result=$this->loadModel('EmployerManagement','companySearch',$companyName);	
			if($result['status']=='0') {
				$status = 'Active';
				$button = '<input type="button" class="btn" value="Deactivate" onclick="deactivateCompany(\''.$result['company_name'].'\')"/>';
			} else {
				$status = 'Inactive';
				$button = '<input type="button" class="btn" value="Activate" onclick="activateCompany(\''.$result['company_name'].'\')"/>';
			}	
			if($result['company_name']==$companyName) {		
				/* generating response in form of table */
				$response="";
				$response.="<table id='datatables'>";
				$response.='<tr>';	
				$response.='<td>';
				$response.="<br>"."<b>".COMPANY_NAME.$result['company_name'];
				$response.= "<br>"."<b>".COMPANY_WEBSITE.$result['website'];
				$response.= "<br>"."<b>".COMPANY_FUNCTIONAL_AREA.$result['key_functional_area'];
				$response.= "<br>"."<b>".STATUS.$status;
				$response.= '</td>';
				$response.='</tr>';
				$response.='<tr>';
				$response.='<td>';
				$response.= $button;
				$response.= '</td>';
				$response.='</tr>';
				$response.= '</table>';
				echo $response;
			} else {
				echo NO_RESULT_MSG;
			}					 
		} else { 
			echo INVALID_COMPANY_NAME_MSG;    
		} 
						
				
				
	}
	

}
?>
