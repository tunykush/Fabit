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

function increaseCountWrongPass($userName){
    $sql="UPDATE users SET countWrongPass=countWrongPass+1 WHERE userName='$userName'";
    return pdo_execute($sql);
}
function lockUser($userName){
    $sql="UPDATE users SET isLocked=1 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function clearCountWrongPass($userName){
    $sql="UPDATE users SET countWrongPass=0 WHERE userName='$userName'";
    return pdo_execute($sql);
}