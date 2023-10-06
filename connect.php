<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="articles";

  $conn = mysqli_connect($servername, $username, $password,$dbname);
  // set the PDO error mode to exception
if(!$conn){
die('error');

}
?>