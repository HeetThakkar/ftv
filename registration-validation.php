<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
	
		require_once 'general_functions.php';
		include('config.php');


		$email="";
		if(isset($_POST['email'])){
		$email= strtolower($_POST['email']);
		}
		$email=trim($email);
		$mobile="";
		if(isset($_POST['mobile'])){
		$mobile= strtolower($_POST['mobile']);
		}
		$mobile=trim($mobile);
		$phone=substr($mobile,  -10);
		$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		$password='';
if(isset($_POST['password'])){
	$password=$_POST['password'];
}
$cpassword='';
if(isset($_POST['cpassword'])){
	$cpassword=$_POST['cpassword'];
}
$name=$username='';
if(isset($_POST['name'])){
	$name=$_POST['name'];
}
if(isset($_POST['username'])){
	$username=$_POST['username'];
}
$sql = "SELECT *
FROM users
WHERE username='$username'  ";
$result = mysqli_query($dbC,$sql);

$sql1 = "SELECT *
FROM users
WHERE email='$email'  ";
$result1 = mysqli_query($dbC,$sql1);

$sql2 = "SELECT *
FROM users
WHERE mobile='$mobile'  ";
$result2 = mysqli_query($dbC,$sql2);


		if(!chk_name($_POST['name'])){
			echo "Please Enter Full Name Without Special Characters & Dots";
		}
		elseif(!chk_email($_POST['email'])){
			echo "Please Enter valid Email-Id";
		}
		elseif(mysqli_num_rows($result1)>0){
			echo 'Email already registered available' ;
		
			}
		elseif(strlen($mobile) != '12' && strlen($mobile) != '13'){
			echo 'Enter Country Code Followed by 10 digit mobile number' ;
		}
		elseif(substr_count($mobile,"+")==0){
			echo 'Mobile Must contain valid country code including +';
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
		elseif($username==''){
			echo 'enter username';
		}
		elseif(mysqli_num_rows($result)>0){
			echo 'Username not available' ;
		
			}
		
			
		elseif($password==''){
			echo 'Please Enter Password';
		}
		elseif (strlen($password) <= '7') {
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
		elseif(empty($cpassword)){
			echo "Confirm password is required";
		  }
		  
		  elseif($cpassword!=$password){
			echo "Password does not match";
		  }




		  else{
			  echo 'else';
			  $password=md5($password);
			$sql="INSERT INTO users (name,email,mobile,username,password) VALUES ('".$name."','".$email."','".$mobile."','".$username."','".$password."')";

			if ($dbC->query($sql) === TRUE) {	
				$ip = $_SERVER['REMOTE_ADDR'];

				$output.="<p class='details'>Name: ".$name."</p>";
				$output.="<p class='details'>Email: ".$email."</p>";
				$output.="<p class='details'>Mobile: ".$mobile."</p>";
				$output.="<p class='details'>Username: ".$username."</p>";
				$output.="<p class='details'>IP Address: ".$ip."</p>";
				$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
				$output.= $details->city.', '. $details->region.', '. $details->country.', Long, Lat :'. $details->loc;
				$output.=" <div class='main_sub'><p class='logout'>Log Out</p> </div>";
				echo $output;
				   
			}
			else{
				echo mysqli_error($dbC);

			}			

		  }


?>