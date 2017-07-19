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
        <?php echo $user?>
        <input type="submit" value="Log out" id="logout">
    </form>
</div>
<div id="line">&nbsp;</div>
<table class='item_list'>

    <?php
    $query = "SELECT user, name, description, link, image, price FROM items where user = '$user';";
    $result = $db->query($query);

    if ($result) : while ($item = $result->fetch_object()):
        ?>
        <tr class='item'>
            <td>
                <form action="script-delitem.php" method="post">
                    <input type="hidden" name="delname" value=<?php echo "$item->name"; ?>>
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
                    if ($item->link !== "none") echo "<a href='$item->link'>";
                    else echo "<a target='_blank' href='http://www.google.com/search?q=$item->name'>";
                    ?>
                    <span class='price'>$<?php echo number_format($item->price, 2, ', ', ' ') ?></span>
                    </a>
                </h3>
                <?php
                if ($item->link !== "none") echo "<a href='$item->link'>";
                else echo "<a target='_blank' href='http://www.google.com/search?q=$item->name'>";
                ?>
                buy online
                </a>
            </td>
        </tr>
    <?php endwhile; endif; $result->free(); ?>
</table>

<?php include "./footer.php"; ?>
