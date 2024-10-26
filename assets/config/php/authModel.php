<?php
//include_once("pdo.php");

include 'pdo.php';

function register($userName, $email, $password)
{
    $sql = "INSERT INTO users( userName, email, password) VALUES ('$userName', '$email', '$password')";
    return mysql_execute($sql);
}

function getAllUser()
{
    $sql = "SELECT * FROM users";
    return mysqliQuery($sql);
}

function checkUserExist($username, $email)
{
    $sql = "SELECT * FROM users WHERE userName='$username' OR email='$email'";
    $rs = mysqliQuery($sql);
    return $rs;
}

function checkUser($userName)
{
    $sql = "SELECT * FROM users WHERE userName='$userName'";
    return pdo_query_one($sql);
}

function checkEmailUser($email)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    return pdo_query($sql);
}

function increaseCountWrongPass($userName)
{
    $sql = "UPDATE users SET countWrongPass=countWrongPass+1 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function lockUser($userName)
{
    $sql = "UPDATE users SET isLocked=1 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function clearCountWrongPass($userName)
{
    $sql = "UPDATE users SET countWrongPass=0 WHERE userName='$userName'";
    return pdo_execute($sql);
}

function updateUser($email, $password, $avatar, $id)
{
    $sql = "UPDATE users SET email='$email',password='$password',avatar='$avatar' WHERE id=$id";
    return pdo_execute($sql);
}