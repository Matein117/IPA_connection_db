<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../connection.php';
    $id = $_POST['id'];
    $updates = [];

    if (isset($_POST["product_name"])) {
        $updates[] = "product_name='" . $_POST["product_name"] . "'";
    }
    if (isset($_POST["product_model"])) {
        $updates[] = "product_model='" . $_POST["product_model"] . "'";
    }
    if (isset($_POST["manufacturer"])) {
        $updates[] = "manufacturer='" . $_POST["manufacturer"] . "'";
    }
    if (isset($_POST["price"])) {
        $updates[] = "price='" . $_POST["price"] . "'";
    }
    if (isset($_POST["stock_on_hand"])) {
        $updates[] = "stock_on_hand='" . $_POST["stock_on_hand"] . "'";
    }
    if (isset($_POST["img_url"])) {
        $updates[] = "img_url='" . $_POST["img_url"] . "'";
    }
    if (isset($_POST["feature_id"])) {
        $updates[] = "feature_id='" . $_POST["feature_id"] . "'";
    }

    if (!empty($updates)) {
        $query = "UPDATE products SET " . implode(',', $updates) . " WHERE product_id='" . $id . "'";
        $result = $mysql->query($query);

        if ($result === true) {
            echo "Product updated successfully";
        } else {
            echo "Error updating Product";
        }
    } else {
        echo "No fields to update";
    }

    $mysql->close();
}
?>

