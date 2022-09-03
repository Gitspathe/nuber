<!DOCTYPE html>
<html>
<body>

<?php

require("../app/Constants.php");
require(APP_DIR . '/Model/LoginModel.php');
require(APP_DIR . '/Controller/LoginController.php');

$controller = new App\Controller\LoginController();
$controller->output();

?>

</body>
</html>