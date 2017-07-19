<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:29
 */
session_start();
unset($_SESSION['user']);

include "./header.php"; ?>

<div id="logbutton">
<form action="login.php" id="logbutton">
    <input type="submit" value="Log in" class="submit">
</form>
</div>
<div id="regbutton">
<form action="register.php">
    <input type="submit" value="Register" class="submit">
</form>
</div>
<div class="clear"></div>

<?php include "./footer.php"; ?>
