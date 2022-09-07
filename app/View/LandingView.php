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

require(APP_DIR . "/View/LandingDashboardView.php");

?>