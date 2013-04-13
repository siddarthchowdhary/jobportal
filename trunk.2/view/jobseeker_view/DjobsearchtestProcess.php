<?php
ini_set("display_errors","1");
	//echo $_REQUEST['keyword'];
	$arrKeyword=explode(",",$_REQUEST['keyword']);
	$arrKeywords=implode(" OR ",$arrKeyword);
	echo "<pre>Where Keywords : <br />";	
	print_r($arrKeywords);
	$location=$_REQUEST['location'];
	$employer=$_REQUEST['employer'];
	$category=$_REQUEST['job-category'];
	$level=$_REQUEST['level'];
	echo "<pre>Where location : <br />";
	echo $_REQUEST['location'];
	echo "<pre>Where Employer : <br />";
	echo $_REQUEST['employer'];
	echo "<pre>Where job-category : <br />";
	echo $_REQUEST['job-category'];
	echo "<pre>Where  Career Level: <br />";
	echo $_REQUEST['level'];

	$sql = "select <> from <> where {table.}keywords = $arrKeywords and {table.}location=$location  and {table.}employer=$employer and {table.}job-category=$category and {table.}career level=$level;";
	echo "<pre>".$sql;

?>
