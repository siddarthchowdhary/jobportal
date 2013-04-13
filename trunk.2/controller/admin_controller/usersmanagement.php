<?php
ini_set ( "display_errors", true );

print_r ( $_POST );
class usersmanagementController extends common {
        
	
       public function displayView()
	{
	  $this->loadView('usersmamagement.php');
	}
      public function save() {
	       if (isset ( $_POST )) {
			echo '<pre>';
			print_r ( $_POST );
			$password      = $_POST ['pass1'];
		        $name          = $_POST ['name1'];
		        $email         = $_POST ['email1'];
			$user          = $_POST ['user1'];
			$password2     = $_POST ['pass2'];
			$name2         = $_POST ['name2'];
			$email2        = $_POST ['email2'];
			$user2         = $_POST ['user2'];
			$email3            = $_POST ['email3'];
	
			$arrInfo       =array("password"=>$password,"name"=>$name,"email"=>$email,"user"=>$user);
			print_r($arrInfo );
		        $arrInfo2       =array("password"=>$password2,"name"=>$name2,"email"=>$email2,"user"=>$user2);
			$arrInfo3      =array("email"=>$email3);
			$methodName    =array("dbinsert","dbdelete","dbupdate");
			$opr           =$_POST['txtActionValue'];
			
		
			
			echo $password;
			
			
			if($opr == 1){
				
			$boolResu = $this->loadModel ( 'usersmanagement',$methodName[0] , $arrInfo );
			}	elseif($opr == 2){
				
				$boolResu = $this->loadModel ( 'usersmanagement', $methodName[1], $arrInfo3 );
			}	elseif($opr == 3){
				
				$boolResu = $this->loadModel ( 'usersmanagement', $methodName[2], $arrInfo2 );
			}else{
			 echo "msg";
			}
				
				
		
				
			
		}
	}
}

?>
