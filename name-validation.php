<?php
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

require_once 'general_functions.php';
// include('admin/config.php');
if(!chk_name($_POST['name'])){
	echo "Please Enter Full Name Without Special Characters & Dots";
}

?>