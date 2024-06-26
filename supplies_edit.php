<?php
include "connection.php";
$get_item_id = $_GET['item_id'];

if (isset($_POST['edit'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_total = $_POST['item_total'];
    $item_price = $_POST['item_price'];

    $sql = "UPDATE supplies SET item_id='$item_id', item_name='$item_name', item_category='$item_category', item_total='$item_total', price=$item_price WHERE item_id='$get_item_id'";
    if (!$item_name || !$item_category || !$item_total || !$item_price) {
        echo "<script> alert ('Enter the item!'); window.location='supplies.php';</script>";
    } else {
        $update_data = $db->query($sql);
        if ($update_data) {
            echo "<script> alert ('Item Updated'); window.location='supplies.php';</script>";
        } else {
            echo "<script> alert ('Update Failed'); window.location='supplies.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="parent display_center">
        <div class="card login_container">
            <?php
            $get_data = mysqli_query($db, "SELECT * FROM supplies WHERE item_id='$get_item_id'");
            while ($row = mysqli_fetch_array($get_data)) { ?>
                <form action="" method="post">
                    <div class="login_head">Edit Item</div>
                    <ul class="edit_input input_list">
                        <li>
                            <label class="input_component" for="">Id</label>
                            <input class="login_input_box" type="number" name="item_id" value="<?php echo $row['item_id']; ?>">
                        </li>
                        <li>
                            <label class="input_component" for="">Name</label>
                            <input class="login_input_box" placeholder="Item name" type="text" name="item_name" value="<?php echo $row['item_name']; ?>">
                        </li>
                        <li>
                            <label class="input_component" for="">Category</label>
                            <select class="login_input_box" placeholder="Item name" type="text" name="item_category" value="<?php echo $row['item_category']; ?>">
                                <option value="Over-the-counter drugs">Over-the-counter drugs</option>
                                <option value="Limited over-the-counter drugs">Limited over-the-counter drugs</option>
                                <option value="Hard drugs">Hard drugs</option>
                            </select>
                        </li>
                        <li>
                            <label class="input_component" for="">Total</label>
                            <input class="login_input_box" placeholder="Item total" type="number" name="item_total" value="<?php echo $row['item_total']; ?>">
                        </li>
                        <li>
                            <label class="input_component" for="">Price</label>
                            <input class="login_input_box" placeholder="Item price" type="number" name="item_price" value="<?php echo $row['price']; ?>">
                        </li>
                        <li>
                            <input class="login_input_box" type="submit" name="edit">
                        </li>
                    </ul>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>