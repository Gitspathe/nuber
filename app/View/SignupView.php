<?php 
if($error !== null) {
    print "<p>" . $error . "</p>";
}
?>

<div class="mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
    <main class="main mdl-layout__content">
        <div class="container mdl-grid">
            <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                <div class="content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col" style="padding-bottom:160px;">
                    <a href="index.php"><img src="images/nuberlogo.png" alt="NUBER" class="center" style="width:40%;"></a>
                    <div class="flex-container" style="padding-top:120px;">
                        <form action="signup.php" method="post">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display:block;">
                                <input class="mdl-textfield__input" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display:block;">
                                <input class="mdl-textfield__input" type="text" id="username" name="username">
                                <label class="mdl-textfield__label" for="username">Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display:block;">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="display:block;">
                                <input class="mdl-textfield__input" type="password" id="repeatPassword" name="repeatPassword">
                                <label class="mdl-textfield__label" for="repeatPassword">Repeat Password</label>
                            </div>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="optionCustomer" style="margin-left:50px;margin-bottom:20px;">
                                <input type="radio" id="optionCustomer" class="mdl-radio__button" name="accountType" value="customer" checked>
                                <span class="mdl-radio__label">Customer</span>
                            </label>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="optionDriver" style="margin-left:50px;margin-bottom:20px;">
                                <input type="radio" id="optionDriver" class="mdl-radio__button" name="accountType" value="driver">
                                <span class="mdl-radio__label">Driver</span>
                            </label>

                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect center" style="display:block;">
                                Sign up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>