<!DOCTYPE html>
<html>
<body>

<?php

require("../app/Helper/Constants.php");
require(APP_DIR . '/Controller/SignupController.php');

$controller = new App\Controller\SignupController();
$controller->output();

?>

</body>
</html>