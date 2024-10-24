<?php
include_once("pdo.php");
function register($userName, $email, $password){
    $sql="INSERT INTO users( userName, email, password) VALUES ('$userName', '$email', '$password')";
    return pdo_execute($sql);
}
function getAllUser(){
    $sql="SELECT * FROM users";
    return pdo_query($sql);
}

function checkUser($userName){
    $sql="SELECT * FROM users WHERE userName='$userName'";
    return pdo_query_one($sql);
}