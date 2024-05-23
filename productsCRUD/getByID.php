<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    require_once '../connection.php';
    $id=$_GET['id'];
    $query = "SELECT * FROM products WHERE product_id='".$id."'";
    $result = $mysql->query($query);
    if($mysql->affected_rows > 0){
        while($row = $result->fetch_assoc()){
            $array = $row;
        }
        echo json_encode($array);
    }else{
        echo "error to get the product by ID";
    }
    $result->close();
    $mysql->close();
} 