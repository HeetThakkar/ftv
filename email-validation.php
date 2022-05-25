<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
	
	$email="";
	if(isset($_POST['email'])){
	$email= strtolower($_POST['email']);
	}
	$email=trim($email);
require_once 'general_functions.php';
include('config.php');
$sql1 = "SELECT *
FROM users
WHERE email='$email'  ";
$result1 = mysqli_query($dbC,$sql1);
if(!chk_email($_POST['email'])){
	echo "Please Enter valid Email-Id";
}
elseif(mysqli_num_rows($result1)>0){
	echo 'Email already registered available' ;

	}
	else{}

?>