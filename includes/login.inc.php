<?php

if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) === true){
        
        header("location: ../login.php?error=emptyinput");       
        exit();
    }
        //user login with connection to the database
        loginUser($conn, $username, $pwd);

}else{
            header("location: ../login.php");
            exit();
        }
