<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "rick";
$dbPass = "";
$dbName = "Noza";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn){
  die("Database connection failed! Error: " . mysqli_connect_errno());
}
?>
