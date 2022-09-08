<?php

session_start();

if(!isset($_SESSION["auth"])) {
    session_abort();
    print "<p style='color:red;'>Unathorized access!</p>";
    exit;
}

require(APP_DIR . "/View/LandingDashboardView.php");

?>