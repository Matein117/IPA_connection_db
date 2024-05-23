<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $order_number=$_POST['order_number'];
    $query = "DELETE FROM orders_ WHERE order_number='".$order_number."'";
    $result = $mysql->query($query);
    if($mysql->affected_rows > 0){
        if ($result==true){
            echo "order cancel";
        }
            
    }else{
        echo "error to cancel order";
    }
    $mysql->close();
}