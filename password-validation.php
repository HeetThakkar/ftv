<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
		$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$password='';
if(isset($_POST['password'])){
	$password=$_POST['password'];
}
		if(!empty($password)){
			if (strlen($password) <= '7') {
				echo  "Your Password Must Contain At Least 8 Characters!";
			}
			elseif(!preg_match("#[0-9]+#",$password)) {
				echo  "Your Password Must Contain At Least 1 Number!";
			}
			elseif(!preg_match("#[A-Z]+#",$password)) {
				echo  "Your Password Must Contain At Least 1 Capital Letter!";
			}
			elseif(!preg_match($pattern,$password)) {
				echo  "Your Password Must Contain At Least 1 Special Character!";
			}
			 else {
				echo  "";
			}
		  }
		  else{
			  echo 'Please Enter Password';
		  }

?>