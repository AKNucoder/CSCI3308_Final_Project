<?php
//This script was created by Johnathan Kruse with help from http://www.php-mysql-tutorial.com/wikis/mysql-tutorials/connect-to-mysql-database.aspx
//This script opens the initial connection with the sql database.

$db_conn = mysql_connect($db_host, $db_user, $db_pass) or die  ('Error connecting to mysql ' . $db_host);
$db_selected = mysql_select_db($db_name);

//Don't run the website if a connection is not established.
if(!$db_selected) {
		die('Cant use ' . $db_name . ': ' . mysql_error());
}
?>