<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:32
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "connect.php";

//remember username
$_SESSION['r_username'] = $_POST['username'];

$username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
$password = $_POST["password"];

$sql = sprintf("SELECT username, password FROM users
WHERE users.username = '%s'", mysqli_real_escape_string($db, $username));

$log = fopen("log.txt", "a");

function incorrect_input(&$file) {
    global $sql;
    $_SESSION['login_error'] = "<div id=\"form_error\">Incorrect username or password!</div>";
    fwrite($file, date("d-m-Y h:i:sa") . " LOGIN ERROR\n" . $sql . "\n");
    header("Location: /login.php");
}

if ($result = @$db->query($sql)) {
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            fwrite($log, date("d-m-Y h:i:sa") . " LOGGED IN\n" . $sql . "\n");
            header("Location: /list.php");
        } else {
            incorrect_input($log);
        }
    } else {
        incorrect_input($log);
    }

    $result->free();
} else {
    incorrect_input($log);
}

fclose($log);
$db->close();

