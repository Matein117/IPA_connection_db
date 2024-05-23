<?php
$mysql=new mysqli(
    "localhost",
    "root",
    "",
    "ipa"
);
if($mysql->connect_error){

    die("fail connection");
}