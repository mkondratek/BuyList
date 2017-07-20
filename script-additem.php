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

$target_path = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$target_path = $target_path . basename( $_FILES['file']['name']);
$file_location = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
echo $target_path;
exit();
$username = $_SESSION['user'];
$name = htmlentities($_POST['name']);
$descpt = htmlentities($_POST['description']);
$price = htmlentities($_POST['price']);
$link = htmlentities($_POST['link']);

$sql = sprintf("INSERT INTO items (user, name, description, price, link, image)
VALUES ('$username', '%s', '%s', '%s', '%s', '$file_location');",
    mysqli_real_escape_string($db, $name),
    mysqli_real_escape_string($db, $descpt),
    mysqli_real_escape_string($db, $price),
    mysqli_real_escape_string($db, $link));
$result = $db->query($sql);
$log = fopen("log.txt", "a");
fwrite($log, date("d-m-Y h:i:sa") . " ADD ITEM\n" . $sql . "\n");
fclose($log);

$db->close();
header("Location: item-adder.php?uploaded=true");