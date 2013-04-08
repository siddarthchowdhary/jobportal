<?php
//@Author : Team Contribution
class loginController extends common 
{
	/*Documentation-
	 * this function is used for login.
	 * it requests the values at the login page and creates an array from it.
	 * and checks in the database and results are displayed accordingly
	 * 4 cases - jobseeker ,admin ,employer ,loginfailed
	 * */
	
	function authenticate()		
	{		
			$email = $_REQUEST['email'];
			$password =$_REQUEST['password'];
			$arrResult = $this->loadModel('login','authenticate',array($email,$password));
			if ($arrResult == 1) { 
				header('Location: indexMain.php?controller=AdminHome&function=display');
			}
			elseif ($arrResult == 2){
				header('Location: indexMain.php?controller=pages&function=jobsearch');			
			}
			elseif ($arrResult == 3){
				header('Location: indexMain.php?controller=job&function=searchPanel');
			}
			else {
			$arr=array("error"=>"please enter correct email / password");
			$arrResult=$this->loadModel('selectValues','industryType');
			$this->loadView('header.php',$arr);
			$this->loadView('home.php',$arrResult);
			$this->loadView('footer.php');
			}
	}		
}
?>
