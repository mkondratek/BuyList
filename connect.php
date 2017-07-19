<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:31
 */

$host = "localhost";
$root = "root";
$passwd = "";
$dbname = "buylistdb";

try {
    $db = new mysqli($host, $root, $passwd, $dbname);
} catch (Exception $e) {
    echo "<span style='color: red;'> Server error! We are sorry. Please try again later.</span>";
}

//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}