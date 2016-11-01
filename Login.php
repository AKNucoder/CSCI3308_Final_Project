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
	
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	
	if(!$link){
		die('Could not connect: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db(DB_NAME, $link);
	
	if(!$db_selected) {
		die('Cant use ' . DB_NAME . ': ' . mysql_error());
	}
	
	$value = $_POST['Username'];
	$value1 = $_POST['Password'];
	$value2 = $_POST['Confirmpassword'];
	$value3 = $_POST['First_name'];
	$value4 = $_POST['Last_name'];
	$value5 = $_POST['Email'];
	$value6 = $_POST['Phoneno'];
	$value7 = $_POST['Major'];
	if (!empty($value) and !empty($value1) and !empty($value2) and !empty($value3) and !empty($value4) and !empty($value5) and !empty($value6) and !empty($value7)){
		
		//works --- checks to make sure the username entered is not taken
		function checkUsernameAvail($value){
			$query = mysql_query("SELECT Username FROM Users WHERE Username ='".$value."'");
			if (mysql_num_rows($query) !=0){
				echo( "Username already exists. Please enter a new username.");
				break;
			}
		}
		checkUsernameAvail($value);
		/*
		// --- checks to make sure the email address entered is a valid email address
		function validateEmail($value5){
			$query2 = mysql_query("SELECT Email FROM Users WHERE Email ='".$value5."'");
			if (mysql_num_rows($query) !=0){
				echo "Email already exists. Please sign in.";
				break;
			}
			else{
				if (filter_var($value5, FILTER_VALIDATE_EMAIL)) {
					echo("This is not a valid email address");
					break;
					} else {
						echo("This is a valid email address");
					}
			}
		}
		validateEmail($value5);
		*/
		//works --- checks to make sure the email address entered is not taken
		function checkEmailAvail($value5){
			$query3 = mysql_query("SELECT Email FROM Users WHERE Email ='".$value5."'");
			if (mysql_num_rows($query3) !=0){
				echo "This email is already in use. Please enter a new email or login.";
				break;
			}
		}
		checkEmailAvail($value5);
		//works -- checks if password and confirmpassword are the same
		function checkPasswordEquality($value1,$value2){
			$query4 = mysql_query("SELECT Password FROM Users WHERE Password ='".$value1."'");
			$query5 = mysql_query("SELECT Confirmpassword FROM Users WHERE Confirmpassword ='".$value2."'");
			if($query4 == $query5){
				echo "Passwords do not match. Please check your passwords.";
				break;
			}
			else{
				//echo "passwords match";
			}
		}
		checkPasswordEquality($value1,$value2);
		/*
		function checkPhoneNo($value6){
			$numbersOnly = ereg_replace("[^0-9]","",$value6);
			$numDigits = strlen($numbersOnly);
			if($numDigits == 10) {
				echo "Valid phone number";
			}
			else{
				"Invalid phone number";
				break;
			}
		}
		
		checkPhoneNo($value6);
		
		
		function checkPhoneNoAvail($value6){
			$query3 = mysql_query("SELECT Phoneno FROM Users WHERE Phoneno ='".$value6."'");		
			if (mysql_num_rows($query3) !=0){
				echo "Phone number already exists. Please enter a new phone number or login.";
				break;
			}
		}
		checkPhoneNoAvail($value6);
		*/
		$passwordmd5 = md5($value1);
		$confirmmd5 = md5($value2);
		
		$sql = "INSERT INTO Users (Username, Password, Confirmpassword, First_name, Last_name, Email, Phoneno, Major) VALUES ('$value', '$passwordmd5', '$confirmmd5', '$value3', '$value4', '$value5', '$value6', '$value7')";
		echo "Account created";
	}
	if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
		}
	
	
	mysql_close();
		
?>
</html>