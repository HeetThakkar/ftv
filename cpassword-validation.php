<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
	
	
require_once 'general_functions.php';
// include('admin/config.php');
$password='';
if(isset($_POST['password'])){
	$password=$_POST['password'];
}
$cpassword='';
if(isset($_POST['cpassword'])){
	$cpassword=$_POST['cpassword'];
}
if(empty($cpassword)){
	echo "Confirm password is required";
  }
  
  elseif($cpassword!=$password){
	echo "Password does not match ";
  }
  else{

  }

?>