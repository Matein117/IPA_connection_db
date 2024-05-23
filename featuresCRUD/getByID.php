<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Include your database connection script
    require_once '../connection.php';

    // Validate and sanitize the incoming feature_id
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id <= 0) {
        // Handle invalid or missing feature_id
        echo json_encode(array("error" => "Invalid feature ID"));
        exit;
    }

    // Prepare and execute the SQL query
    $query = "SELECT * FROM features WHERE feature_id = ?";
    $stmt = $mysql->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch data as associative array
        $row = $result->fetch_assoc();
        // Output JSON response
        echo json_encode($row);
    } else {
        // Handle case where no feature with given ID was found
        echo json_encode(array("error" => "Feature not found in php"));
    }

    // Close prepared statement and database connection
    $stmt->close();
    $mysql->close();
}
?>
