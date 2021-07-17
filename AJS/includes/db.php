<?php 
  error_reporting(0);
 
$servername = "localhost";
$username = "luckydnu_game";
$password = "test@2020#";
$database = "luckydnu_game";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
$con->query("SET SESSION sql_mode=''");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>