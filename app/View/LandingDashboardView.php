    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Dashboard</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">...</label>
            </div>
          </div>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span><?php echo(htmlspecialchars($_SESSION["user_email"]))?></span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">home</i>Dashboard</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">face</i>Account</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">library_music</i>Music</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">directions_car</i>Route</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons" role="presentation">help_outline</i>Help</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="index.php?action=signout"><i class="material-icons" role="presentation">logout</i>Sign Out</a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <?php 
          if($_SESSION["user_accountType"] === "driver") {
            $fileUpload = new \App\Controller\FileUploadController();
            $fileUpload->output();

            if($_SESSION["user_uploadedDocuments"] === 1) { ?>
            <div class="mdl-card card mdl-shadow--4dp">
              <div class="mdl-card__title mdl-color--teal-400">
                <h2 class="mdl-card__title-text mdl-color-text--white">Driver only stuff</h2>
              </div>
              <div class="mdl-card__supporting-text">
                This menu thing doesn't do anything. But it exists to show that drivers and customers are able to access different resources.
                I'm currently making this text as large as possible in order to make it appear very professional and legit. Very cool and amazing.
              </div>
            </div>
            <div class="mdl-card card mdl-shadow--4dp">
              <div class="mdl-card__title mdl-color--teal-400">
                <h2 class="mdl-card__title-text mdl-color-text--white">Even more info</h2>
              </div>
              <div class="mdl-card__supporting-text">
                lol
              </div>
            </div>
          
          <?php } 
        } else if($_SESSION["user_accountType"] === "customer") { ?>
          <div class="mdl-card card mdl-shadow--4dp">
            <div class="mdl-card__title mdl-color--teal-400" >
              <h2 class="mdl-card__title-text mdl-color-text--white">Customer only stuff</h2>
            </div>
            <div class="mdl-card__supporting-text">
                NUBER prides itself on providing the highest possible quality service. Every driver goes through a rigorous training program of which
                only 10% survive.
                <br><br><a href="https://youtu.be/6wqzZOFOcYo">Here's a video of one of our professional drivers!</a>
            </div>
          </div>
          <div class="mdl-card card mdl-shadow--4dp">
            <div class="mdl-card__title mdl-color--teal-400" >
              <h2 class="mdl-card__title-text mdl-color-text--white">Statistics</h2>
            </div>
            <div class="mdl-card__supporting-text">
                EXAMPLE CARD WITH STUFF
            </div>
          </div>
        <?php } ?>

        </div>
      </main>
    </div>