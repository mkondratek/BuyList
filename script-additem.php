<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:32
 */

require_once "config.php";

$target_path = $_SERVER['DOCUMENT_ROOT']."./uploads/";
$target_path = $target_path . basename( $_FILES['file']['name']);
$file_location = "uploads/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

$query = "INSERT INTO items (name, description, price, link, image)
VALUES ('$_POST[name]', '$_POST[description]', '$_POST[price]', '$_POST[link]', '$file_location');";
$result = $db->query($query);

$db->close();
header("Location: item-adder.php?uploaded=true");