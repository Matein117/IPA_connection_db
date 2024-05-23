<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../connection.php';
    $weight=$_POST["weight"];
    $dimensions=$_POST["dimensions"];
    $OS=$_POST["OS"];
    $screensize=$_POST["screensize"];
    $resolution=$_POST["resolution"];
    $CPU=$_POST["CPU"];
    $RAM=$_POST["RAM"];
    $storage=$_POST["storage"];
    $battery=$_POST["battery"];
    $rear_camera=$_POST["rear_camera"];
    $front_camera=$_POST["front_camera"];
    $query="INSERT INTO features ( weight, dimensions, OS, screensize, resolution, CPU, RAM, storage, battery, rear_camera, front_camera) 
        VALUES (
            '".$weight."',
            '".$dimensions."',
            '".$OS."',
            '".$screensize."',
            '".$resolution."',
            '".$CPU."',
            '".$RAM."',
            '".$storage."',
            '".$battery."',
            '".$rear_camera."',
            '".$front_camera."'
        )";
        $result=$mysql->query($query);
        if($result==true){
            echo " Feature created";
        }else{
            echo "error to create";
        }
}