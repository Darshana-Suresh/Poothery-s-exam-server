<?php
    require 'checkAdmin.php';
    require 'config.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM test WHERE id = $id";
    $message = "Error Deleting";
    if($conn->query($sql) === true){
        $message = "Test Deleted";
    }

    header("Location: viewTests.php?message=$message");
?>