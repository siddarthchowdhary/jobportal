<?php 
	require_once("easyCRUD.class.php");

	class users  extends Crud 
	{
		# Your Table name 
			protected $table = 'users';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
	}

?>
