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

if($_SESSION["user_accountType"] === "driver" && $_SESSION["user_uploadedDocuments"] === 0) {
    // If the user is a driver, they must upload documents first.
    $uploadController = new App\Controller\FileUploadController();
    $uploadController->output();
} else {
    // Regular landing page.
    require(APP_DIR . "/View/LandingDashboardView.php");
}

?>