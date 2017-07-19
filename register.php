<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 17:08
 */
include "header.php";
session_start();
?>

<form method="post" action="script-register.php">
    <h1>Register</h1>
    <input type="text" name="username" id="username" placeholder="username">
    <br />
    <input type="email" name="email" id="email" placeholder="email">
    <br />
    <input type="password" name="password" id="password" placeholder="password">
    <br />
    <input type="password" name="rpassword" id="rpassword" placeholder="repeat password">
    <br />
    <div class="g-recaptcha" data-sitekey="6LdLqykUAAAAAKIUrOBcb2hD64WjX8G2UcElaFgP"></div>
    <br />
    <?php
    if (isset($_SESSION['non_matching_passwords'])) {
        echo $_SESSION['non_matching_passwords'];
        unset($_SESSION['non_matching_passwords']);
    }
    ?>
    <input type="submit" value="Register" class="submit">
    <h2>or</h2>
</form>
<form action="login.php">
  <input type="submit" value="Log in" class="submit">
</form>

<?php include "footer.php"; ?>