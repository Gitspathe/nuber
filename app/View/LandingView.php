<h1>PROTOTYPE LANDING PAGE</h1>

<?php

session_start();

if($error !== null) {
    print "<p>" . $error . "</p>";
}

print "<p>Welcome, " . $_SESSION["user_username"] . "</p>";
?>