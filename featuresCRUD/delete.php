<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $id=$_POST['id'];
    $query = "DELETE FROM features WHERE feature_id='".$id."'";
    $result = $mysql->query($query);
    if($mysql->affected_rows > 0){
        if ($result==true){
            echo "Feature deleted";
        }
            
    }else{
        echo "error to delete feature";
    }
    $mysql->close();
}