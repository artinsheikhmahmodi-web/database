<?php
session_start();

//print_r($_POST);
$username = $_POST["username"];
$password = $_POST["password"];

include "db.php";
$cnn = (new db)->connection_database;


  
$sql = "SELECT * FROM `users` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
$result = $cnn->query($sql);
if ($result->num_rows != 1) {
    echo "مجاز نیستید";
    exit;
}

$user_logged = $result->fetch_assoc();

$_SESSION["user_logged"] = $user_logged;
header("location:index.php");
