<?php
//@author    :  Siddarth Chowdhary
//created on :  17 march 2013
//last modified on : 1 April 2013

 /*Documentation --
   * in this controller
  
  personal () ,professional () ,educational() -
  * requested all the form values that were there on the respective update pages and created an array.
  * validated them through a model class function
  * if validation is passed they are inserted/updated in the database
  * if success after db operation a page success is shown else failed.
  */
	class updatejobseekerController extends common
	{
			public function personal()
			{
					require VIEW_PATH.'checkSession.php';
					$firstname = strip_tags($_REQUEST['fname']);
					$middlename = strip_tags($_REQUEST['mname']);
					$lastname = strip_tags($_REQUEST['lname']);
					$gender = strip_tags($_REQUEST['gender']);
					$dob = strip_tags($_REQUEST['dob']);
					$phno = strip_tags($_REQUEST['phno']);
					$paddress = strip_tags($_REQUEST['paddress']);
					$caddress = strip_tags($_REQUEST['caddress']);
					$city = strip_tags($_REQUEST['city']);
					$state = strip_tags($_REQUEST['state']);
					$pincode = strip_tags($_REQUEST['pincode']);
					$country = strip_tags($_REQUEST['country']);
					$arrPersonal = array("firstname"=>$firstname,"lastname"=>$lastname,"middlename"=>$middlename,
										 "gender"=>$gender,"dob"=>$dob,"phno"=>$phno,"paddress"=>$paddress,
										 "caddress"=>$caddress,"city"=>$city,"state"=>$state,"pincode"=>$pincode,
										 "country"=>$country);
					#serverside validation
					$boolResult = $this->loadModel('updatejobseeker','validatePersonal',$arrPersonal);
					#if passed insert into database
					if (empty($boolResult)){ 
						$boolQuery = $this->loadModel('updatejobseeker','injectPersonal',$arrPersonal);
					 
						if($boolQuery){
							echo "Your Details Have been Saved";
						} else{
							echo "Your Details could not be saved type of view page.";
						}
					} else {
						#include validation failed
						#displaying errors
						foreach ($boolResult as $key => $val) {
								echo $val.'   ';
						}
					}
			}
                        
			public function educational(){
				
					require VIEW_PATH.'checkSession.php';
				
					$highestDegree=strip_tags($_REQUEST['highestDegree']);
					if($highestDegree=='others'){
						$highestDegree=strip_tags($_REQUEST['txthighestDegree']);
					}
					$grad=strip_tags($_REQUEST['grad']);
					if($grad=='others'){
						$grad=strip_tags($_REQUEST['txtgrad']);
					}
					$pg=strip_tags($_REQUEST['pg']);
					$phd=strip_tags($_REQUEST['phd']);
					$otherQual=strip_tags($_REQUEST['otherQual']);
					#getting peronal id to insert / update later in this function
					$personal_id= $this->loadModel('updatejobseeker','getPersonalId',$_SESSION['ID_USERS_SESSION']);
					$arrEducational = array("personal_id"=>$personal_id,"highest_degree"=>$highestDegree,"graduation_degree"=>$grad,
											"post_graduation_degree"=>$pg,"PhD"=>$phd,"other_degree"=>$otherQual);
					$boolResult = $this->loadModel('updatejobseeker','validateEducational',$arrEducational);
					#insert into database
					if (empty($boolResult)){ 
						$boolQuery = $this->loadModel('updatejobseeker','injectEducational',$arrEducational);
					 
						if($boolQuery){
							echo "Your Details Have been Saved";
						} else{
							echo "<br>Your Details could not be saved type of view page.";
						}
					} else {
						foreach ($boolResult as $key => $val) {
								echo $val.'   ';
						}
					}
			}
			
			public function professional(){
				
					require VIEW_PATH.'checkSession.php';
					$exp=strip_tags($_REQUEST['exp']);
					$keySkills=strip_tags($_REQUEST['keySkills']);
					$industry=strip_tags($_REQUEST['industry']); 
					if($industry=='others'){
						$industry=strip_tags($_REQUEST['txtindustry']);
					}
					$functionalArea=strip_tags($_REQUEST['functionalArea']);
					$personal_id= $this->loadModel('updatejobseeker','getPersonalId',$_SESSION['ID_USERS_SESSION']);
					$arrProfessional=array("personal_id"=>$personal_id,"experience"=>$exp,"keyskills"=>$keySkills,"current_industry"=>$industry,"functional_area"=>$functionalArea);
					$boolResult = $this->loadModel('updatejobseeker','validateProfessional',$arrProfessional);
					if (empty($boolResult)){
					$boolQuery = $this->loadModel('updatejobseeker','injectProfessional',$arrProfessional);
					 
						if($boolQuery){
							echo "Your Details Have been Saved";
							} else{
							echo "<br>Your details could not be saved type of page.";
						}
					} else {
						//include validation failed
						foreach ($boolResult as $key => $val) {
								echo $val.'   ';
						}
					}
					
			}
			
			/*Documentation
				 * This function is used to upload a resume file from the user.
				 * First of all we have checked whether user is logged in or not.
				 * After that file is checked for valid extension type and size of the file.
				 * Then that file is uploaded in the uploads folder.
				 * And particular messages are displayed via ajax.
			* */
			public function resume()
			{	
				require VIEW_PATH.'checkSession.php';
				$ext = $this->loadModel('updatejobseeker','findexts',$_FILES['uploaded']['name']); 
				$data=array("extension"=>$ext,"id"=>$_SESSION['ID_USERS_SESSION']);
				$boolExt = $this->loadModel('updatejobseeker','storeExtension',$data);
				 
				 if ($boolExt) {
					$size = $_FILES['uploaded']['size']; 
					$arrAllowedExt=array("doc","docx","pdf","rtf","odt");
					if( in_array($ext,$arrAllowedExt) && $size < 10240000 ){   #extensions validation
						$valid_file = true;
					} else {
					$valid_file = false;
					echo $message = "you can't upload the file coz of size /extension issue type of view<br/>";
					}
					if ($valid_file)
					{
					#renamed file here with email from session variable.
					$rename = $_SESSION['EMAIL_SESSION'];
					#This assigns the subdirectory you want to save into... make sure it exists!
					$target = "uploads/";
					#This combines the directory, the new file name, and the extension
					$target = $target . $rename.".".$ext; 
						if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
						header('Location: indexMain.php?controller=pages&function=detailsSaved');
						} else {
							header('Location: indexMain.php?controller=pages&function=detailsNotSaved');
							//echo "Sorry, there was a problem uploading your file.";
						}
					} else {
						header('Location: indexMain.php?controller=pages&function=extensionProblem');
						//echo "Sorry, there was a problem uploading your file.";
					}
				} else {
					echo "there was a problem saving extension of the resume";
				}
					
				
			}
	}	
