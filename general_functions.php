<?php
	//general_functions.php
	if(!function_exists('pre')){
		function pre($record){
			echo "<pre>";
			print_r($record);
			echo "</pre>";
		}
	}
	////////////////////////////////
	if(!function_exists('input')){
		function input($type,$name){
			$str = "<input type='$type' name='$name' />";
			return $str;
		}
	}
	////////////////////////////////
	if(!function_exists('loadcss')){
		function loadcss($dir){
			// echo $dir;
			// echo is_dir($dir);
			if(is_dir($dir)){
				$result = scandir($dir);
				// pre($result);
				if(is_array($result)){
					foreach($result as $val){
						// echo $val;
						// echo "<br />";
						$ext = substr($val,-3);
						// echo $ext;
						// echo "<br />";
						$path = $dir.$val;
						// echo $path;
						// echo "<br />";
						if($ext=="css"){
							echo "<link href='$path' rel='stylesheet'/>";
						}
					}
				}
			}
		}
	}
	////////////////////////////////
	if(!function_exists('loadjs')){
		function loadjs($dir){
			// echo $dir;
			// echo is_dir($dir);
			if(is_dir($dir)){
				$result = scandir($dir);
				// pre($result);
				if(is_array($result)){
					foreach($result as $val){
						// echo $val;
						// echo "<br />";
						$ext = substr($val,-2);
						// echo $ext;
						// echo "<br />";
						$path = $dir.$val;
						// echo $path;
						// echo "<br />";
						if($ext=="js"){
							echo "<script src='$path'></script>";
						}
					}
				}
			}
		}
	}
	////////////////////////////////
	if(!function_exists('chk_mobile')){
		function chk_mobile($data){
			// echo $data;
			//9820098200
			$pattern = "/^[6-9][0-9]{9}$/";
			$ans = preg_match($pattern, $data);
			// echo $ans;
			// var_dump($ans);
			return $ans;
		}
	}
	////////////////////////////////
	if(!function_exists('chk_pincode')){
		function chk_pincode($data){
			// echo $data;
			//9820098200
			$pattern = "/^[1-9][0-9]{5}$/";
			$ans = preg_match($pattern, $data);
			// echo $ans;
			// var_dump($ans);
			return $ans;
		}
	}
	////////////////////////////////
	if(!function_exists('chk_email')){
		function chk_email($data){
			// echo $data;
			//9820098200
			$pattern = "/^([a-z0-9][a-z0-9_\.]+[a-z0-9])@([a-z0-9][a-z0-9\-]+[a-z0-9])\.([a-z]{2,})(\.[a-z]{2,})?$/";
			$ans = preg_match($pattern, $data);
			// echo $ans;
			// var_dump($ans);
			return $ans;
		}
	}
	////////////////////////////////
	if(!function_exists('chk_name')){
		function chk_name($data){
			// echo $data;
			// Amar Patil
			$pattern = "/^[a-zA-Z][a-zA-Z ]{1,}[a-zA-Z ]$/";
			
			return preg_match($pattern,$data);
		}
	}
	////////////////////////////////
	if(!function_exists('chk_username')){
		function chk_username($data){
			// echo $data;
			// kunal.shelar_123
			$data = strtolower($data);
			$pattern = "/^[a-z0-9][a-z0-9_\.]{1,}[a-z0-9]$/";
			return preg_match($pattern,$data);
		}
	}
	////////////////////////////////
	if(!function_exists('chk_discount')){
		function chk_discount($data){
			// echo $data;			
			$pattern = "/^([1-9]|[1-9][0-9])$/";
			return preg_match($pattern,$data);
		}
	}
	////////////////////////////////
	if(!function_exists('insert')){
		function insert($table){
			
			// echo $table;
			// pre($_REQUEST);
			$val = "'".implode("','",$_REQUEST)."'";
			// echo $val;
			$arrkey = array_keys($_REQUEST);
			// pre($arrkey);
			$key = implode(",",$arrkey);
			// echo $key;
			$str = "insert into $table ($key) values ($val)";
			// echo $str;
			return $str;
		}
	}
	////////////////////////////////
	if(!function_exists('delete')){
		function delete($table,$condition){		
			// echo $table;
			// echo $condition;
			$str = "delete from $table where $condition";
			// echo $str;
			return $str;
		}
	}
	////////////////////////////////
	if(!function_exists('update')){
		function update($table,$records,$condition){		
			// echo $table;
			// echo $records;
			// echo $condition;
			$str = "update $table set $records where $condition";
			// echo $str;
			return $str;
		}
	}
	////////////////////////////////
?>