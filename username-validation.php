<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
	
	$username="";
	if(isset($_POST['username'])){
	$username= strtolower($_POST['username']);
	}

include('config.php');

if($username!=''){
$sql = "SELECT *
 	 FROM users
     WHERE username='$username'  ";
$result = mysqli_query($dbC,$sql);
if(mysqli_num_rows($result)>0){
	echo 'Username not available';
}
}
else{
	echo 'enter username';
}



?>