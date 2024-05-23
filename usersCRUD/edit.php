<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../connection.php';
    $id = $_POST['id'];
    $updates = [];

    if (isset($_POST["firstname"])) {
        $updates[] = "firstname='" . $_POST["firstname"] . "'";
    }
    if (isset($_POST["lastname"])) {
        $updates[] = "lastname='" . $_POST["lastname"] . "'";
    }
    if (isset($_POST["role"])) {
        $updates[] = "role='" . $_POST["role"] . "'";
    }
    if (isset($_POST["username"])) {
        $updates[] = "username='" . $_POST["username"] . "'";
    }
    if (isset($_POST["password"])) {
        $updates[] = "password='" . $_POST["password"] . "'";
    }

    if (!empty($updates)) {
        $query = "UPDATE users SET " . implode(',', $updates) . " WHERE user_id='" . $id . "'";
        $result = $mysql->query($query);

        if ($result === true) {
            echo "User updated successfully";
        } else {
            echo "Error updating user";
        }
    } else {
        echo "No fields to update";
    }

    $mysql->close();
}
?>

