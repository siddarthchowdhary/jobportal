<?php   
//@author    :  Siddarth Chowdhary
//created on :  22 march 2013
//@todo      :  comment the session variable here

//controller=viewjobseeker&function=display

class viewjobseekerController extends common {
	
	public function display(){                    
		require VIEW_PATH.'checkSession.php';
		$arrPersonl = $this->loadModel('viewjobseeker','personal',$_SESSION['ID_USERS_SESSION']);
		$personal_id=$arrPersonl['id'];
		$arrProfessional = $this->loadModel('viewjobseeker','professional',$personal_id); #returns professional details of id supplied
		$arrEducational = $this->loadModel('viewjobseeker','educational',$personal_id);#returns educational details of id supplied
		$extension=$this->loadModel('viewjobseeker','resume',$personal_id);
		$arrTotal=array($arrPersonl,$arrEducational,$arrProfessional,$extension);
		$this->loadView('jobseeker_view/viewDetails.php',$arrTotal); // array to be used in the view
	}
	
}
  /*Documentation --
   * in this controller
  1) we need the id from the users table which comes from the session that is set.
  2) from that value we retrieved the details from the personal details table where fk reqd is id of users table.
     we stored the personal id returned from the above query coz tthat will be needed in next 2 queries
  3) we retrieved the professional details of the personal id stored above.
  4) we retrieved the educational details of the personal id stored above.
  */
?>
