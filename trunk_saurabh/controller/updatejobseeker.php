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
			public function __construct()
			{
				
			}
			
			public function personal()
			{
					require VIEW_PATH.'checkSession.php';
					$firstname = $_REQUEST['fname'];
					$middlename = $_REQUEST['mname'];
					$lastname = $_REQUEST['lname'];
					$gender = $_REQUEST['gender'];
					$dob = $_REQUEST['dob'];
					$phno = $_REQUEST['phno'];
					$paddress = $_REQUEST['paddress'];
					$caddress = $_REQUEST['caddress'];
					$city = $_REQUEST['city'];
					$state = $_REQUEST['state'];
					$pincode = $_REQUEST['pincode'];
					$country = $_REQUEST['country'];
					$arrPersonal = array("firstname"=>$firstname,"lastname"=>$lastname,"middlename"=>$middlename,
										 "gender"=>$gender,"dob"=>$dob,"phno"=>$phno,"paddress"=>$paddress,
										 "caddress"=>$caddress,"city"=>$city,"state"=>$state,"pincode"=>$pincode,
										 "country"=>$country);
					//serverside validation
					$boolResult = $this->loadModel('updatejobseeker','validatePersonal',$arrPersonal);
					
					//if passed insert into database
					if ($boolResult){ 
						$boolQuery = $this->loadModel('updatejobseeker','injectPersonal',$arrPersonal);
					 
						if($boolQuery){
							//include view details page 
							header('Location: indexMain.php?controller=pages&function=detailsSaved');
						} else{
							echo "Your Details could not be saved type of view page.";
						}
					} else {
						//include validation failed
						echo "<br>in updatejobseeker controller<br>Validation Failed try Again include that page here in controller";
					}
			}
                        
			public function educational(){
				
					require VIEW_PATH.'checkSession.php';
				
					$highestDegree=$_REQUEST['highestDegree'];
					if($highestDegree=='others'){
						$highestDegree=$_REQUEST['txthighestDegree'];
					}
					$grad=$_REQUEST['grad'];
					if($grad=='others'){
						$grad=$_REQUEST['txtgrad'];
					}
					$pg=$_REQUEST['pg'];
					$phd=$_REQUEST['phd'];
					$otherQual=$_REQUEST['otherQual'];
					//getting peronal id to insert / update later in this function
					$personal_id= $this->loadModel('updatejobseeker','getPersonalId',$_SESSION['ID_USERS_SESSION']);
					$arrEducational = array("personal_id"=>$personal_id,"highest_degree"=>$highestDegree,"graduation_degree"=>$grad,
											"post_graduation_degree"=>$pg,"PhD"=>$phd,"other_degree"=>$otherQual);
					$boolResult = $this->loadModel('updatejobseeker','validateEducational',$arrEducational);
					//if passed insert into database
					if ($boolResult){ 
						$boolQuery = $this->loadModel('updatejobseeker','injectEducational',$arrEducational);
					 
						if($boolQuery){
							//include view details page 
							header('Location: indexMain.php?controller=pages&function=detailsSaved');
						} else{
							echo "<br>Your Details could not be saved type of view page.";
						}
					} else {
						//include validation failed
						echo "<br>in updatejobseeker controller<br>Validation Failed try Again include that page here in controller";
					}
			}
			
			public function professional(){
				
					require VIEW_PATH.'checkSession.php';
					$exp=$_REQUEST['exp'];
					$keySkills=$_REQUEST['keySkills'];
					$industry=$_REQUEST['industry']; 
					if($industry=='others'){
						$industry=$_REQUEST['txtindustry'];
					}
					$functionalArea=$_REQUEST['functionalArea'];
					$personal_id= $this->loadModel('updatejobseeker','getPersonalId',$_SESSION['ID_USERS_SESSION']);
					$arrProfessional=array("personal_id"=>$personal_id,"experience"=>$exp,"keyskills"=>$keySkills,"current_industry"=>$industry,"functional_area"=>$functionalArea);
					$boolResult = $this->loadModel('updatejobseeker','validateProfessional',$arrProfessional);
					if ($boolResult){
					$boolQuery = $this->loadModel('updatejobseeker','injectProfessional',$arrProfessional);
					 
						if($boolQuery){
							
							header('Location: indexMain.php?controller=pages&function=detailsSaved');
						} else{
							echo "<br>Your details could not be saved type of page.";
						}
					} else {
						//include validation failed
						echo "<br>in updatejobseeker controller<br>Validation Failed try Again include that page here in controller";
					}
					
			}
			
			public function resume()
			{
				/*Documentation
				 * This controller is used to upload a resume file from the user.
				 * First of all we have checked whether user is logged in or not.
				 * After that file is checked for valid extension type and size of the file.
				 * Then that file is uploaded in the uploads folder.
				 * And particular views are invoked.
				 * */
				require VIEW_PATH.'checkSession.php';
				$ext = $this->loadModel('updatejobseeker','findexts',$_FILES['uploaded']['name']); 
				/*
				 * new thing to add -- put extension into db
				 * */
				 $data=array("extension"=>$ext,"id"=>$_SESSION['ID_USERS_SESSION']);
				 $boolExt = $this->loadModel('updatejobseeker','storeExtension',$data);
				 
				 if ($boolExt) {
					$size = $_FILES['uploaded']['size']; 
					$arrAllowedExt=array("doc","docx","pdf","rtf","odt");
					if( in_array($ext,$arrAllowedExt) && $size < 10240000 ){   //extensions validation
						$valid_file = true;
					} else {
					$valid_file = false;
					echo $message = "you can't upload the file coz of size /extension issue type of view<br/>";
					}
					if ($valid_file)
					{
					//rename file here with id/email from session
					$rename = $_SESSION['EMAIL_SESSION'];
		
					//This assigns the subdirectory you want to save into... make sure it exists!
					$target = "uploads/";
					//This combines the directory, the random file name, and the extension
					$target = $target . $rename.".".$ext; 
						if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
						header('Location: indexMain.php?controller=pages&function=detailsSaved');
						} else {
							echo "Sorry, there was a problem uploading your file ok.";
						}
					} else {
						echo "Sorry, there was a problem uploading your file.";
					}
				} else {
					echo "there was a problem saving extension of the resume";
				}
					
				
			}
	}	
