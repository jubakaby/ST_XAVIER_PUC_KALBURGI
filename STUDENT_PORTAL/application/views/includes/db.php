<?php
date_default_timezone_set("Asia/Kolkata"); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sjboys";
//  $servername = "localhost";
//  $username = "schoolphins";
//  $password = "chandu@123";
// $dbname = "schoolphins";
try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
     echo "Connection failed: " . $e->getMessage();
    }
?>