<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $role=$_POST["role"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $query="INSERT INTO users ( firstname, lastname, role, username, password) 
        VALUES (
            '".$firstname."',
            '".$lastname."',
            '".$role."',
            '".$username."',
            '".$password."'
        )";
        $result=$mysql->query($query);
        if($result==true){
            echo " user created";
        }else{
            echo "error to create";
        }
}