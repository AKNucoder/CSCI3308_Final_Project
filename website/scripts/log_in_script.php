<?php
// Start the session - http://www.w3schools.com/php/php_sessions.asp
session_start();
?>
<!-- 
This script was created by Maxine Harnett, Kushal Joshi and Johnathan Kruse
This script is simply to test the user ability to log in to an existing account and display the user's info.
A separate script will be used for new users, which is create_account_form.php
-->
<!DOCTYPE html>
<html>
<?PHP
	include 'support/configdb.php';
	include 'support/opendb.php';
	include 'support/send_query_to_db.php';
	include 'support/attribute_names.php';
	//echo '<script type="text/javascript">alert("This Worked!");</script>';
?>

<body>
	<?PHP
	$error;
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Check inputs to log in the existing user.
	if (!empty($username)){
		$user_record = validate_username($username);
		
		if ($user_record != NULL){
			
			$user_password = $user_record[ATTRIBUTE_PASSWORD];
			
			$user_password_validated = validate_password($password,$user_password);

			if ($user_password_validated){
				$_SESSION["user_id"] = get_userId($username);
                $_SESSION["user_name"] = $username;
				//Must give credit to Santak Kumar Mishra for showing how to redirect to another page using javascript
                //http://stackoverflow.com/questions/15000591/redirect-to-another-page-after-button-submit
				echo '<script type="text/javascript"> ';
				echo '	window.location.assign("'.LOG_IN_WORKED.'");';
                echo '</script>';

                
			}
			else{
				$error = "Error: Username or Password do not match.";
			}

		}
		else{
			$error = "Error: Username or Password do not match.";
		}
	}
	else{
		$error = "Error: Please type in a user name.";
	}

	//Check if the entered username is actually entered correctly - search database and see if found
	function validate_username($username){
		$search_query_username="SELECT *
							    FROM ". TABLE_USER_PROFILE . "
							    WHERE " . ATTRIBUTE_USERNAME . " = '" . $username . "';";

   		//This is to tell the user if the username exists
		$return_result = send_query_to_db($search_query_username);
     	
     	$return_username = NULL;
     	if ($return_result != False){
			$return_username = $return_result[ATTRIBUTE_USERNAME];
     	}

     	$is_validated = "True";
     	if ($return_username != $username){
     		$is_validated = "False";
     		$return_result = NULL;
     	}

     	$error = "Username Validated: " . $is_validated . "<br>";

     	return $return_result;
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

	//Check if the entered passwords match and if it is correct for the password
	function validate_password($password1,$actual_password){
		$password_correct = False;
		$length = strlen($password1);
		if($length < 8 || $length > 20){
			$error = "Error: Password length must be between 8 and 20 characters.<br>";
		} 
		else {
			if ($actual_password == $password1){
				$error = "Password Validated: True <br>";
				$password_correct = True;
			}
			else{
				$error = "Password Validated: False <br>";
			}
		}

		return $password_correct;
	}

	/*
	//This function simply prints all of the user's details.
	function print_user_details($user_record){
		$user_name = $user_record[ATTRIBUTE_USERNAME];
		$user_id = $user_record[ATTRIBUTE_USER_ID];
		$user_fullname = $user_record[ATTRIBUTE_FULLNAME];
		$user_email = $user_record[ATTRIBUTE_EMAIL];
		$user_password = $user_record[ATTRIBUTE_PASSWORD];
		$user_is_driver = $user_record[ATTRIBUTE_IS_DRIVER];
		$user_avatar_code = $user_record[ATTRIBUTE_AVATAR_CODE];

		echo "<br>";
		echo "Username: "    . $user_name        . "<br>";
		echo "User ID: "     . $user_id          . "<br>";
		echo "Full Name: "   . $user_fullname    . "<br>";
		echo "Email: "       . $user_email       . "<br>";
		echo "Password: ***" . "<br>";
		echo "Is a Driver: " . $user_is_driver   . "<br>";
		echo "Avatar Code: " . $user_avatar_code . "<br>";
	}
	*/

	include 'support/closedb.php';
	echo "<br>" . $error;
	?>
	<!--<button onclick="history.go(-1);">Back </button> -->

</body>
</html>