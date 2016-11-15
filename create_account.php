<!DOCTYPE html>
<html>
<body>
	<?php
	$username = $_POST["username"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$phone_no1 = $_POST["phone_no1"];
	$phone_no2 = $_POST["phone_no2"];
	$phone_no3 = $_POST["phone_no3"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	// Check to see if the inputs are valid and add them to the database or throw an error.
	if (!empty($username) and !empty($password) and !empty($confirm_password) and !empty($first_name) and !empty($last_name)
 		and !empty($email) and !empty($phone_no1) and !empty($phone_no2) and !empty($phone_no3)){	
		echo "Validating <br>";
		validate_username($username);
		validate_password($password, $confirm_password);
		validate_email($email);
		validate_name($first_name, $last_name);
		validate_phone_number($phone_no1, $phone_no2, $phone_no3);
	}
	else {
		echo "Please fill out all required fields.<br>";
	}
	function validate_username($username){
		echo "Validate within database. <br>";
	}
	function validate_password($password1, $password2){
		if($password1 == $password2){
			$length = strlen($password1);
			if($length < 8 || $length > 20){
				echo "Error: Password length must be between 8 and 20 characters.<br>";
			} 
			else 
				echo "Validate within database<br>";
		}
		else {
			echo "Passwords do not match!<br>";
		}
	}
	function validate_email($email){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Error: Invalid Email.<br>";
		}
		else{
			echo "Validate within database<br>";
		}
	}
	function validate_name($first_name, $last_name){
		if(preg_match('~[a-zA-Z]~', $first_name+$last_name)!=1){
			echo "Error: Numbers and special characters not allowed within name. <br>";
		}
		echo "Validate name within database.<br>";
	}
	function validate_phone_number($phone_num1, $phone_num2, $phone_num3){
		// check to see that it's entirely numbers
		if(strlen($phone_num1)==3 && strlen($phone_num2)==3 && strlen($phone_num3) ==4 && preg_match('~[0-9]~', $phone_num1+$phone_num2+$phone_num3)==1){
			echo "Validate phone within database. <br>";
		}
		else {
			echo "Error: Incorrect phone number format. <br>";
		}
	}
	?>
	<button onclick="history.go(-1);"> Back </button>
</body>
</html>