<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $id=$_POST['id'];
    $query = "DELETE FROM users WHERE user_id='".$id."'";
    $result = $mysql->query($query);
    if($mysql->affected_rows > 0){
        if ($result==true){
            echo "user deleted";
        }
            
    }else{
        echo "error to delete user";
    }
    $mysql->close();
}