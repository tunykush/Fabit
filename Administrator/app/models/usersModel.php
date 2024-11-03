<?php
//include_once("pdo.php");
include 'pdo.php';


function getAllUser()
{
    $sql = "SELECT * FROM users";
    return mysqliQuery($sql);
}
function lockUser($userName): bool
{
    $sql = "UPDATE users SET isLocked=1 WHERE userName='$userName'";
    return pdo_execute($sql);
}
function unlockUser($userName)
{
    $sql = "UPDATE users SET isLocked=0, countWrongPass=0 WHERE userName='$userName'";
    return pdo_execute($sql);
}