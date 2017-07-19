<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 17:09
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "connect.php";

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

// -- start of validation --

$everythingisfine = true;

if (strlen($username) < 5 || strlen($username) > 20 || !ctype_alnum($username)) {
    $_SESSION['e_username'] = "<div id=\"form_error\">Use 5 to 20 alphanumeric characters.</div>";
    $everythingisfine = false;
}

$email_tmp = filter_var($email, FILTER_SANITIZE_EMAIL);
if ($email_tmp !== $email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['e_email'] = "<div id=\"form_error\">Invalid email.</div>";
    $everythingisfine = false;
}

if (strlen($password) < 8) {
    $_SESSION['e_passwords'] = "<div id=\"form_error\">Password should have at least 8 characters.</div>";
    $everythingisfine = false;
} else if ($password !== $_POST["rpassword"]) {
    $_SESSION['e_passwords'] = "<div id=\"form_error\">Non matching passwords.</div>";
    $everythingisfine = false;
}

$secret_key = "6LdLqykUAAAAAAdceeQF7DzVOEFY-X_A1gAryaMY";

$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

$responseData = json_decode($verifyResponse);

if($responseData->success) {
    $everythingisfine = false;
    $_SESSION['e_bot'] = "<div id=\"form_error\">Confirm being a human.</div>";
}

if (!$everythingisfine) {
    header("Location: /register.php");
    exit(0);
}
// -- end of validation --

$password = password_hash($password, PASSWORD_DEFAULT);

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
$db->close();

header("Location: /login.php");