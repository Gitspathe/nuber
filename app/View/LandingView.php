<h1>PROTOTYPE LANDING PAGE</h1>

<?php

session_start();

if(!isset($_SESSION["auth"])) {
    session_abort();
    print "<p>Unathorized access!</p>";
    exit;
}

if($error !== null) {
    print "<p>" . $error . "</p>";
}

print "<p>Welcome, " . $_SESSION["user_username"] . "</p>";
?>