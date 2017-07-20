<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:30
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user']) OR empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_URI'] != '/login.php'
        and $_SERVER['REQUEST_URI'] != '/register.php'
        and $_SERVER['REQUEST_URI'] != '/script-login.php'
        and $_SERVER['REQUEST_URI'] != '/script-register.php'
        and $_SERVER['REQUEST_URI'] != '/index.php'
        and $_SERVER['REQUEST_URI'] != '/login.php?'
        and $_SERVER['REQUEST_URI'] != '/register.php?'
        and $_SERVER['REQUEST_URI'] != '/script-login.php?'
        and $_SERVER['REQUEST_URI'] != '/script-register.php?'
        and $_SERVER['REQUEST_URI'] != '/index.php?') {
        header("Location: index.php");
        exit();
    }
}
else if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    if ($_SERVER['REQUEST_URI'] == '/login.php'
        or $_SERVER['REQUEST_URI'] == '/register.php'
        or $_SERVER['REQUEST_URI'] == '/script-login.php'
        or $_SERVER['REQUEST_URI'] == '/script-register.php'
        or $_SERVER['REQUEST_URI'] == '/index.php'
        or $_SERVER['REQUEST_URI'] == '/login.php?'
        or $_SERVER['REQUEST_URI'] == '/register.php?'
        or $_SERVER['REQUEST_URI'] == '/script-login.php?'
        or $_SERVER['REQUEST_URI'] == '/script-register.php?'
        or $_SERVER['REQUEST_URI'] == '/index.php?') {
        header("Location: list.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <title>BuyList</title>

    <!-- stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen+Mono" rel="stylesheet">
    <link href="stylesheets/style.css" rel="stylesheet" type="text/css">

    <!-- scripts -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div id="site_header">
    <img id="site_logo" src="./images/logo.png" alt="BuyList logo">
    <h1>BuyList</h1>
    <h2>list whatever you want to buy
        (even if you cannot afford it)</h2>
    <div class="clear"></div>
</div>

<div id="site_container">