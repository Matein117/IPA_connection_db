<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $product_name=$_POST["product_name"];
    $product_model=$_POST["product_model"];
    $manufacturer=$_POST["manufacturer"];
    $price=$_POST["price"];
    $stock_on_hand=$_POST["stock_on_hand"];
    $img_url=$_POST["img_url"];
    $feature_id=$_POST["feature_id"];
    $query="INSERT INTO products ( product_name, product_model, manufacturer, price, stock_on_hand, img_url, feature_id ) 
        VALUES (
            '".$product_name."',
            '".$product_model."',
            '".$manufacturer."',
            '".$price."',
            '".$stock_on_hand."',
            '".$img_url."',
            '".$feature_id."'
        )";
        $result=$mysql->query($query);
        if($result==true){
            echo " Product created";
        }else{
            echo "error to create product";
        }
}