<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpproject01";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// error catch
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

