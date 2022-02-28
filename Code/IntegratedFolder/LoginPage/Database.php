<?php
//Params to connect to a database
$host = "localhost";
$user = "root";
$pass = "";
$database = "Noza";

//Connection to database
$con = mysqli_connect($host, $user, $pass, $database);

if(!$con){
  die("Database connection failed! Error: " . mysqli_connect_errno());
}
?>
