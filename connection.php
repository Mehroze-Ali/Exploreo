<?php
$host = "127.0.0.1";   
$user = "root";        
$pass = "";            
$db   = "travelagencysystem";  

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>
