<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    //check if data exists or not
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        //if there is a mistake return true
        $result = true;
    } else {

        //no empty fields return false
        $result = false;
    }
    return $result;
}

//invalid uid
function invalidUid($username){

    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;

    } else {

        //no empty fields return false
        $result = false;
    }
    return $result;
}

    //invalid email
    function invalidEmail($email){

        $result;
        //check if email is correct
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
    
        } else {
    
            //no empty fields return false
            $result = false;
        }
        return $result;
    }
        function pwdMatch($pwd, $pwdRepeat){

            $result;
            // check if passwords match
            if($pwd !== $pwdRepeat){
                $result = true;
        
            } else {
        
                //no empty fields return false
                $result = false;
            }
            return $result;
    
}

//db connect and check if username exists
function uidExists($conn, $username){

    // select all from the users table 
    //? is a placeholder, using prepared statements which protects against SQL injection
    //sql stmt to the db first then fill in the blanks 
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    //runs code without user input to protect from injection
    $stmt = mysqli_stmt_init($conn);
    //check for failure
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // ss for two strings
    mysqli_stmt_bind_param($stmt, "ss",$username, $username);
    // checking if this user already exists in the db
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    //checking if the stmt has data on it
    //assign row while checking for T or F
    if($row = mysqli_fetch_assoc($resultData)){
        // return all data from db if the user does exist (for sign up and log in)
        return $row;

    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){

    // select all from the users table 
    //? is a placeholder, using prepared statements which protects against SQL injection
    //sql stmt to the db first then fill in the blanks 
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    //runs code without user input to protect from injection
    $stmt = mysqli_stmt_init($conn);
    //check for failure
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    //latest hashing algorithm
    //used to protect the user
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // 4 s's for 4 strings
    //need to hash password
    //added $hashedPwd from $pwd
    mysqli_stmt_bind_param($stmt, "ssss",$name, $email, $username, $hashedPwd);
    // checking if this user already exists in the db
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("location: ../signup.php?error=none");
    exit();

}

function emptyInputLogin($username, $pwd){
    $result;
    //check if data exists or not
    if( empty($username) || empty($pwd)){
        //if there is a mistake return true
        $result = true;
    } else {

        //no empty fields return false
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){

    //checking for username exists only useful for loging in with the username
    $uidExists = uidExists($conn, $username);

    //error handler if the Uname or Email doesnt exists
    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    //uses an assoc array which are names instead of numbers. in this case it will grab the names of the  table
    $pwdHashed = $uidExists["usersPwd"];

    //check if the password matches the db, check user input vs. db (this will check the hashed password to the db password that is hashed)

    //idk if this is in or out of the if stmt
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();

    } 
    // log in the user to the site
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php?error=none");
        exit();
    }
}
