<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once '../connection.php';
    $query = "SELECT * FROM orders_";
    $result = $mysql->query($query);
    if ($mysql->affected_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $response = array("data" => $data);
        echo json_encode($response);
    }
    $result->close();
    $mysql->close();
}

