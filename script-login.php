<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:32
 */

session_start();
require_once "config.php";

$username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
$password = sha1(htmlentities($_POST["password"], ENT_QUOTES, "UTF-8"));

$sql = sprintf("select username from users
where users.username = '%s' and users.password = '%s'",
    mysqli_real_escape_string($db, $username),
    mysqli_real_escape_string($db, $password));

$log = fopen("log.txt", "a");

if ($result = @$db->query($sql)) {
    if ($user = $result->fetch_object()) {
        $_SESSION['user'] = $user->username;
        fwrite($log, date("d-m-Y h:i:sa") . " LOGGED IN\n" . $sql . "\n");
        header("Location: list.php");
    }else {
        $_SESSION['login_error'] = "<div id=\"form_error\">Incorrect username or password!</div>";
        fwrite($log, date("d-m-Y h:i:sa") . " LOGIN ERROR - object\n" . $sql . "\n");
        header("Location: login.php");
    }
    fwrite($log, "info: ");
    foreach ($user as $u) {
        fwrite($log, $u . " ");
    }
    fwrite($log, "\n");
}
else {
    fwrite($log, date("d-m-Y h:i:sa") . " LOGIN ERROR - query\n" . $sql . "\n");
    header("Location: login.php");
}

$db->close();