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

mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $db = new mysqli($host, $root, $passwd, $dbname);
    if ($db->connect_errno !== 0) {
        throw new Exception(mysqli_connect_errno());
    }
} catch (Exception $e) {
    echo "<span style='color: red;'> Server error! We are sorry. Please try again later.</span>";

    $log = fopen("log.txt", "a");
    fwrite($log, date("d-m-Y h:i:sa") . " DB CONNECTION\n" . "code: " . $e . "\n");
    fclose($log);
    exit();
}

//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}