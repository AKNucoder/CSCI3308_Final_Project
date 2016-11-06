<!DOCTYPE html>
<html>
	<head>
   <title>Carpooling</title>
   <link rel="icon" href="logoLT.jpg" type="image/jpg" sizes="32x32">
 </head>
	<head>
		<link rel="Stylesheet" type="text/css" href="signin.css">
	</head>
	
	<ul>
		<li><a href ="homepage.html"><img border="0" src="home.png" width="15" height="15"></a></li>
		<li><a href="subjects.html">Subjects</a></li>
		<li style="float:right"><a class="active" href="about.html">About</a></li>
		<li style="float:right"><a class="active2" href="signin.php">Sign In as Student</a></li>
		<li style="float:right"><a class="active" href="signintutors.php">Sign In as Tutor</a></li>
	</ul>
	
<?php
	session_start();
/*
	$user = 'root';
	$pass = 'default';
	$db = 'LiveTutoringUsers';
	
	$db = new mysqli('localhost', $user, $pass, $db) or die("it's not working");
	*/
	
	define('DB_NAME', 'Carpool');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'default');
	define('DB_HOST', 'localhost');
	
	$db = new PDO('mysql:host=localhost;dbname=Carpool;charset=utf8mb4', 'root', 'default', array(PDO::ATTR_EMULATE_PREPARES => false, 
	 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	
	$db_selected = mysql_select_db(DB_NAME, $link);
	
	if(!$db_selected) {
		die('Cant use ' . DB_NAME . ': ' . mysql_error());
	}
	
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$confirm_password = $_POST['Confirmpassword'];
	$first_name = $_POST['First_name'];
	$last_name = $_POST['Last_name'];
	$email = $_POST['Email'];
	$phone = $_POST['Phoneno'];
	//$username7 = $_POST['Major'];
	if (!empty($username) and !empty($password) and !empty($confirm_password) and !empty($first_name) and !empty($last_name) and !empty($email) and !empty($phone) and !empty($username7)){
		
		checkUsernameAvail($username);
		/*
		// --- checks to make sure the email address entered is a valid email address
		function validateEmail($email){
			$query2 = mysql_query("SELECT Email FROM Users WHERE Email ='".$email."'");
			if (mysql_num_rows($query) !=0){
				echo "Email already exists. Please sign in.";
				break;
			}
			else{
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo("This is not a valid email address");
					break;
					} else {
						echo("This is a valid email address");
					}
			}
		}
		validateEmail($email);
		*/
	
		//checkEmailAvail($email);
		//checkPasswordEquality($password,$confirm_password);
		/*
		function checkPhoneNo($phone){
			$numbersOnly = ereg_replace("[^0-9]","",$phone);
			$numDigits = strlen($numbersOnly);
			if($numDigits == 10) {
				echo "Valid phone number";
			}
			else{
				"Invalid phone number";
				break;
			}
		}
		
		checkPhoneNo($phone);
		
		
		function checkPhoneNoAvail($phone){
			$query3 = mysql_query("SELECT Phoneno FROM Users WHERE Phoneno ='".$phone."'");		
			if (mysql_num_rows($query3) !=0){
				echo "Phone number already exists. Please enter a new phone number or login.";
				break;
			}
		}
		checkPhoneNoAvail($phone);
		*/
		//$passwordmd5 = md5($password);
		//$confirmmd5 = md5($confirm_password);
		
		//$sql = "INSERT INTO Users (Username, Password, Confirmpassword, First_name, Last_name, Email, Phoneno, Major) usernameS ('$username', '$passwordmd5', '$confirmmd5', '$first_name', '$last_name', '$email', '$phone', '$username7')";
		//echo "Account created";
	}
	/*if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
		}
	
	
	mysql_close();*/
	
	//works --- checks to make sure the username entered is not taken
	function checkUsernameAvail($username){
		foreach($db->query('SELECT Username FROM Users') as $stored_username){
			echo $stored_username
		}
	}

	//works -- checks if password and confirmpassword are the same
	/*function checkPasswordEquality($password,$confirm_password){
		if($password != $confim_password){
			echo "Passwords do not match.";
			return false;
		}
		$password_query = mysql_query("SELECT Password FROM Users WHERE Password ='".$password."'");
		if(mysql_num_rows($password_query) != 0){

		}
		
	}
		
	//works --- checks to make sure the email address entered is not taken
	function checkEmailAvail($email){
		$query3 = mysql_query("SELECT Email FROM Users WHERE Email ='".$email."'");
		if (mysql_num_rows($query3) !=0){
			echo "This email is already in use. Please enter a new email or login.";
			return false;
		}
		return true;
	}*/
?>
</html>