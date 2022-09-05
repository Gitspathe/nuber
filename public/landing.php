<?php
require("../app/Helper/Constants.php");
require(APP_DIR . '/Controller/LandingController.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Nuber. Uber - but with an N in front of it.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="style/material.min.css">
    <link rel="stylesheet" href="style/material_icons.css">
    <link rel="stylesheet" href="style/landing_dashboard_style.css">
    <script src="style/material.min.js"></script>
</head>

<body>

<?php

$controller = new App\Controller\LandingController();
$controller->output();

?>

</body>
</html>