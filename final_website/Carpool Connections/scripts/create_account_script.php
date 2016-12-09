<?php
// Start the session - http://www.w3schools.com/php/php_sessions.asp
session_start();
?>
<!-- 
This script was created by Maxine Harnett, Kushal Joshi and Johnathan Kruse
This script is simply to test the user ability to create a new account.
-->
<!DOCTYPE html>
<html>
<?PHP
	include 'support/configdb.php';
	include 'support/opendb.php';
	include 'support/send_query_to_db.php';
	include 'support/attribute_names.php';
?>

<body>
	<?php
	$error = NULL;
	$username = $_POST["username"];
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$email = $_POST["email"];
	$phone_no = $_POST["phone_no"];
	$city = $_POST["city"];
	//$state = $_POST["password"];
	$state = "CO";
	$zip = $_POST["zip"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	$username_validated = False;
	$password_validated = False;
	$email_validated_validated = False;
	$name_validated = False;
	$phone_validated = False;
	$city_validated = False;
	$state_validated = False;
	$zip_validated = False;

	// Check to see if the inputs are valid and add them to the database or throw an error.
	if (!empty($username) and !empty($password) and !empty($confirm_password) and !empty($first_name) and !empty($last_name)
 		and !empty($email) and !empty($phone_no)){	
		//echo "Validating <br>";
		$username_validated = validate_username($username);
		$password_validated = validate_password($password, $confirm_password);
		$email_validated = validate_email($email);
		$name_validated = validate_no_special_characters($first_name.$last_name);
		$phone_validated = validate_phone_number($phone_no);
		$city_validated = validate_no_special_characters($$city);
		$state_validated = validate_no_special_characters($state);
		$zip_validated = validate_zip($zip);

		if (!$username_validated){
			$error = "Username Not Validated<br>";
		}
		if (!$password_validated){
			$error = "Password Not Validated<br>";
		}
		if (!$email_validated){
			$error = "Email Not Validated<br>";
		}
		if (!$name_validated){
			$error = "Name Not Validated<br>";
		}
		if (!$phone_validated){
			$error = "Phone Not Validated<br>";
		}
		if (!$city_validated){
			$error = "Error: Numbers and special characters not allowed within city name. <br>";
		}
		if (!$state_validated){
			$error = "Error: Numbers and special characters not allowed within state name. <br>";
		}
		if (!$zip_validated){
			$error = "Zip Code Not Validated<br>";
		}

		//Dont send the info to the database until all information has been validated.
		if ($username_validated && $password_validated && $email_validated && $name_validated && $phone_validated && $city_validated && $state_validated && $zip_validated){
			$full_name = trim($first_name) . " " . trim($last_name);
			//$phone_no = $phone_no1 . $phone_no2 . $phone_no3;

			//Since two different tables are used to store the user profile and user contact details, two SQL statements were made.
			$My_SQL_create_new_user_profile = "INSERT INTO `".TABLE_USER_PROFILE."` (`".ATTRIBUTE_FULLNAME."`, `".ATTRIBUTE_EMAIL."`, `".ATTRIBUTE_PASSWORD."`,`".ATTRIBUTE_USERNAME."`,".ATTRIBUTE_IS_DRIVER.",".ATTRIBUTE_AVATAR_CODE.") VALUES 
												('".$full_name ."','".$email."','".$password."','".$username."',0,0);";

			$My_SQL_create_new_user_contact = "INSERT INTO `".TABLE_USER_CONTACT."` (`".ATTRIBUTE_CITY."`, `".ATTRIBUTE_STATE."`,`".ATTRIBUTE_ZIP_CODE."`,`".ATTRIBUTE_PHONE."`) VALUES
												('".$city."','".$state."','".$zip."','".$phone_no."');";

			$My_SQL_create_new_user_profile_sent = mysql_query($My_SQL_create_new_user_profile);
			if ($My_SQL_create_new_user_profile_sent){
				$My_SQL_create_new_user_contact_sent = mysql_query($My_SQL_create_new_user_contact);

				if ($My_SQL_create_new_user_contact_sent){
					$error = "Account created. <br>";
					 $_SESSION["user_id"] = get_userId($username);
                    $_SESSION["user_name"] = $username;
					//Must give credit to Santak Kumar Mishra for showing how to redirect to another page using javascript
                    //http://stackoverflow.com/questions/15000591/redirect-to-another-page-after-button-submit-->
					echo '<script type="text/javascript"> ';
					echo '  alert("You are now signed-in as: '.$username.'");';
					echo '	window.location.assign("'.'index.html'.'");';
                    echo '</script>';

                   
				}
				else{
					$error = "Error: Could not save user contact data to database. Contact support. <br>";
				}
			}
			else{
				$error = "Error: Could not save user profile to database. Contact support. <br>";
			}
		}

	}
	else {
		$error = "Please fill out all required fields.<br>";
		//echo "Please fill out all required fields.<br>";
	}

	//Used to check if username already exists before creating
	function validate_username($username){
		$search_query_username="SELECT *
							    FROM ". TABLE_USER_PROFILE . "
							    WHERE " . ATTRIBUTE_USERNAME . " = '" . $username . "';";
   		
   		//This is to tell the user if the username exists
		//If a result returns, then we know the username has already been taken.
		$return_result = send_query_to_db($search_query_username);
		$is_validated = True;
		$return_username = NULL;
		if ($return_result!=False){
			$return_username = $return_result[ATTRIBUTE_USERNAME];
			$is_validated = False;
			$error = "Error: Username already taken <br>";
     	}
     	
     	return $is_validated;
	}

	//Returns userId
	function get_userId($username){
		$search_query_username="SELECT ". ATTRIBUTE_USER_ID ."
							    FROM ". TABLE_USER_PROFILE . "
							    WHERE " . ATTRIBUTE_USERNAME . " = '" . $username . "';";
   		
   		//This is to tell the user if the username exists
		//If a result returns, then we know the username has already been taken.
		$return_result = send_query_to_db($search_query_username);
		$is_validated = True;
		$return_user_id = 0;
		if ($return_result!=False){
			$return_user_id = $return_result[ATTRIBUTE_USER_ID];
			$is_validated = False;
			//$error = "Error: UserID<br>";
     	}
     	
     	return $return_user_id;
	}
	

	//Check to ensure password of proper conventions
	function validate_password($password1, $password2){
		$validation = False;

		if($password1 == $password2){
			$length = strlen($password1);
			if($length < 8 || $length > 20){
				$error = "Error: Password length must be between 8 and 20 characters.<br>";
			} 
			else 
				$validation = True;
		}
		else {
			$error = "Passwords do not match!<br>";
		}
		return $validation;
	}

	//Ensure user has entered a correct email
	function validate_email($email){
		$validation = False;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Error: Invalid Email.<br>";
		}
		else{
			//echo "Validate within database<br>";
			$validation = True;
		}
		return $validation;
	}

	//Check if parameter has any special chars. If so, return False, else True.
	function validate_no_special_characters($string_to_validate){
		$validation = True;

		if(preg_match('~[^a-zA-Z ]~', $string_to_validate)){
			$validation = False;
		}

		return $validation;
	}

	//Check if phone number is of proper length and only numbers
	function validate_phone_number($phone_num){
		$validation = False;

		// check to see that it's entirely numbers
		if(strlen($phone_num)==10 && preg_match('~[0-9]~', $phone_num)==1){
			//echo "Validate phone within database. <br>";
			$validation = True;
		}
		else {
			$error = "Error: Incorrect phone number format. <br>";
		}

		return $validation;
	}

	//Ensure zip is only numbers, return true if so
	function validate_zip($zip){
		$validation = True;

		if(preg_match('~[^0-9]~', $zip) && len($zip) < 6){
			$error = "Error: Only numbers allowed in the zip code. Max length of 5 numbers only. <br>";
			$validation = False;
		}
		return $validation;
	}
	include 'support/closedb.php';
	/*
	echo '<script>';
	echo '$(document).ready(function() {';
	echo 	"$('#error_message').text(".$error.")";
	echo '})';
	echo '</script>';
	echo '<br>'.$error;
	*/
	?>

	<!-- <button onclick="history.go(-1);"> Back </button> -->
</body>
</html>