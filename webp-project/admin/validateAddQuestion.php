<?php
require 'checkAdmin.php';
require 'config.php';
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];
    $ans = $_POST['ans'];
    $test = $_POST['test'];
    $qimg = '';
    $img1 = '';
    $img2 = '';
    $img3 = '';
    $img4 = '';

    if (!empty($_FILES['qimg']['name'])) {
        $qimg = 'uploads/'.mktime().rand().$_FILES['qimg']['name'];
        if (move_uploaded_file($_FILES['qimg']['tmp_name'], $qimg)) {
            echo "The file " .  basename($_FILES['qimg']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    if (!empty($_FILES['img1']['name'])) {
        $img1 = 'uploads/'.mktime().rand().$_FILES['img1']['name'];
        if (move_uploaded_file($_FILES['img1']['tmp_name'], $img1)) {
            echo "The file " .  basename($_FILES['img1']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    if (!empty($_FILES['img2']['name'])) {
        $img2 = 'uploads/'.mktime().rand().$_FILES['img2']['name'];
        if (move_uploaded_file($_FILES['img2']['tmp_name'], $img2)) {
            echo "The file " .  basename($_FILES['img2']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    if (!empty($_FILES['img3']['name'])) {
        $img3 = 'uploads/'.mktime().rand().$_FILES['img3']['name'];
        if (move_uploaded_file($_FILES['img3']['tmp_name'], $img3)) {
            echo "The file " .  basename($_FILES['img3']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    if (!empty($_FILES['img4']['name'])) {
        $img4 = 'uploads/'.mktime().rand().$_FILES['img4']['name'];
        if (move_uploaded_file($_FILES['img4']['tmp_name'], $img4)) {
            echo "The file " .  basename($_FILES['img4']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $sql = "INSERT INTO question (question,qimg,op1,img1,op2,img2,op3,img3,op4,img4,ans,test) VALUES ('$question','$qimg','$op1','$img1','$op2','$img2','$op3','$img3','$op4','$img4','$ans','$test')"; 
    

    $message = "Error adding question";

    if($conn->query($sql) === TRUE){
        $message = "Question successfully added";
    }

    header("Location: viewTest.php?message=$message&id=$test");

}
 