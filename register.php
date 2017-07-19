<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 17:08
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "header.php";

function print_error($error)
{
    if (isset($_SESSION[$error])) {
        echo $_SESSION[$error];
        unset($_SESSION[$error]);
    }
}

?>

    <form method="post" action="/script-register.php">
        <h1>Register</h1>
        <input type="text" name="username" id="username" placeholder="username">
        <br/>
        <?php print_error('e_username'); ?>
        <input type="email" name="email" id="email" placeholder="email">
        <br/>
        <?php print_error('e_email'); ?>
        <input type="password" name="password" id="password" placeholder="password">
        <br/>
        <input type="password" name="rpassword" id="rpassword" placeholder="repeat password">
        <br/>
        <?php print_error('e_passwords'); ?>
        <div class="g-recaptcha" data-sitekey="6LdLqykUAAAAAKIUrOBcb2hD64WjX8G2UcElaFgP"></div>
        <br/>
        <?php print_error('e_bot'); ?>
        <input type="submit" value="Register" class="submit">
        <h2>or</h2>
    </form>
    <form action="/login.php">
        <input type="submit" value="Log in" class="submit">
    </form>

<?php include_once "footer.php"; ?>