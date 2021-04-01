<?php

    include_once 'header.php';
    
?>
<section class="signup-form">
<h2>Sign Up</h2>
<div class="signup-form-form">
<!-- pass the data baton to the next page -->
<form action="includes/signup.inc.php" method="post">
    <!-- post good for hiding passwords etc -->
    <!-- sign up form -->
    <input type="text" name="name" placeholder="Full Name">
    <input type="text" name="email" placeholder="Email...">
    <input type="text" name="uid" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdrepeat" placeholder="Repeat Password">
    <button type="submit" name="submit">Sign Up</button>
</form>
</div>

<?php 
//error catch
//check if the url has a certain URL
if (isset($_GET["error"])){

if($_GET["error"] == "emptyinput"){
    echo "<p> fill in all fields </p>";
}
 else if ($_GET["error"] == "invaliduid"){
    echo "<p>need proper username</p>";
}
 else if ($_GET["error"] == "invalidemail"){
    echo "<p>need proper email</p>";
}
else if ($_GET["error"] == "passwordsdontmatch"){
    echo "<p>passwords dont match</p>";
}
else if ($_GET["error"] == "usernametaken"){
    echo "<p>username already in use</p>";
}
else if ($_GET["error"] == "stmtfailed"){
    echo "<p>something went wrong</p>";
}
else if ($_GET["error"] == "none"){
    echo "<p>signup complete!</p>";
}
}
?>


</section>


<?php
include_once 'footer.php'
?>