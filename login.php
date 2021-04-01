<?php

    include_once 'header.php';
    
?>
<section class="signup-form">
<h2>Log In</h2>
<div class="signup-form-form">
<!-- pass the data baton to the next page -->
<form action="includes/login.inc.php" method="post">
    <!-- post good for hiding passwords etc -->
    <!-- sign up form -->
    <input type="text" name="uid" placeholder="Username/Email">
    <input type="password" name="pwd" placeholder="Password"> 
    <button type="submit" name="submit">Sign Up</button>
</form>
</div>

<?php 
//error catch
//check if the url has a certain URL
if (isset($_GET["error"])){
if($_GET["error"] == "emptyinput"){
    echo "<p>fill in all fields </p>";
} else if ($_GET["error"] == "wronglogin"){
    echo "<p>Incorrect login</p>";
}
} 
// this was a little confusing
?>

</section>

<!-- didnt know i could just include the last part of my HTML like what. -->

<?php
include_once 'footer.php'
?>