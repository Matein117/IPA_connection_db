<?php
// Include the database connection file
require_once '../connection.php';

// Function to get order details by order number
function getOrderDetailsById($order_number) {
    global $mysql;

    $query = "
        SELECT 
            orders_.order_number, 
            orders_.order_date, 
            orders_.order_delivery_date, 
            orders_.user_id, 
            customers.customer_id, 
            customers.firstname AS customer_firstname, 
            customers.lastname AS customer_lastname, 
            customers.phone AS customer_phone, 
            customers.email AS customer_email, 
            customers.street AS customer_street, 
            customers.postcode AS customer_postcode, 
            customers.city AS customer_city, 
            customers.state AS customer_state, 
            products.product_id, 
            products.product_name, 
            products.product_model, 
            products.manufacturer, 
            products.price, 
            products.stock_on_hand, 
            products.img_url, 
            products.feature_id,
            features.weight, 
            features.dimensions, 
            features.OS, 
            features.screensize, 
            features.resolution, 
            features.CPU, 
            features.RAM, 
            features.storage, 
            features.battery, 
            features.rear_camera, 
            features.front_camera
        FROM orders_
        INNER JOIN products ON orders_.product_id = products.product_id
        INNER JOIN customers ON orders_.customer_id = customers.customer_id
        LEFT JOIN features ON products.feature_id = features.feature_id
        WHERE orders_.order_number = ?
    ";

    $stmt = $mysql->prepare($query);
    $stmt->bind_param("i", $order_number);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Check if order_number parameter is set
if (isset($_GET['order_number'])) {
    $order_number = $_GET['order_number'];
    $order = getOrderDetailsById($order_number);
    if ($order) {
        // Return the order details as JSON
        header('Content-Type: application/json');
        echo json_encode($order);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Order not found"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "order_number parameter is required"]);
}
?>
