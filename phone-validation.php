<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
		$pattern = '/+/';
	$mobile="";
	if(isset($_POST['mobile'])){
	$mobile= strtolower($_POST['mobile']);
	}
	$mobile=trim($mobile);
	$phone=substr($mobile,  -10);
require_once 'general_functions.php';
include('config.php');

$sql2 = "SELECT *
FROM users
WHERE mobile='$mobile'  ";
$result2 = mysqli_query($dbC,$sql2);

if($mobile!=''){
	
	if(strlen($mobile) != '12' && strlen($mobile) != '13'){
		echo 'Enter Country Code Followed by 10 digit mobile number' ;
	}
	elseif(substr_count($mobile,"+")==0){
		echo 'Mobile Must contain valid country code including + ';
	}
	elseif(substr_count($mobile,"+")>1){
		echo 'Mobile Must contain  + only once';
	}
	elseif(!chk_mobile($phone)){
		echo "Please Enter only 10 Digit Mobile Number Without Space";
	}
	elseif(mysqli_num_rows($result2)>0){
		echo 'Mobile already registered available' ;
	
		}
	else{

	}

	


}
else{
	echo 'Enter Mobile Number';
}



?>