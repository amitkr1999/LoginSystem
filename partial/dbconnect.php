<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "users";
$conn = mysqli_connect($servername, $username, $password, $database);
// $result = mysqli_query($conn, $sql);
if(!$conn) {
     die("You are not connected sucessfully" . mysqli_connect_error());
}


?>