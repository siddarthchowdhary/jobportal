<?php
class createAccountController extends common
{
	function createAccount()
	{
		$result=$this->loadModel('selectValues','companyName');
		$this->loadView('createAccount.php',$result);
	}
}
?>
