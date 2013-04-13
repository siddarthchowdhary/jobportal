<?php
/**
 * file_name: createAccount.php
 * @author: team
 * created_on: 22-Apr-2013
 * description:  used to create an account.
 * functions:  createAccount
 * inherited class: common
 * */
?>

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
