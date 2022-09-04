<!DOCTYPE html>
<html>
<body>

<?php

require("../app/Helper/Constants.php");
require(APP_DIR . '/Model/LandingModel.php');
require(APP_DIR . '/Controller/LandingController.php');

$controller = new App\Controller\LandingController();
$controller->output();

?>

</body>
</html>