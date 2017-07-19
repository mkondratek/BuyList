<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:31
 */

session_start();
include "header.php";
?>

<form method="post" action="script-login.php">
    <h1>Log in</h1>
    <input type="text" name="username" id="username" placeholder="username">
    <br />
    <input type="password" name="password" id="password" placeholder="password">
    <br />
    <?php
    if (isset($_SESSION['login_error'])) {
        echo $_SESSION['login_error'];
        unset($_SESSION['login_error']);
    }
    ?>
    <input type="submit" value="Log in" class="submit">
    <h2>or</h2>
</form>
    <form action="register.php">
        <input type="submit" value="Register" class="submit">
    </form>
<?php include "footer.php"; ?>