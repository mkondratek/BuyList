<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 15.07.17
 * Time: 19:27
 */

session_start();
unset($_SESSION['user']);
session_unset();

header("Location: index.php");