<h1>PROTOTYPE SIGNUP</h1>

<?php 
if($error !== null) {
    print "<p>" . $error . "</p>";
}
?>

<form action="signup.php" method="post">
Email: <input type="text" name="email"><br>
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
Repeat Password: <input type="password" name="repeatPassword"><br>

<input type="radio" name="accountType" value="customer" checked>Customer
<input type="radio" name="accountType" value="driver">Driver

<br>

<input type="submit" value="Sign up">