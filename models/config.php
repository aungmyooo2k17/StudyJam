<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mysqli_login";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_select_db($conn, $dbname);
?>