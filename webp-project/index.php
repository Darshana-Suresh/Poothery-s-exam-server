<?php
    require 'checklogin.php';

    if(isset($_SESSION['username'])){
        header("Location: availableTest.php");
    }
?>