<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 17:09
 */

require_once "config.php";

$email = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
$username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
$password = sha1(htmlentities($_POST["password"], ENT_QUOTES, "UTF-8"));

if ($password !== $_POST["rpassword"]) {
    header("Location: register.php");
    $_SESSION['non_matching_passwords'] = "<div id=\"form_error\">Non matching passwords!</div>";
    exit(0);
}

$sql = sprintf("INSERT INTO users (username, email, password)
VALUES ('%s', '%s', '%s')",
    mysqli_real_escape_string($db, $username),
    mysqli_real_escape_string($db, $email),
    mysqli_real_escape_string($db, $password));

$log = fopen("log.txt", "a");

if (mysqli_query($db, $sql) === TRUE) {
    fwrite($log, date("d-m-Y h:i:sa") . " REGISTRATION\n" . $sql . "\n");
} else {
    fwrite($log, date("d-m-Y h:i:sa") . " REGISTRATION ERROR\n"
        . $sql . "\n" . $db->error . "\n");
}

fclose($log);

header("Location: login.php");

$db->close();