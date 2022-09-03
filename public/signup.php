<!DOCTYPE html>
<html>
<body>

<?php

require("../app/Constants.php");
require(APP_DIR . '/Model/SignupModel.php');
require(APP_DIR . '/Controller/SignupController.php');

$controller = new App\Controller\SignupController();
$controller->output();

?>

</body>
</html>