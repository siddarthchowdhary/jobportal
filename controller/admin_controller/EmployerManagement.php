<?php
/* @author 		: Ashwani Singh
 * @date   		: 21-03-13
 * @description : JobPortal Employer Management Controller
 * @module		: Admin
 * @modified on : 08-04-2013 :server side validation added by Ashwani Singh
 * 
*/

ini_set("display_errors","1");
class EmployerManagementController extends common  #extends /classes/common which contains model and view loader methods
{	
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
				$response.="<br>"."<b>Employer Name  :</b>".$result['displayname'];
				$response.= "<br>"."<b>email :</b>".$result['email'];
				$response.= "<br>"."<b>Status :</b>".$status;
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
	

}
?>
