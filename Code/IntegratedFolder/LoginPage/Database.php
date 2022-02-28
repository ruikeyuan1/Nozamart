<<<<<<< HEAD
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
=======
<?php

//Params to connect to a database
$host = "localhost";
$user = "root";
$pass = "";
$database = "newthreemusketeer";

//Connection to database
$con = mysqli_connect($host, $user, $pass, $database);

if(!$con){
  die("Database connection failed! Error: " . mysqli_connect_errno());
}
?>
>>>>>>> 7f9691c0e5f9e891a1ef5f8ebc885c368e5abf8e
