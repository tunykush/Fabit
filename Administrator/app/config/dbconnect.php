<?php

$servername = "talsprddb02.int.its.rmit.edu.au:3306";
$username = "COSC3046_2402_UGRD_1479_G25";
$password = "5lnueMpp5EKC";
$dbname = "COSC3046_2402_UGRD_1479_G25";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

