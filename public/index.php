<?php 
require("../app/Helper/Constants.php");
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
    <link rel="stylesheet" href="style/home_style.css">
    <script src="style/material.min.js"></script>
</head>

<body>
    <div class="mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      <main class="main mdl-layout__content">
        <div class="container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <h3>Nuber</h3>
              <p>
                Nuber. Uber - but with an N in front of it.
              </p>
              <form action="login.php" style="display:inline;">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                    Login
                </button>
              </form>
              <form action="signup.php" style="display:inline;">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="margin-left: 3vh">
                    Sign Up
                </button>
              </form>
          </div>
        </div>
      </main>
    </div>
  </body>

</body>
</html>