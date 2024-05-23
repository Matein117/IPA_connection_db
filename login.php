<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize the inputs to prevent SQL injection (you can enhance this further)
    $username = $mysql->real_escape_string($username);
    $password = $mysql->real_escape_string($password);

    // Query to check if the provided username and password match a record in the users table
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $mysql->query($query);

    if ($result->num_rows > 0) {
        // User found, login successful
        $user = $result->fetch_assoc();
        $response = array("success" => true, "message" => "Login successful", "user" => $user);
        echo json_encode($response);
    } else {
        // User not found or incorrect credentials
        $response = array("success" => false, "message" => "Login failed. Incorrect username or password.");
        echo json_encode($response);
    }

    $result->close();
} else {
    // Handle invalid request method
    $response = array("success" => false, "message" => "Invalid request method");
    echo json_encode($response);
}

$mysql->close();