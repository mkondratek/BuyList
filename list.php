<?php
/**
 * Created by PhpStorm.
 * User: mkondratek
 * Date: 14.07.17
 * Time: 19:44
 */

include "./header.php";
require_once "connect.php";
$user = $_SESSION['user'];
?>

<div id="logoutdiv">
    <form action="script-logout.php">
        <input type="submit" value="Log out" id="logout">
    </form>
</div>
<div class="line">&nbsp</div>
<div id="logged"> <?php echo "logged as " . $user; ?> </div>
<div class="line">&nbsp</div>
<div id="additemdiv">
    <form action="item-adder.php">
        <input type="submit" value="Add item" id="additem">
    </form>
</div>
<div class="clear"></div>

<table class='item_list'>

    <?php
    $query = "SELECT id, user, name, description, link, image, price FROM items where user = '$user';";
    $result = $db->query($query);

    if ($result->num_rows === 0) {
        echo "<h2>Your list is empty.</h2>";
    }

    if ($result) : while ($item = $result->fetch_object()):
        ?>
        <tr class='item'>
            <td>
                <form action="script-delitem.php" method="post">
                    <input type="hidden" name="delid" value=<?php echo "$item->id"; ?>>
                    <input type="submit" value="X" class="delbutton">
                </form>
            </td>
            <td width='150' class='item_image'>
                <?php
                if ($item->image !== "none") {
                    echo "<img src='$item->image' alt='no image'>";
                }
                ?>
            </td>
            <td class='item_content'>
                <h2 class='item_name'><?php echo $item->name ?></h2>
                <div class='item_description'><?php echo nl2br($item->description) ?></div>
            </td>
            <td width="220" class='item_price'>
                <h3>
                    <?php
                    if ($item->link !== "") echo "<a href='$item->link'>";
                    else echo "<a target='_blank' href='http://www.google.com/search?q=$item->name'>";
                    ?>
                    <span class='price'>$<?php echo number_format($item->price, 2, ', ', ' ') ?></span>
                    </a>
                </h3>
                <?php
                if ($item->link !== "") echo "<a href='$item->link'>";
                else echo "<a target='_blank' href='http://www.google.com/search?q=$item->name'>";
                ?>
                buy online
                </a>
            </td>
        </tr>
    <?php endwhile; endif;
    $result->free(); ?>
</table>

<?php include "./footer.php"; ?>
