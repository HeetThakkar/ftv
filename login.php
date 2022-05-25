<?php
session_start();
ob_start();
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
	
		require_once 'general_functions.php';
		include('config.php');

$output='';
$email=$username="";
if(isset($_POST['email'])){
$email= strtolower($_POST['email']);
}

$email=trim($email);
		
$password='';
if(isset($_POST['password'])){
	$password=$_POST['password'];
}

$sql = "SELECT *
FROM users
WHERE username='$email' or email='$email'  ";
$result = mysqli_query($dbC,$sql);
if(mysqli_num_rows($result)>0){
while ($row = $result->fetch_assoc()) {
if($row['password']==md5($password)){
	$id=$row['id'];

if(isset($_POST['remember'])){
	if($_POST['remember']=='yes'){
	setcookie('id', $id, time() + (3600 * 24 * 30), "/");
}
}
else{
$_SESSION['id']=$id;
}?>
<script>
       
window.location.href = 'home.php';

</script>
<?php 
	$ip = $_SERVER['REMOTE_ADDR'];

	$output.="<p class='details'>id: ".$id."</p>";
	$output.="<p class='details'>Name: ".$row['name']."</p>";
	$output.="<p class='details'>Name: ".$row['name']."</p>";
	$output.="<p class='details'>Email: ".$row['email']."</p>";
	$output.="<p class='details'>Mobile: ".$row['mobile']."</p>";
	$output.="<p class='details'>Username: ".$row['username']."</p>";
	$output.="<p class='details'>IP Address: ".$ip."</p>";
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$output.= $details->city.', '. $details->region.', '. $details->country.', Long, Lat :'. $details->loc;
	$output.=" <div class='main_sub'><p class='logout'>Log Out</p> </div>";
	echo $output;
}
else{
	echo 'Password Does not match';
}
}
}
 else{
			 
		echo 'User not registered'	;	

		  }

		  ob_end_flush(); 
?>