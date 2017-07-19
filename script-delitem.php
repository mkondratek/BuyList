<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 15.07.17
 * Time: 16:18
 */

require_once "config.php";

$sql = "delete from items where name = " . $_POST["delname"] . ";";

$log = fopen("log.txt", "a");

if (mysqli_query($db, $sql) == true) {
    fwrite($log, date("d-m-Y h:i:sa") . " ITEM DELETED\n" . $sql . "\n");
}
else {
    fwrite($log, date("d-m-Y h:i:sa") . " DELETE ERROR\n" . $sql . "\n");
}

fclose($log);

header("Location: list.php");