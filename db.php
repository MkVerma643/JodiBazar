<?php 
  //error_reporting(0);
 error_reporting( ~E_NOTICE);
 
 $servername = "localhost";
 $username = "kalyaopt_root";
 $password = "kalyaopt_root";
 $database = "kalyaopt_jodi_game";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);
$con->query("SET SESSION sql_mode=''");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>