<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 12.07.17
 * Time: 15:30
 */
?>

<form method="post" action="script-additem.php" enctype="multipart/form-data">
    <h1>Add an Item</h1>

    <label for="name">name</label>
    <input id="name" name="name" type="text">

    <label for="description">description</label>
    <textarea id="description" name="description"></textarea>

    <label for="link">link</label>
    <input id="link" name="link" type="text">

    <label for="price">price</label>
    <input id="price" name="price" type="text">

    <label for="image">image</label>
    <input type="file" name="file" id="file">

    <input type="submit" class="submit" value="add item">

</form>

<?php
if(isset($_GET['uploaded']) AND $_GET['uploaded'] == "true") {
    echo '<div class="success">The item has been added</div>';
   }
?>