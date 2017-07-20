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

include_once "header.php";

if (isset($_GET['uploaded']) AND $_GET['uploaded'] == "true") {
    echo '<div class="success">The item has been added</div>';
}

?>

    <form method="post" action="script-additem.php" enctype="multipart/form-data" id="addingform">
        <h1>Add an Item</h1>

        <label for="name">name</label>
        <input id="name" name="name" type="text">

        <label for="description">description</label>
        <textarea id="description" name="description"></textarea>

        <label for="link">link</label>
        <input id="link" name="link" type="text">

        <label for="price">price (i.e. 1234.56)</label>
        <input id="price" name="price" type="text">

        <label for="image">image</label>
        <input type="file" name="file" id="file">

        <input type="submit" id="add" value="add item">
        <h2>or</h2>
    </form>
    <form action="/list.php">
        <input type="submit" value="back to list" id="back">
    </form>

<?php include_once "footer.php"; ?>