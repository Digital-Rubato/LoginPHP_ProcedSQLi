<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // functions error catching
    // if it is anything besides false -> then throw an error
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        //adding the error into to the HTML input
        header("location: ../signup.php?error=emptyinput");
        
        // exit for stopping the script if it encounters an error
        exit();
    }
        // these functions have not been created yet but will be
        //invalid username
    if(invalidUid($uid) !== false){
        
        header("location: ../signup.php?error=invaliduid");
        
        exit();
    }
    //email invalid
    if(invalidEmail($email) !== false){
        
        header("location: ../signup.php?error=invalidemail");
        
        exit();
    }
    // password match check
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        
        header("location: ../signup.php?error=passwordnomatch");
        
        exit();
    }

    //check the username
    if(uidExists($conn, $username) !== false){
        
        header("location: ../signup.php?error=usernametaken");
        
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

} else {
    header("location: ../signup.php");
    exit();
}
