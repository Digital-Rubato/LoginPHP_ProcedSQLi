<?php
session_start();
include_once 'includes/functions.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=na, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Php Login Project</title>
</head>
<body>
<nav>
<div class="wrapper">
<a href="index.php"><img src="img/logo-white.png" alt="blogs logo"></a>
<ul>
<li><a href="index.php"></a></li>
<li><a href="discover.php"></a></li>
<li><a href="blog.php"></a></li>
<?php
    if(isset($_SESSION["useruid"])){
        echo "<li><a href='profile.php'>Profile Page</a></li>";
        echo "<li><a href='logout.php'>Log out</a></li>";
    }else{
       echo" <li><a href='signup.php'>Sign Up</a></li>";
        echo '<li><a href="login.php">Login</a></li>';
    }

?>
</ul>
<!-- end wrapper div -->
</div>
</nav>

<div class="wrapper">