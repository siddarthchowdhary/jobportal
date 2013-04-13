<?php 
ini_set("display_errors","1");
// Require the usage class file
   require("usage.class.php");
	
// Instantiate the person class
   $obj  = new users();
/*
// Create new person
   $person->Firstname = "Kona";
   $person->Age  = "20";
   $person->Sex = "F";
   $creation = $person->Create();

// Update Person Info
   $person->id = "4";	
   $person->Age = "32";
   $saved = $person->Save(); 

// Find person
   $person->id = "4";		
   $person->Find();

   echo $person->Firstname;
   echo $person->Age;

	
// Delete person
   $person->id = "17";	
   $delete = $person->Delete();

// Get all persons
   $result = $obj->all();
   echo "<pre>";
   print_r($result);  


// Find person
   $obj->id = "1";		
   $obj->Find();

   echo $obj->username;
   echo $obj->password;
 */
$result =$obj->rawQuery("select * from users;");
echo "<pre>";
print_r($result);  

//Create new person
   //$obj->username = "saurabh";
  // $obj->password  = "saurabh";
   
   //$creation = $obj->Create();
// Get all persons
  // $result = $obj->all();
 //  echo "<pre>";
 //  print_r($result);  

?>
