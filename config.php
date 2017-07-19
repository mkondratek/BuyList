<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:31
 */

session_start();

$db = new mysqli("localhost", "root", "", "buylistdb");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (!isset($_SESSION['user']) OR empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_URI'] != './login.php'
        or $_SERVER['REQUEST_URI'] != './register.php'
        or $_SERVER['REQUEST_URI'] != './index.php') {
        header("Location: index.php");
    }
}
else if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_URI'] == './login.php'
        or $_SERVER['REQUEST_URI'] == './register.php'
        or $_SERVER['REQUEST_URI'] == './index.php') {
        header("Location: list.php");
    }
}