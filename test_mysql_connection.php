<!DOCTYPE html>
<html>
<head>
<?PHP
	//Initaial Database connection setup and message to notify developer.
	include 'configdb.php';
	include 'opendb.php';
	$message = 'This worked!!!';

	echo '<script type="text/javascript">alert("'.$message.'");</script>';

	include 'closedb.php';
?>
</head>

<body>

<form action="Login2.php" method="post">
	Username: <input type="text" name="username"> <br>
	First Name: <input type="text" name="first_name"><br>
	Last Name: <input type="text" name="last_name"><br>
	Email: <input type="text" name="email"> <br>
	Phone Number: (<input type="test" name="phone_no1">) <input type="test" name="phone_no2"> - <input type="test" name="phone_no3"><br>
	Password: <input type="password" name="password"><br>
	Confirm Password: <input type="password" name="confirm_password"><br>
	<input type="submit">
</form>
</body>
</html>