<?php
class createAccountController extends common
{
	function createAccount()
	{
		$result=$this->loadModel('selectValues','companyName');
		//print_r($result);die;
		$this->loadView('createAccount.php',$result);
		
	}
}
?>
