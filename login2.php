<!DOCTYPE html>
<html>
<?PHP
	//This script was created by Maxine Harnett, Kushal Joshi and Johnathan Kruse
	//This script is simply to test the user ability to log in to an existing account and display the user's info.

	//Initaial Database connection setup and message to notify developer.
	include 'configdb.php';
	include 'opendb.php';

	//echo '<script type="text/javascript">alert("This Worked!");</script>';

	//include 'closedb.php';
?>

<body>
	<?php
	//Consts defined for the name of the attributes in the tables of the database
	//This way, if a attribute name is changed, it can be changed here easily.
	const ATTRIBUTE_USERNAME = 'userName';
	const ATTRIBUTE_USER_ID = 'userId';
	const ATTRIBUTE_FULLNAME = 'fullName';
	const ATTRIBUTE_EMAIL = 'email';
	const ATTRIBUTE_PASSWORD = 'ps';
	const ATTRIBUTE_IS_DRIVER = 'isDriver';
	const ATTRIBUTE_AVATAR_CODE = 'avatarCode';

	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	// Check to see if the inputs are valid and add them to the database or throw an error.
	if (!empty($username) and !empty($password) and !empty($confirm_password)){
		echo "Validating... <br>";
		$user_record = validate_username($username);
		
		if ($user_record != NULL){
			
			$user_password = $user_record[ATTRIBUTE_PASSWORD];
			
			$user_password_validated = validate_password($password, $confirm_password,$user_password);

			if ($user_password_validated){
				print_user_details($user_record);
			}

		}
	}

	//Check if the entered username is actually entered correctly - search database and see if found
	function validate_username($username){
		$search_query_username="SELECT *
							    FROM user_profile
							    WHERE userName = '" . $username . "';";

   		//This is to tell the user if the username exists
		$return_result = search_database($search_query_username);
		$return_username = $return_result[ATTRIBUTE_USERNAME];
     	
     	$is_validated = "True";
     	if ($return_username != $username){
     		$is_validated = "False";
     		$return_result = NULL;
     	}

     	echo "Username Validated: " . $is_validated . "<br>";

     	return $return_result;
	}

	//Check if the entered passwords match and if it is correct for the password
	function validate_password($password1, $password2,$actual_password){
		$password_correct = False;
		if($password1 == $password2){
			$length = strlen($password1);
			if($length < 8 || $length > 20){
				echo "Error: Password length must be between 8 and 20 characters.<br>";
			} 
			else {
				if ($actual_password == $password1){
					echo "Password Validated: True";
					$password_correct = True;
				}
			}
				
		}
		else {
			echo "Passwords do not match!<br>";
		}

		return $password_correct;
	}

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


	//This is to search to see if specific terms exist in database
	function search_database($search_query){
		//Get the query results into an array
		$search_query_result=mysql_query($search_query);
		$search_query_results_parsed=mysql_fetch_array($search_query_result);
		//$returned_result = $search_query_results_parsed[$attribute_name];

		return $search_query_results_parsed;
	}

	?>
	<button onclick="history.go(-1);">Back </button>
</body>
</html>