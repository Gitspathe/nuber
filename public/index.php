<?php 
require("../app/Helper/Constants.php");
include(ROOT_DIR . '/vendor/autoload.php');
require(APP_DIR . '/Controller/IndexController.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nuber</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Nuber. Uber - but with an N in front of it.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style/material.min.css">
    <link rel="stylesheet" href="style/material_icons.css">
    <link rel="stylesheet" href="style/home_style.css">
    <link rel="icon" type="image/x-icon" href="/favicon.png">
    <script src="style/material.min.js"></script>
</head>

<body>

<?php

$controller = new App\Controller\IndexController();
$controller->output();

?>

</body>
</html>