<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../connection.php';
    $id = $_POST['id'];
    $updates = [];

    if (isset($_POST["weight"])) {
        $updates[] = "weight='" . $_POST["weight"] . "'";
    }
    if (isset($_POST["dimensions"])) {
        $updates[] = "dimensions='" . $_POST["dimensions"] . "'";
    }
    if (isset($_POST["OS"])) {
        $updates[] = "OS='" . $_POST["OS"] . "'";
    }
    if (isset($_POST["screensize"])) {
        $updates[] = "screensize='" . $_POST["screensize"] . "'";
    }
    if (isset($_POST["resolution"])) {
        $updates[] = "resolution='" . $_POST["resolution"] . "'";
    }
    if (isset($_POST["CPU"])) {
        $updates[] = "CPU='" . $_POST["CPU"] . "'";
    }
    if (isset($_POST["RAM"])) {
        $updates[] = "RAM='" . $_POST["passwRAMord"] . "'";
    }
    if (isset($_POST["storage"])) {
        $updates[] = "storage='" . $_POST["storage"] . "'";
    }
    if (isset($_POST["battery"])) {
        $updates[] = "battery='" . $_POST["battery"] . "'";
    }
    if (isset($_POST["rear_camera"])) {
        $updates[] = "rear_camera='" . $_POST["rear_camera"] . "'";
    }
    if (isset($_POST["front_camera"])) {
        $updates[] = "front_camera='" . $_POST["front_camera"] . "'";
    }

    if (!empty($updates)) {
        $query = "UPDATE features SET " . implode(',', $updates) . " WHERE feature_id='" . $id . "'";
        $result = $mysql->query($query);

        if ($result === true) {
            echo "Feature updated successfully";
        } else {
            echo "Error updating feature";
        }
    } else {
        echo "No fields to update";
    }

    $mysql->close();
}
?>

