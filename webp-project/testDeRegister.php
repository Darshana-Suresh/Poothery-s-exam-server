<?php
    require 'checklogin.php';
    require 'config.php';

    $test = $_GET['test'];
    $id = $_GET['id'];
    $sql = "DELETE FROM registered WHERE id = $id";

    $message = "Error deregistering check again later";
    if($conn->query($sql) === TRUE){
        $message = "Deregistered Succesfully";
    }

    header("Location: viewTest.php?id=$test&message=$message");
?>