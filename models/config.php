<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mysqli_login";
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname, $conn);
?>