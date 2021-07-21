<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location: login.php');
  }
if(isset($_FILES['file']['name'])){

	/* Getting file name */
	$filename = $_FILES['file']['name'];
	
	

	
	$location = "users/".$_SESSION['email']."/".$filename;
	$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	$imageFileType = strtolower($imageFileType);

	/* Valid extensions */
	//$valid_extensions = array("jpg","jpeg","png","docx","mkv");

	$response = 0;
	
	
	   	/* Upload file */
	   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
	     	$response = $location;
	   	}
	

	echo $response;
	exit;
}

echo 0;
