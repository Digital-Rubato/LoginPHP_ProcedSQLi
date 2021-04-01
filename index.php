<?php

    include_once 'header.php';
    
?>
<section class="index-intro">
<?php
if(isset($_SESSION["usersuid"])){
        //welcome message
        echo "<p> Welcome! " . $_SESSION["useruid"] . "</p>";

    }
?>
<h1>This Is An Intro</h1>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima porro voluptas maxime dolore eveniet pariatur sapiente cumque quisquam illum sed!</p>
</section>

<section class="index-categories">
<h2>Some Basic Categories:</h2>
<div class="index-categories-list">
<div>
<h3>Fun Stuff</h3>
</div>
<div>
<h3>Serious Stuff</h3>
</div>
<div>
<h3>Exciting Stuff</h3>
</div>
<div>
<h3>Other Stuff</h3>
</div>
<!-- index-categories-list end div -->
</div>
</section>
<?php
include_once 'footer.php'
?>