<?php
    require 'checklogin.php';
    require 'config.php';

    $test = $_GET['test'];
    $user = $_GET['user'];
    $sql = "INSERT INTO registered (test,user) VALUES ('$test','$user')";

    $message = "Error registering check again later";
    if($conn->query($sql) === TRUE){
        $message = "Registered Succesfully";
    }

    header("Location: viewTest.php?id=$test&message=$message");
?>