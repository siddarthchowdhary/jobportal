<?php

class viewEmployerDetailsController extends common 
{
	function display()
	{
		require_once 'config/constants.php';
		//imp ::supply correct value in seesion variable and remove session values
		//session_start();
		//$_SESSION['ID_USERS_SESSION']=1;    //remove this after integration
		
		//die("viewEmployerDetailsController extends common");
		require_once VIEW_PATH.'checkSession.php';
		$result = $this->loadModel('viewEmployerDetails','display_data',$_SESSION['SESS_ID']); #personal details of id supplied
		//$personal_id=$arrPersonl['id'];
		//print_r($arrPersonl);die();
		//$arrProfessional = $this->loadModel('viewjobseeker','professional',$personal_id); #returns professional details of id supplied
		//$arrEducational = $this->loadModel('viewjobseeker','educational',$personal_id);#returns educational details of id supplied
		//$arrTotal=array($arrPersonl,$arrEducational,$arrProfessional);
		//echo '<pre>';print_r($arrTotal);die("i am here");
		//header
		//print_r($result);die("here");
		$this->loadView('employer_view/viewEmployerDetails.php',$result); //used in the view
		//footer
	}
}
