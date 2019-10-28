<?php
    require 'checkAdmin.php';
    require 'config.php';
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $rules = $_POST['rules'];
        $admin = $_POST['admin'];
        $startDate = $_POST['startdate'];
        $lastdate = $_POST['lastdate'];
        $addedOn = $_POST['addedOn'];
        $mark = $_POST['mark'];
        $negative = $_POST['negative'];

        $sql = "INSERT INTO test (title,duration,description,rules,admin,lastdate,addedOn,startDate,mark,negative) VALUES ('$title','$duration','$description','$rules','$admin','$lastdate','$addedOn','$startDate','$mark','$negative')";

        $message = "Error Creating Test";
        if($conn->query($sql) === TRUE){
            $message = "Test created Successfully";
        }

        header("Location: viewTests.php?message=$addedOn");
    }
?>
