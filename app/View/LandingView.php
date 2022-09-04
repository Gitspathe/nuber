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

if($_SESSION["user_accountType"] === "driver") {
    $uploadController = new App\Controller\FileUploadController();
    $uploadController->output();
}

print "<p>Welcome, " . $_SESSION["user_username"] . "</p>";
?>